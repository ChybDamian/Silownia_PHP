<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title> Form z walidacją</title>
		<style>
			form{
				border: 1px solid black;
				margin: 20px auto;
				padding: 20px; 
				width: 400px;
			}
			
			.wymagany{
				margin: 5px;
				color: red;
			}	
		</style>
	</head>
	<body>
		<form action=<?php echo $_SERVER['PHP_SELF']; ?> method="post">
			<?php
				$imieError = $genderError = $imie = $gender = $opis = $email = $emailError =  ""; 
				// deklaracja zmiennych i nadanie wartości pustego ciągu znaków
				// (przypisywanie wartości zachodzi od prawej do lewej) 
				
			
				if($_SERVER["REQUEST_METHOD"] == "POST"){
					if( empty($_POST["imie"]) ){
						$imieError = "Imie jest wymagane";				
					}else{
						$imie = $_POST["imie"]; 
					}
					
					if( empty($_POST["gender"]) ){
						$genderError = "Płeć jest wymagana";
					}else{
						$gender = $_POST["gender"];
					}
					
					$email = $_POST['email'];
					if( !preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email) ){
						$emailError = "Nie poprawny adres email";
					}
					
					@$opis = $_POST["opis"]; 
					// tłumienie błędów( znak: @ )  
					// gdyby input['opis'] nie miał wprowadzonej wartości wyskoczył by błąd 
				
				}
			?>
			
			<h4>Prosty form z walidacją</h4>
			<p><span class="wymagany">*</span>-wymagany</p>
			<p>
				Imie: <span class="wymagany">*</span><input type="text" name="imie"/><span class="wymagany"><?php echo $imieError; ?></span>				
			</p>
			<p>Płeć: <span class="wymagany">*</span>
				<input type="radio" name="gender" value="mezczyzna"/>Mężczyzna
				<input type="radio" name="gender" value="kobieta"/>Kobieta<span class="wymagany"><?php echo $genderError; ?></span>
			</p>
			<p>
				E-mail:<span class="wymagany">*</span><input type="text" name="email"/><span class="wymagany"><?php echo $emailError; ?></span>
			</p>
			<p>Opis: <input name="opis" type="text"/></p>
			<p><input type="submit"  value="submit" /></p>
			
			<h4>INPUT: </h4>
			<?php 
				
				if( $imie )
					echo 'Imie: ' . $imie . '<br/>';
				if( $gender )
					echo 'Płeć: ' . $gender . '<br/>';
				if( $email )
					echo 'E-mail: ' . $email . '<br/>';			
			?>
			
		</form>
	</body>
</html>