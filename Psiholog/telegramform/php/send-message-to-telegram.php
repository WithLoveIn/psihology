<?php

// Токен
  const TOKEN = '5072642791:AAGvZQfuGBETeVDAElAO48GiERyz9WOaBQE';

  // ID чата
  const CHATID = '-674206804';

   // Максимальный размер файла в килобайтах
  // 1048576; // 1 МБ
  $size = 1073741824; // 1 ГБ

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $fileSendStatus = '';
  $textSendStatus = '';
  $msgs = [];
  
  // Проверяем не пусты ли поля с именем и телефоном
  if (!empty($_POST['name']) && !empty($_POST['phone'])) {
    
    // Если не пустые, то валидируем эти поля и сохраняем и добавляем в тело сообщения. Минимально для теста так:
    $txt = "";
    
    // Не забываем про тему сообщения
    if (isset($_POST['theme']) && !empty($_POST['theme'])) {
        $txt .= "Тема: " . strip_tags(urlencode($_POST['theme'])). "%0A";
    }

    // Фамилия
    if (isset($_POST['sername']) && !empty($_POST['sername'])) {
        $txt .= "Фамилия пославшего: " . strip_tags(trim(urlencode($_POST['sername']))) . "%0A";
    }
    // Имя
    if (isset($_POST['name']) && !empty($_POST['name'])) {
        $txt .= "Имя пославшего: " . strip_tags(trim(urlencode($_POST['name']))) . "%0A";
    }
    
    // Номер телефона
    if (isset($_POST['phone']) && !empty($_POST['phone'])) {
        $txt .= "Телефон: " . strip_tags(trim(urlencode($_POST['phone']))) . "%0A";
    }
    
    // Запрос
    if (isset($_POST['forma']) && !empty($_POST['forma'])) {
        $txt .= "Запрос: " . strip_tags(trim(urlencode($_POST['forma']))) . "%0A";
    }
    // Дата
    if (isset($_POST['date']) && !empty($_POST['date'])) {
        $txt .= "Дата: " . strip_tags(trim(urlencode($_POST['date']))) . "%0A";
    }
    // Время
    if (isset($_POST['time']) && !empty($_POST['time'])) {
        $txt .= "Время: " . strip_tags(trim(urlencode($_POST['time']))) . "%0A";
    }
    

    $textSendStatus = @file_get_contents('https://api.telegram.org/bot'. TOKEN .'/sendMessage?chat_id=' . CHATID . '&parse_mode=html&text=' . $txt); 

    if( isset(json_decode($textSendStatus)->{'ok'}) && json_decode($textSendStatus)->{'ok'} ) {
      if (!empty($_FILES['files']['tmp_name'])) {
    
          $urlFile =  "https://api.telegram.org/bot" . TOKEN . "/sendMediaGroup";
          
          // Путь загрузки файлов
          $path = $_SERVER['DOCUMENT_ROOT'] . '/telegramform/tmp/';
          
          // Загрузка файла и вывод сообщения
          $mediaData = [];
          $postContent = [
            'chat_id' => CHATID,
          ];
      
          for ($ct = 0; $ct < count($_FILES['files']['tmp_name']); $ct++) {
            if ($_FILES['files']['name'][$ct] && @copy($_FILES['files']['tmp_name'][$ct], $path . $_FILES['files']['name'][$ct])) {
              if ($_FILES['files']['size'][$ct] < $size && in_array($_FILES['files']['type'][$ct], $types)) {
                $filePath = $path . $_FILES['files']['name'][$ct];
                $postContent[$_FILES['files']['name'][$ct]] = new CURLFile(realpath($filePath));
                $mediaData[] = ['type' => 'document', 'media' => 'attach://'. $_FILES['files']['name'][$ct]];
              }
            }
          }
      
          $postContent['media'] = json_encode($mediaData);
      
          $curl = curl_init();
          curl_setopt($curl, CURLOPT_HTTPHEADER, ["Content-Type:multipart/form-data"]);
          curl_setopt($curl, CURLOPT_URL, $urlFile);
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($curl, CURLOPT_POSTFIELDS, $postContent);
          $fileSendStatus = curl_exec($curl);
          curl_close($curl);
          $files = glob($path.'*');
          foreach($files as $file){
            if(is_file($file))
              unlink($file);
          }
      }
      echo json_encode('SUCCESS');
    } else {
      echo json_encode('ERROR');
      // 
      // echo json_decode($textSendStatus);
    }
  } else {
    echo json_encode('NOTVALID');
  }
} else {
  header("Location: /");
}
