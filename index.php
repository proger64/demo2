<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Интернет булочная</title>
	<link rel="stylesheet" type="text/css" href="style2.css" />
	<link type="text/css" rel="stylesheet" href="lightgallery.css" />
	<link href="lightgallery.css" rel="stylesheet">
</head>
<body>

	<!-- A jQuery plugin that adds cross-browser mouse wheel support. (Optional) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>	
	<!-- lightgallery plugins -->
	
	<script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
	<script src="/onlineshop/js/lightgallery-all.min.js"></script>
	<script src="/onlineshop/lib/jquery.mousewheel.min.js"></script>

	<script type="text/javascript">
	//функция для ввода логина
	function inputlogin(){
		var login = $("#mylogin").val();
		var pass = $("#mypass").val();
		var str = "&login="+login+"&pass="+pass+"&function='enter'";
		$.ajax({
			type: "POST",
			url: "autorisation.php",
			data: str,
			success: function(answer){
				$("h1").html(answer);
			}
		});
	}	
	
	//функция для регистрации
	function registration(){		
		var login = $("#mylogin").val();
		var pass = $("#mypass").val();
		var str = "&login="+login+"&pass="+pass+"&function='registration'";
		$.ajax({
			type: "POST",
			url: "autorisation.php",
			data: str,
			success: function(answer){
				$("h1").html(answer);
			}
		});
	}
	
	//функция для подстановки фотогалереи
	function photogalery(){		
		$.ajax({
			type: "POST",
			url: "photogalery.php",
			data: "",
			success: function(answer) {
				$("#content").html(answer);
				$("#lightgallery").lightGallery();
			}			
		});
		
	}

	//функция для подстановки списка товаров для покупок	
	function goodlist(){		
		$.ajax({
			type: "POST",
			url: "goodslist.php",
			data: "",
			success: function(answer){
				$("#content").html(answer);
			}
		});
	}

	//Функция для отрисовки корзины
	function basket(){		
		$.ajax({
			type: "POST",
			url: "basket.php",
			data: "",
			success: function(answer){
				$("#content").html(answer);
			}
		});
	}

</script>

<script type="text/javascript">
	$(document).ready(function() {
		$("#lightgallery").lightGallery(); 
	});
</script>

<div id="container">

	<header>
		<div id="header-top">
			<img src="image/logo.png" alt="logo" align="right" width="130" height="130">
			<h2>Honey Bakery</h2>

			<div id="headerauth">
				<h1 style="color:#930;"></h1>
				<p>Введите логин    <input type="text" id="mylogin" value=""> </p>					
				<p>Введите пароль <input type="password" id="mypass" value=""></p>
				<div id="buttongrup">
					<input onclick="inputlogin()" type="button" value="Войти">
					<input onclick="registration()" type="button" value="Регистрация">
				</div>
			</div>
		</div>

		<div id="navigation">
			<h2>Навигация по сайту</h2>
		</div>
	</header>

	<main>
		<div id="menu">
			<h2>Меню сайта</h2>
			<a href="#" onclick="photogalery()">Фотогалерея. Наша продукция </a>
			<br>
			<br>
			<a href="#" onclick="goodlist()">Начать покупки </a>
			<br>
			<br>
			<a href="#" onclick="basket()">Козрина </a>
			<br>
			<br>
			<h2>Контакты</h2>

			<p>Наш телефон 89231521850</p>
			<p>Адрес - проспект Архитектора Шляпкина, 93/3 стр 2</p>
			<p>Всегда на связи по скайпу Bakery_Honey</p>

		</div>
		<div id="content">
			<h1 id = "content" style="color:#930;"></h1>
		</div>
	</main>

	<footer>

	</footer>			
</div> 
</body>
</html>

