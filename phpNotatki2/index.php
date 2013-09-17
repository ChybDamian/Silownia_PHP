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
					bezpieczneDrukowanie($_POST["imie"]);
				}
			?>
			
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