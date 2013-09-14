<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html" charset="utf-8"/>
		<title>php podstawy 1</title>
	</head>
	<body>
		<?php // można też użyć <script language="php"> ... </script>
				
		
			// Różnica pomiędzy " " i ' ';
			// " " - zmienne są wyświetlane, / jest znakiem specjalnym
			// ' ' - trakruje zawartosc jak zwykły tekst 
			
			$x = 2;
			echo "STRING <br/><br/>";
			echo "Hello $x world! <br/>";
			echo 'Hello $x world! <br/>';
			
			// Array'e pozwalają na klucze w postaci stringów, można je mieszać zwykłymi kluczami liczbowymi
			
			$arr = array( "kot", "pies", "wiewiorka",
						  "samochod" => "audi",
						  "motor" => "honda");
			
			echo "<br/> ARRAY <br/><br/>";			  
			echo $arr[0] . " " . $arr["motor"] . "<br/>";
			
			// Iteracja array
			
			echo "<br/>ITERACJE <br/><br/>  ";
			
			foreach( $arr as $value ){
				echo "xxx : {$value} <br/>";   // co robi { }
			}
			
			echo "<br/>ITERACJE <br/><br/> ";
			
			foreach( $arr as $key => $value ){
				echo "key: $key, value: $value <br/>";
			}
			
			// Konstrukcja klasy
			
			echo "<br/>KONSTRUKCJA KLASY<br/><br/>";
			
			class Person{
				public $name = '';
				
				public function name( $newname = NULL ){  // wartość domyślna
					if( !is_null($newname) ){ 
						$this->name = $newname;					
					}
					
					return $this->name;
				}					
				
			}
			
			$damian = new Person;
			echo "Masz na imie " . $damian->name("Damian") . "</br>";
			echo "Masz na imie $damian->name</br>";
			
			//referencja 
			
			$x = 2;
			$y =& $x;
			
			// by uniknąć kopiowania dużej ilości pamięci
			
			echo "</br>PRZYKLAD UZYCIA REFERENCJI</br></br>";
			
			function &duzyArray( $dolnyPrzedzial, $gornyPrzedzial ){  // funkcja zwraca referencje
				$arr = array();
				
				for( ; $dolnyPrzedzial<=$gornyPrzedzial; $dolnyPrzedzial++ ){
					array_push( $arr, $dolnyPrzedzial ); // dodawanie elementów do array, można podać kilka elementów
														 // array_push( $arr, $x1, $x2 );
				}
				
				return $arr;
			};
			
			$listaLiczb =& duzyArray( 10,106 );  // dzięki referencji array nie jest kopiowany do kolejnej zmiennej			
			
			
			foreach( $listaLiczb as $value ){
				static $i = 0;	
				echo $value . ", ";
				$i++;
				if( !($i%10) ) echo "</br>";
			}
			
			function doubler( &$x, $ileRazy = 1 ){  // wartość domyślna
				return $x << $ileRazy;
				$iloscArgumentówFunkcji = fun_num_args();
				$arrayZeWszystkimiArgumentami = fun_get_args();
				$wartoscWybranegoArgumentu = fun_get_arg(0); // index
				
			};
			
			$x = 1;
			doubler($x);
			echo "</br></br>Argument jako referencja:  $x</br></br>";	
			
			
			//SCOPE, ZASIĘG ZMIENNYCH
			
				//global
			function updateLicznik(){
				global $licznik;
				//GLOBALS[licznik]  <- inny sposób
				$licznik++;
			}
			
			echo "</br></br>Global scope: ";
			$licznik = 10;
			updateLicznik();
			echo $licznik . "</br>";
			
			
				//static			
			echo "STATIC scope: ";
							
			function iloscKlikniec(){
				static $i = 0;  //zapamiętuje wartość zmiennej dla tej funkcji 
				$i++;
				echo $i .", ";									
			}
			
			iloscKlikniec();
			iloscKlikniec();
			
			// INCREMENTACJA STRING
			echo "</br></br>INCREMENTACJA ZNAKOW:</br> ";
			$zn = "az";
			$zn++;
			echo "\"az\"++= $zn</br>";
			$zn = "B9";
			$zn++;
			echo "\"B9\"++= $zn</br>";
			
			
			
			
		######################################
		######################################
		// nie ma { }, forma if z pythona	
			
			$user_validated = false;
			
			if ($user_validated):
				echo "Welcome!";
				$greeted = 1;
			else:
				echo "Access Forbidden!</br></br>";
				//exit;
			endif;
				
		####################################
		####################################
			
			echo "ZASTOSOWANIE TICKS & DECLARE</br></br>";
			
			function wiadomosc(){
				echo "</br></br>Tick zostal uruchomiony</br></br>";
			}
			
			
			register_tick_function("wiadomosc");
			declare(ticks=50){
				foreach( $listaLiczb as $value ){
					echo $value . ", ";
					
				}
			}
			
		
		include "div.html";
		require "required.html";
		
		@include "nieistniejącyPlik.html";   // @ - tłumienie błędów, nie wyskoczył błąd pomimo że element nie istnieje
		
		//  include_once && require_once  - pozwala używać tych operacji w pętli, pliki zostaną dodane tylko raz 
		
		######################################
		//funkcja przyjmująca argumenty które są classą, array'em, albo funkcją
		
		class Dog{
			public $lapy;
			public $glowa = 1;
			
		};
		
		function dogs( Dog $x ){  // radziała tylko jeżeli argument(reksio) jest typu Dog
			$x-> lapy = 4;
		};
		
		$reksio = new Dog;
		
		dogs( $reksio );			
		
		echo "</br></br> reksio ma: $reksio->lapy  łapy</br></br>";
		
		
		######################################
		//Funkcja zwracająca wiele wartości
		
		function returnMultiple(){
			return array(32,453,325,"sdfs");
			}	
		
		
		
		#######################################
		
		// exit; a.k die; - zatrzymuje wykonywanie skryptu;
		// die("message") - message zostenie wyświetlony przed zakończeniem wykonywania
		
			die("</br>die(); - KONIEC");
			
			echo "</br>To nie zostanie wydrukowane";
			
		
		// strona 73
										
		?>

		

		
	</body>
</html>