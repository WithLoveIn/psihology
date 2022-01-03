<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
	
	<title>Психолог</title>
</head>
<body>
	<header>
		<div class="container">
			<div class="row my-5">
				<div class="col-12 col-md-6" id="foto">
					<img src="img/foto1.jpg" alt="foto" class="img-fluid">
				</div>
				<div class="col-12 col-md-6">
					<h1>ПСИХОЛОГ</h1>
					<h2>ГЕШТАЛЬТ-ТЕРАПЕВТ</h2>
					<h2>Дворова Ольга</h2>
					<a href="tel:380663877059">+380663877059</a>
					<p>г.Днепр</p>
					<button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary">Запись на консультацию</button>

				</div>
			</div>
		</div>
	</header>
	<main>
		<section class="section1">
			<div class="container">
				<div class="row my-5">
					<div class="col-12 col-md-6 order-1 order-md-0">
						<div class="papirus1 p-3 px-5" data-aos="fade-in" data-aos-delay="500">
							<div class="console-container pt-4 px-3">
								<span id="text1"></span>
								<div class="console-underscore" id="console"><img src="img/pero.png" alt="pero" class="position-absolute" id="pero" data-toggle="rotation" data-tob="fade-out"></div>
							</div>
							<script>
								consoleText(['\"Всем привет. Я Оля и я психолог.\"'],'text1');
								function consoleText(words,id)
								{
									var visible=true;
									var con = document.getElementById('console');
									var letterCount=1;
									var x=1;
									var waiting = false;
									var target = document.getElementById(id);
									window.setInterval(function(){
										if (letterCount===0 && waiting===false) {
											waiting = true;
											target.innerHTML = words[0].substing(0,letterCount);
											window.setTimeout( function() {
												var usedword = words.shift();
												words.push(usedword);
												x=1;
												letterCount+=x;
												waiting = false;
											},1000);
										}else if (letterCount === words[0].lenght+1 && waiting === false) {
											waiting=true;
											window.setTimeout(function(){
												x=-1;
												letterCount-=x;
												waiting=false;
											}, 1000)
										}else if (waiting === false){
											target.innerHTML = words[0].substring(0,letterCount)
											letterCount+=x;
										}
									},120)	
								}
							</script>

						</div>
					</div>
					<div class="col-12 col-md-6 order-0 order-md-1">
						<img src="img/foto2.jpg" alt="foto" class="img-fluid">
					</div>	
				</div>
			</div>
		</section>
		<section class="section2">
			<div class="container">
				<div class="row my-5">
					<div class="col-12 col-md-6">
						<img src="img/foto3.jpg" alt="foto" class="img-fluid">
					</div>
					<div class="col-12 col-md-6">
						<p>ТЕКСТ</p>
					</div>
				</div>
			</div>
		</section>
		<section class="section3">
			<div class="container">
				<div class="row my-5">
					<div class="col-12 col-md-6 order-1 order-md-0">
						<p>ТЕКСТ</p>
					</div>
					<div class="col-12 col-md-6 order-0 order-md-1">
						<img src="img/foto1.jfif" alt="foto" class="img-fluid">
					</div>
				</div>
			</div>
		</section>
		<section class="section4">
			<div class="container">
				<div class="row d-flex justify-content-center text-center">
					<h2>СЕРТИФИКАТЫ</h2>
					<div class="col-12 row mb-3">
						<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
							<div class="carousel-indicators">
								<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
								<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
								<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
								<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
							</div>
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img src="img/sertificat1.jpg" class="img-fluid" alt="sert">
								</div>
								<div class="carousel-item">
									<img src="img/sertificat2.jpg" class="img-fluid" alt="sert">
								</div>
								<div class="carousel-item">
									<img src="img/sertificat3.jpg" class="img-fluid" alt="sert">
								</div>
								<div class="carousel-item">
									<img src="img/sertificat4.jpg" class="img-fluid" alt="sert">
								</div>
							</div>
							<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="visually-hidden">Previous</span>
							</button>
							<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="visually-hidden">Next</span>
							</button>
						</div>						
					</div>
				</div>
			</div>
		</section>
	</main>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header p-3 px-3 border-0">
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body d-flex flex-column">
					<form id="form-contact" method="POST"autocomplete="off" enctype="multipart/form-data" class="d-flex flex-column contact-form">
						<label for="">Фамилия</label>
						<input type="text" name="sername">
						<label for="">Имя</label>
						<input name="name" type="text" required>     
						<label for="">Телефон</label>
						<input name="phone" type="tel" required>     
						<label for="">Ваш запрос</label>
						<textarea name="forma" id=""></textarea>
						<div class="d-flex">
							<div class="d-flex flex-column me-4">		
								<label for="">Дата</label>
								<input type="date" name="date">
							</div>
							<div class="d-flex flex-column">
								<label for="">Время</label>
								<input type="time" name="time">
							</div>
						</div>
						<!--Поле с темой в письме-->
						<input name="theme" type="hidden" class="contact-form__input contact-form__input_theme"
						       value="заявка с сайта Psyhology">

						<div class="modal-footer border-0">
							<button type="submit" class="btn btn-primary contact-form__button"  data-bs-dismiss="modal" aria-label="Close">Записаться</button>
						</div>
					</form>
				</div>		
			</div>
		</div>
	</div>

	


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="telegramform/js/telegramform.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
	<script>
	    $(function () {
	      $('input[type="tel"]').mask('+38(000)000-00-00');
	    });
	  </script>
</body>
</html>