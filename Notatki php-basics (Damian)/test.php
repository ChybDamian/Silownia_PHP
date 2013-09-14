<!DOCTYPE html>
<html>
	<head>
		<title>test</title>
		<meta charset="utf-8" />
	</head>
	<body>
		<h3>strona testowa</h3>
		<?php
			echo 'echo <br/>';
			$definicjaZmiennej = "nieTrzebaPodawaćTypu";
			echo $definicjaZmiennej;
			$definicjaZmiennej = 2;
			echo '<br/>';
			echo $definicjaZmiennej;
			echo '<br/>';
			echo "konkatenacja string'ow: " . $definicjaZmiennej; // concatenacja string
			
			
			// GLOBAL SCOPE
			$globalVar = 4;
			
			function testGlobalScope(){
				global $globalVar; // 
				echo '<br/>';
				echo $globalVar;
				echo '<br/>';
			}
			testGlobalScope();
			// STATIC SCOPE
			
			function staticScope(){
				static $static = 0; // działa jak wszędzie
				$static++;	
				echo '<br/>';
				echo $static;
				echo '<br/>';
				var_dump($static); // zwraca typ i wartość zmiennej
			}
			
			staticScope();
			staticScope();
			
			function readableObjectArray( $x = array(1,2,3) ){ // domyślna wartość
				echo '<br/>';
				echo '<pre>';
				print_r( $x );
				echo '<pre>';
				echo '<br/>';	
			}
			
			//ARRAY'e
			
			$arrayTest = array(2,4,6,8);
			echo '<br/>';
			var_dump($arrayTest);
			
			class Home{
				function Home($color, $windows){ // konstruktor klasy - funkcja z taką sama nazwa jak nazwa klasy
					$this->color = $color; // dodawnia właściwości
					$this->windows = $windows;
				}
				
				function method(){
					echo $this->color . ' ' . $this->windows;
				}
			}
			
			$blok = new Home("green",234);
			
			// string functions
			
			$length = strlen('string');
			$indexOfString = strpos("dlugi string", "string"); // zwraca index pierwszego znaku drugiego argumentu	
			
			define('nazwaStałej','zawartosc', true); // true -- opcjonalny , oznacza że stała ma być nie czuła na wilkośc liter
			

			if( 4 <> 2 and 1 or 0 ){  // <> === !=
				echo '<br/>';
				echo "true";
				echo '<br/>';
			}
			elseif( 1<>2 ){ // elseif zamiast else if
				//..
			}			
			
			
			// rzutowanie array na object i na odwrót
			
			$array1 = array( "text" => 1, "text1" => 2, 3, 4, 5 );
			$object = (object)$array1;
			readableObjectArray($object);
			

				
			readableObjectArray($array1);
			readableObjectArray($object);	
			readableObjectArray($blok);	
			
			$float = 2.5;
			$int = (int)$float;			
			
			
			// ARRAY's
			
			$arrTest = array( 1, 2, 3, 4 );
			echo '<br/>';
			echo 'count(var): ' . count($arrTest);
			echo '<br/>';
			
			$oceny = array( 'damian' => 6, 'lukasz' => 4, 'tomek' => 5 );
			echo $oceny['damian'];
			
			echo 'oceny';
			foreach( $oceny as $key => $value ){
				echo $key. ': ' . $value . '<br/>';
			}
			
			echo 'oceny: <br/>';
			asort( $oceny ); // sortowanie względem wartości (od najmniejszej, zachowuje klucze );
			readableObjectArray( $oceny ); //
			arsort( $oceny ); // sortowanie względem wartości (od największej, zachowuje klucze ); ar -- array reverse
			readableObjectArray( $oceny );
			ksort( $oceny ); // sortowanie zględem kluczy, ( od najwiekszej )
			readableObjectArray( $oceny );
			krsort( $oceny ); // sortowanie zględem kluczy, ( od najmniejszej )
			readableObjectArray( $oceny );
			asort( $oceny ); // sortowanie względem wartości ( od najmniejszej, nie zachowuje kluczy )
			readableObjectArray( $oceny );
			arsort( $oceny ); // sortowanie względem wartości ( od największej, nie zachowuje kluczy )
			readableObjectArray( $oceny );			
		?>
		
	</body>
</html>
