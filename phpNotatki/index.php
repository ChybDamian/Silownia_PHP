<!DOCTYPE html>
<html>
	<head>
		<title>test</title>
		<meta charset="utf-8" />
	</head>
	<body>
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
			
			
			echo 'count($arrayTest): ' . count($arrayTest) . '<br/>'; // count() zwraca ilosc elementów array'a
			
			
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
			
			/* można też używać:
		     *  foreach($array as $value )  -- można uzyskać dostęp do 
			 *  foreach($arry as $key) -- jeśli nie porzebujemy wartości
			 */ 
			 			
			// funkcja drukująca Tablice i obiekty w czytelny sposób -- może się przydać przy szukaniu błędów
			
			function czytelnyObjectArray( $x = array(1,2,3) ){ // domyślna wartość argumentu -- jeżeli funkcja zostanie wywołana bez argumentów 
				echo '<pre>';									// to $x będzie miał wartość array(1,2,3)
				print_r( $x ); // funkcja drukująca ciurkiem zawartość tablic i obiektów -- <pre></pre> sprawia że jest drukowany
				echo '</pre>'; 
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
			
			$oceny = array( 'piotr' => 3, 'magda' => 4, 'adam' => 2, 'syriusz' =>6 );
			
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
			
			
			// REFERENCJA -- przypisanie adresu komórki zamiast kopiowania wartości
			$x = 2;
			$y =& $x;
			
			//PRZYKLAD UZYCIA REFERENCJI</br></br>
			
			
			function &duzyArray( $dolnyPrzedzial, $gornyPrzedzial ){  // funkcja zwraca referencje 
				$arr = array();
				
				for( ; $dolnyPrzedzial<=$gornyPrzedzial; $dolnyPrzedzial++ ){
					array_push( $arr, $dolnyPrzedzial ); // dodawanie elementów do array, można podać kilka elementów
														 // array_push( $arr, $x1, $x2 );
				}
				
				return $arr;
			};	
			
			$listaLiczb =& duzyArray( 10,100 );  
			// Dzięki referencji ten 90-cio elementowy array nie jest kopiowany do kolejnej zmiennej
			// zamiast tego do $listaLiczb zostaje przekazany adres do miejsca w którym już aktualnie znajduje się $arr z funkcji duzyArray
			
			
			
			
			// Ta funkcja da sobie radę z nieograniczoną ilością argumentów
			function pomnóżWszystkie( $x, $domyślna = 1 ){  // wartość domyślna
				$iloscArgumentówFunkcji = func_num_args();
				$arrayZeWszystkimiArgumentami = func_get_args();
				$wartoscWybranegoArgumentu = func_get_arg(0); //uzyskuje dostęp do argumentu funkcji o podanym index'ie
				
				//Dzięki tym funkcją można sprawić by funkcja działała z nieokreśloną liczbą argumentów np:
				$wynik = 0;
				
				for( $i = 0; $i<$iloscArgumentówFunkcji; $i++ ){
					$wynik += func_get_arg($i);
				}
				
				return $wynik;
			};
			
			$duzaLiczba = pomnóżWszystkie( 2,3,5,6,7,1,6,5,45,6,78 ); // 
			echo 'pomnóżWszystkie( 2,3,5,6,7,1,6,5,45,6,78 ) = ' . $duzaLiczba;
			
			
			// W PHP  MOŻNA INCREMENTOWAĆ CIĄGI ZNAKÓW
			echo "</br></br>INCREMENTACJA ZNAKOW:</br> ";
			$zn = "aa";
			$zn++;
			echo "\"aa\"++= $zn</br>";
			
			$zn = "az";
			$zn++;
			echo "\"az\"++= $zn</br>";
			$zn = "B9";
			$zn++;
			echo "\"B9\"++= $zn</br>";
			
			echo '<br/><br/>';
			
			
			######################################
			// nie ma { }, (forma if używana w python'ie)
			
			$user_validated = false;
			
			if ($user_validated):
				//..
			else:
				//..
			endif;
	
			#######################################
			
			include "div.html"; //pozwala dołączać html w osobnych plikach -- (Można w ten sposób dołączać elementy występujące na wszystkich podstronach)
			require "required.html";	
			@include "nieistniejącyPlik.html";  // @ - tłumienie błędów, nie wyskoczył błąd pomimo że element nie istnieje
			require "informacje.php";
			echo '$użytkownicyOnline = ' . $użytkownicyOnline; // zmienna dołączona w pliku zmienne.php
			
			//  include_once && require_once  - pozwala używać tych operacji w pętli, pliki zostaną dodane tylko raz 
			
			
			// funkcja zwracająca wiele wartości na raz
			
			function returnMultiple(){
				return array(32,453,325,"sdfs");
			}	
		
			$x = returnMultiple();
			// echo $x[1]; /453;
			
			
			
			// Float liczby są często tylko przybliżeniem właściwej liczby (ostro porąbane)
			
			echo "Float liczby są często tylko przybliżeniem właściwej liczby. " . "</br></br>";
			
			$f1 = 0.1;
			$f2 = 0.7;
			echo floor(($f1 + $f2)*10) . "</br>"; // return 7 mimo że powinno być 8
			
			// ISSET -- sprawdza czy zmiennej została nadana wartość
						
			echo "</br> ISSET"  . "</br></br>"; // 
			$x1;
			echo  isset($x1) ? "Wartość nadana" : "wartość nie nadana";
			echo  "</br>";
						
			$x1 = 2;
			echo  isset($x1) ? "Wartość nadana" : "wartość nie nadana";
			echo  "</br>";
		
		
			echo 'nawiasy w echo: . ($x1 ? 2 : 1) = ' . ($x1 ? 2 : 1) . '</br>'; // nawias pozwala wydrukować skomplikowane stwierdzenie w echo
			echo 'nawiasy w echo: . $x1 ? 2 : 1 ' . $x1 ? 2 : 1 . '</br>';  // gdy pominie się nawiasy wydrukowany zostanie tylko wynik if ( bez tekstu w cudzysłowiach )
			
			
			// SCOPES PROTECTED I PRIVATE -- PROGRAMOWANIE OBIEKTOWE(jak nie ogarniasz to nie czytaj)
			
			echo "</br>SCOPES PROTECTED I PRIVATE" . "</br></br>";
			
			class Dom{
				public $drzwi = "drzwi"; // dostępne wszędzie
				public $okno = "okno";
				private $tv = "tv"; // dostępne tylko w tej classie
				protected $zamekOdDrzwi = "zamekOdDrzwi"; // dostępne w tej classie i w clasach które z niej dziedziczą
				
			}
			
			class Dom2 extends Dom {
				public function drukuj(){
					echo "extended class drukuje: ". "</br>";;
					echo "public: " . $this->drzwi . "</br>";
					echo "public: " . $this->okno . "</br>";
					echo "private: " . @$this->tv . "</br>"; // nie zadziała ponieważ $tv jest private zmienną;
					echo "protected: " . $this->zamekOdDrzwi . "</br>";
				}
				
			}
			
			// exit; a.k.a die; - zatrzymuje wykonywanie skryptu;
			// die("message") - message zostenie wyświetlony przed zakończeniem wykonywania
			
			
			
			
			
			die("<br/>die(); - KONIEC"); // exit("wiadomość") -- działa tak samo
			echo "<br/>To nie zostanie wydrukowane ponieważ skrypt został zakończony za pomocą die();"; 
		?>
		
	</body>
</html>
