<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title> forms </title>
		<link rel="stylesheet" href="style.css"/>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
		<script type="text/javascript" src="script.js"></script>
	</head>
	<body>
		<?php
			//Funkcje
			
			function bezpieczneDrukowanie( $formInput ){
				   $formInput = trim($formInput);
				   $formInput = stripslashes($formInput);
				   $formInput = htmlspecialchars($formInput); // to pozwala zapobiec Cross-site Scripting attacks
				   echo $formInput;
			};
			
		?>
		
		<form action="phpScript.php" method="get" >
			<h4> Form wykonywany w innym pliku </h4>
			<p>Imie: <input name="imie" type="text" /></p>
			<p><input type="submit"  value="submit" /></p>
		</form>
		
		
		<form action=<?php echo $_SERVER['PHP_SELF'];  ?> method="post" >
			<!-- 
				$_SERVER['PHP_SELF'] - zwraca ścieżke dostępu do aktualnie otwartej strony
									  pozwala wysłać form do aktualnie otwartej strony
			--> 
			<h4> Form wykonywany na tej stronie ("PHP_SELF") </h4>
			<p>Imie: <input name="imie" type="text" /></p>
			<p><input type="submit"  value="submit" /></p>
			<?php
				if($_SERVER["REQUEST_METHOD"] == "POST"){	
					echo '<h4> OUTPUT </h4>';
					echo 'Imie: ';
					@bezpieczneDrukowanie($_POST["imie"]); // @ - tłumi błąd jeżeli nie wprowadzono informacji w <form>
				}
			?>	
		</form>
		
		<form action=<?php echo $_SERVER['PHP_SELF'];  ?>  enctype="multipart/form-data" method="post" >
		 	<h4>Wyświetla info o wysłanym pliku -<br/> (wysłany plik - max 8MB)</h4>
				<?php				
					if( @$_FILES["nazwa"] ){ // @ - tłumi błąd jeżeli plik nie zotał uruchomiony ( np przy pierwszym uruchomienu );
						if ($_FILES["nazwa"]["error"] > 0)
						{
							echo "Error: " . $_FILES["nazwa"]["error"] . "<br>";
						}
						else
						{
							echo "Upload: " . $_FILES["nazwa"]["name"] . "<br>";
							echo "Type: " . $_FILES["nazwa"]["type"] . "<br>";
							echo "Size: " . ($_FILES["nazwa"]["size"] / 1024) . " kB<br>";
							echo "Stored in: " . $_FILES["nazwa"]["tmp_name"];
						}
					}	
				?>
		<p><input name="nazwa" type="file"/></p>
		<p><input type="submit" value="wyślij"/></p>
		</form>
		
		<form action=<?php echo $_SERVER['PHP_SELF'];  ?>  enctype="multipart/form-data" method="post" >
			<h4>Wyświetla info o wysłanym pliku <br/>(mniej niż 3MB, akceptuje tylko: .jpg i .exe) </h4>
			<?php
				if( @$_FILES["file"] ){
					$allowedFormats = array("jpg","exe");
					$temp = explode(".", $_FILES["file"]["name"]); // stwórz tablice z nazwy pliku, dzieląc ciąg znaków przy kropce
					$format = end($temp); //end() ostatni element tablicy
					
					if( in_array($format, $allowedFormats) && $_FILES["file"]["size"] < 3145728 ){  // 3145728 = 3MB ( 1024*1024*3 )
						if ($_FILES["file"]["error"] > 0)
				  		{
				 			echo "Error: " . $_FILES["file"]["error"] . "<br>";
				  		}
						else
				  		{
						  	echo "Upload: " . $_FILES["file"]["name"] . "<br>";
						  	echo "Type: " . $_FILES["file"]["type"] . "<br>";
						  	echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
						  	echo "Stored in: " . $_FILES["file"]["tmp_name"];
				  		}
					}
					else{ // jeśli plik nie spełnia wymagań
						if( !in_array($format, $allowedFormats) )
							echo "Niepoprawny format";
						if( $_FILES["file"]["size"] > 3145728 )
							echo "Plik za duży";
					}
				}
			?> 
			
			<p><input name="file" type="file"/></p>
			<p><input type="submit" value="wyślij"/></p>
		</form>
		<!--  
			Metody wysyłania form
				$_GET -- Przesyłane wartości są widoczne w adresie URL, pozwala to na dodanie do zakładek strony wygenerowanej prze .php
					     Get posiada limit ilości przesłanych informacji (2000znaków)
						
				$_POST  -- Przesłane wartości są niewidoczne, nie ma ograniczenia długości						   
						   Posiada wsparcie dla (uzupełnić) zaawansowanych technik wysyłania plików
		-->
		
		
		<!-- form walidowany -->
		

	</body>
</html>