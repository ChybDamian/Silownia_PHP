<!DOCTYPE html>
<html>
	<head>
		<title>test</title>
		<meta charset="utf-8" />
	</head>
	<body>
		<h3>strona testowa</h3>
		<?php
			//inicjalizacja zmiennej -- nie trzeba podawać typu
			
			$definicjaZmiennej = "nieTrzebaPodawaćTypu";
			echo $definicjaZmiennej;
			echo '<br/>';
			echo '<br/>';
			$text = 'konkatenacja';
			echo 'Tak dziala ' .  $text . ' ciągów znaków'; // dodawanie stringów 

			/* 
			 * Scopes ( zasięg dostępu zmiennych )
			 * 
			 * 1.Zwykłe zmienne deklarowane w funkcjach nie są dostępne poza nimi
			 * 2.Zmienne deklarowane w poza funkcjami są dostępne w funkcjach za pomocą słowa global
			 * 3.Zmienne statyczne to zmienne które zachowują swoją wartość z poprzedniego wywołania funkcji  
			 * 
			*/
			
			$globalVar = 4;
			
			function testGlobalScope(){
				// echo $globalVar; -- spowoduje błąd
				global $globalVar; // Pozwala uzyskać dostęp do zmiennych zdefiniowanych poza funkcją (zmienne globalne)
				echo '<br/>';
				echo 'Zmienna globalna w funkcji: ' . $globalVar;
				echo '<br/>';
			}
			testGlobalScope();
			// STATIC SCOPE
			
			function staticScope(){
				static $ileRazy = 0; // definicja zmiennej statycznej				
				$ileRazy++;	
				echo '<br/>';
				echo 'funckja została wywołana: ' . $ileRazy . 'razy';
			}
			
			staticScope();
			staticScope();
			staticScope();
			
			echo '<br/>';
			
			
			//ARRAY'e -- Tablice
			
			$arrayTest = array(2,4,6,8); // deklaracja Tablicy 
			// $arryText[0] = 2 itp.
			
			// W php można używać textu zamiast index'u
			$arrayTextZamiastLiczb = array( 'dom' => 230000, 'kupa', 'snikers' => 2.30, 'komputer' => 1200  );
			// $arrayTextZamiastLiczb['dom'] = 230000
			// $arrayTextZamiastLiczb[0] = 'kupa' -- elementom tablicy do których nie jest przypisany tekst zostanie automatycznie przypisana
			// 										 liczba jak w typowej tablicy 
			
			echo '$arrayTextZamiastLiczb[dom]: ' . $arrayTextZamiastLiczb['dom']; // = 230000
			echo '<br/>';
			echo 'arrayTextZamiastLiczb[0]: ' . $arrayTextZamiastLiczb[0]; //  = kupa
			echo '<br/>';
			
			
			echo 'count($arrayTest): ' . count($arrayTest) . '<br/>'; // zwraca ilosc elementów array'a
			
			
			/*
			 * Jako że w elementy Tablicy mogą być przypisywane za pomocą tekstu zamiast liczb, iteracja w taki sposób nie zadziała:
			 *  
			 * for( $i = 0; i<count($array); $i++ ){
			 * 		echo $array[$i];
			 * }
			 *
			 * 
			 *  Dlatego w php jest dostępna funckja foreach
			 */
			 
			echo '<br/><br/>';
			echo 'ITERACJA TABLICY: <br/>';
			foreach ($arrayTextZamiastLiczb as $key => $value) { // $key -- wartość do której jest przypisany element Tablicy
																 // $value -- wartość elementu tablicy								
																 		 
				echo 'Klucz: ' . $key . ' => Wartość: ' . $value . '<br/>';
			}
			
			
			/* można też używać :
		     *  foreach($array os $value )  -- jeśli nie potrzebujemy klucza
			 *  foreach($arry as $key) -- jeśli nie porzebujemy wartości
			 */ 
			 			
			// funkcja drukująca Tablice i obiekty w czytelny sposób -- może się przydać przy szukaniu błędów
			
			function czytelnyObjectArray( $x = array(1,2,3) ){ // domyślna wartość argumentu -- jeżeli funkcja zostanie wywołana bez argumentów 
				echo '<pre>';									// to $x będzie miał wartość array(1,2,3)
				print_r( $x ); // funkcja drukująca ciurkiem zawartość tablic i obiektów -- <pre></pre> sprawia że jest drukowany
				echo '<pre>'; 
			}
			
			echo '<br/>';
			echo 'CzytelnyArray:';
			czytelnyObjectArray(); // wyświetli $x = array(1,2,3)
			
			echo '<br/>';
			
			
			echo 'var_dump($arrayTest): <br/><br/>';
			var_dump($arrayTest); // funkcja drukuje informacje na temat zmiennej wraz jej typem ()
			

			
			class Dom{
				function Dom($kolor, $okna){ // konstruktor klasy - funkcja z taką sama nazwą jak nazwa klasy
					$this->kolor = $kolor; // dodawnia właściwości
					$this->okna = $okna;
				}
				
				function method(){
					echo $this->kolor . ' ' . $this->okna;
				}
			}
			
			$duzyDom = new Dom("zielony", 10); 
			
			// STRING FUNCTION
			
			$length = strlen('string'); // zwraca długość przekazanego do funkcji tekstu
			$indexOfString = strpos("dlugi string", "string"); // zwraca index pierwszego znaku drugiego argumentu	
			
			
			//definiowanie stałej
			define('nazwaStałej','zawartosc', true); // true -- opcjonalny , oznacza że stała ma nie być czuła na wilkośc liter

			  
			/* Nowe operatory (reszta tak jak c++)
			 * 
			 *  <> - różne od (c++ : !=)     
			 * and - (c++ : &)
			 * or (c++: ||)
			 */
			  
			if( 4 <> 2 and 1 or 0 ){
				//..
			}
			elseif( 1<>2 ){  // W php można napisać elseif() zamiast else if()
				//..
			}			
			
			// Rzutowanie typów -- sprawia że zmienna jest traktowana jak by była innego typu
			
			$number = 2.4; // flaot
			$intNumver = (int)$number; // =2 
			
			$array1 = array( "text" => 1, "text1" => 2, 3, 4, 5 );
			$object = (object)$array1;  // elementy Tablicy są przypywane jako właściwości obiektu
			
			echo '<br/><br/>';
			echo '$array1: <br/>';
			czytelnyObjectArray($array1);
			
			echo '<br/><br/>';
			echo '$object = (object)$array1: <br/>';
			czytelnyObjectArray($object);
				
			echo '<br/><br/>';
			echo '$duzyDom: <br/>';
			czytelnyObjectArray($duzyDom);	
			
			
			// ARRAY's
			

			
			echo 'oceny: <br/>';
			asort( $oceny ); // sortowanie względem wartości (od najmniejszej, zachowuje klucze );
			czytelnyObjectArray( $oceny ); //
			arsort( $oceny ); // sortowanie względem wartości (od największej, zachowuje klucze ); ar -- array reverse
			czytelnyObjectArray( $oceny );
			ksort( $oceny ); // sortowanie zględem kluczy, ( od najwiekszej )
			czytelnyObjectArray( $oceny );
			krsort( $oceny ); // sortowanie zględem kluczy, ( od najmniejszej )
			czytelnyObjectArray( $oceny );
			asort( $oceny ); // sortowanie względem wartości ( od najmniejszej, nie zachowuje kluczy )
			czytelnyObjectArray( $oceny );
			arsort( $oceny ); // sortowanie względem wartości ( od największej, nie zachowuje kluczy )
			czytelnyObjectArray( $oceny );			
		?>
		
	</body>
</html>
