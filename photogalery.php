<?php 

	echo '<H1>Вся наша выпечка всегда свежая и вкусная.</H1>';
	$mas = scandir(__DIR__ ."/image/icons");
	$count = 0;
	
	echo '<div id="lightgallery">';
	
	foreach($mas as $key => $file){
		if($key>1) {
			if ($count == 3) {
				echo '<br>';
				$count = 0;
			}
			echo "<a href='image/goods/$file'><img src='image/icons/$file' margin = 10px/></a>";
			$count++;
		}
	}
	
	echo "</div>";
	
?>

