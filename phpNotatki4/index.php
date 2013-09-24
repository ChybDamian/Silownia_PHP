<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Web Design and Programming part 1-5</title>
	</head>
	<body>
		<?php
			$var = 1;
			echo gettype($var) . '<br/>'; // zwraca typ zmiennej
			is_array($var);
			is_string($var);
			is_bool($var);
			is_integer($var);
			is_float($var);
			
			$nr = 2;
			if( ($nr == 2) XOR is_string($nr) ){ // XOR - Jeśli jeden argument jest wykonaj if, ( jeśli oba są prawdziwe, nie wykonuj if )
				//echo 'xor';
			}				
			
			$arr1 = array('name' => 1, 2, 3, 4);
			$arr2 = array(5, 6, 7, 8);
			
			$arr1 = array_merge($arr1, $arr2); // łączy tablice
			
			if(array_key_exists( 'name', $arr1 )) echo 'key 0 znaleziony <br/>';
			if(array_search(8, $arr1)) echo "wartość znaleziona <br/>"; // array_search() zwraca key elementu tablicy
			if(in_array(8, $arr1)) echo "wartość znaleziona <br/>"; // in_array() zwraca true jeżeli znalazło element
			
			function czytelnyArray($arr){
				echo '<pre>';
				print_r($arr);
				echo '</pre>';
			}
			
			echo 'array_keys($arr1) <br/>';
			czytelnyArray(array_keys($arr1)); // lista kluczy
			
			$string = 'text1,text2,text3,text4,text5';
			$arrFromString = explode(',', $string );
			czytelnyArray($arrFromString);
			czytelnyArray(array_reverse($arrFromString)); // odwraca kolejność
			$stringFromArray = implode(' xXx ', $arrFromString );
			echo '$stringFromArray : ' . $stringFromArray;
			
			$zbiorLiczb = range(10,50); // zwraca tablice składającą się z liczb z danego przedziału
			$textTxt = file('text.txt'); // wczytuje zawartość pliku do zmiennej
			//list
			$info = array('Damian', '18', 'jeż');
			list($imie,$wiek,$ksywka) = $info; // przypisuje kolejne elementy tablicy $info do zmiennych podanych w list (działa tylko z indexami liczbowymi startującymi od 0)
			rand(1,100); // losowa liczba
			
			
			function referencja(&$ref){ // & -- sprawia że argument jest referencją do zmiennej a nie wartością
				$ref = 200;
			}
			
			$globalVar = 100;
			referencja($globalVar);
			$globalVar; // globalVar == 200
			
			
			function rekurencyjnieSilnia($num){
				if( $num  == 1 ){
					return 1;
				}
				else{
					return $num * rekurencyjnieSilnia($num-1);
				}
			}
			
			echo '<br/>';
			echo rekurencyjnieSilnia(4);
		?>
		
		
		
		<form style="border:1px solid black; margin:10px; width: 200px; text-align: center;" action=<?php echo $_SERVER['PHP_SELF']; ?> method='post'>
			<p>
				text:
				<input name="text" type="text"/>
				<input type="submit" value="wyślij"/>
			</p>
			<?php
				echo @$_REQUEST['text'] . '<br/>'; // $_REQUEST pozwala wyciągnąć za pomocą get i post;
												   // @ - po to by nie wyskoczył błąd gdy input[name="text"] jest pusty
			?>
		</form>
		
		
		
	</body>
</html>