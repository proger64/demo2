<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php

	include "config.php";

		//Путь большой картинки
		$path = "image/goods/".$_FILES['image']['name'];

		//Путь маленькой картинки
		$pathsmall = "image/icons/".$_FILES['image']['name'];

		$name = $_POST['name'];
		$about = $_POST['about'];
		$price = $_POST['price'];
		
		//Загрузим большую картинку
		if(move_uploaded_file($_FILES['image']['tmp_name'],$path)){
		    echo "Фото загружено!";

		    $image = $_FILES['image']['tmp_name'];
		    //теперь сделаем колдовство с уменьшеной картинкой
		    //и так как я не знаю как это делать правильно, я начинаю импровизировать.

		    //создадим ресурс большой картинки
			$imageresoursebig = imagecreatefromjpeg($path);

			//определим его исходные размеры
			$x = imagesx($imageresoursebig);
			$y = imagesy($imageresoursebig);

			//создадим "заглушку" маленькой картинки, уменьшенную в три раза - это просто черный прямоугольник, Если с ним не поработать
		    $imageresourcesmall = imagecreatetruecolor($x/3, $y/3);
		    	   
		   	//применим функцию, преобразующую картинку в маленькую
		    imagecopyresampled($imageresourcesmall, $imageresoursebig, 0, 0, 0, 0, $x/3, $y/3, $x, $y);

		    //сохраним маленькую картинку
		    imagejpeg($imageresourcesmall, $pathsmall);

		    $sql = "insert into goods(fullname,name,about,price,image,usersadded) VALUES ('$name','$name','$about','$price','$image',1)";

		    if(mysqli_query(getConnect(), $sql)){
        			echo "Товар добавлен!";
		    	}else{
		        	echo "Ошибка добавления товара!";
				}

		}else{
		    echo "Ошибка при загрузке файла!";
		}
	?>

	<a href="index.php">Вернуться назад</a>
</body>
</html>