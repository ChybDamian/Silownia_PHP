<!DOCTYPE html>
<html>
	<head>
		<title>phpPodstawy2</title>
		<meta http-equiv="content-type" content="text/html"; charset="utf-8"/>
	</head>
	<body>
		<?php
		
			// Float liczby są często tylko przybliżeniem właściwej liczby
			
			echo "Float liczby są często tylko przybliżeniem właściwej liczby. " . "</br></br>";
			
			$f1 = 0.1;
			$f2 = 0.7;
			echo floor(($f1 + $f2)*10) . "</br>"; // return 7 mimo że powinno być 8
			
			// ISSET
						
			echo "</br> ISSET"  . "</br></br>"; // sprawdza czy zmiennej została nadana wartość
			$x1;
			echo  isset($x1) ? "Wartość nadana" : "wartość nie nadana";
			echo  "</br>";
						
			$x1 = 2;
			echo  isset($x1) ? "Wartość nadana" : "wartość nie nadana";
			echo  "</br>";
			
			// SCOPES PROTECTED I PRIVATE
			
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
					echo "private: " . @$this->tv . "</br>"; // nie działa
					echo "protected: " . $this->zamekOdDrzwi . "</br>";
				}
				
			}
			
			$object = new Dom2;
			$object->drukuj();
			
			// RZUTOWANIE OBIEKTU NA ARRAY I NA ODWRÓT

			echo "</br>RZUTOWANIE OBIEKTU NA ARRAY I NA ODWRÓT" . "</br></br>";			
						
			class Car{
				public $wheels = 4;
				public $doors = 2;
				public function openDoor(){
					echo "door opened" . "</br>";
					
				}
			}
			
			$bmw = new Car;
			$bmwArray = (array) $bmw;
			// w wyniku rzutowania object na array tylko properties są przypisywane do array'a
			echo "object to array: ";
			print_r($bmwArray);
			echo "</br>";
			
			$bmwArrayToObject = (object) $bmwArray;
			echo "array to object: ";
			echo $bmwArrayToObject->doors;
		
		
		#########################################	
		?>
		
		<?php 
			$validated = true;
			if($validated): //
		?>
			<h2> Walidacja zakończona sukcesem </h2>
		<?php else: // ?>
			<h2> Odmowa dostępu </h2>
		<?php endif // ?>
		
		<?php
		##########################################
			
			echo 'nawiasy w echo: ' . ($x1 ? 2 : 1) . "</br>";
			echo "nawiasy w echo: " . $x1 ? 2 : 1 . "</br>";  // gdy pominie się nawiasy wydrukowany zostanie tylko wynik if
			
			
			##########
			## echo ' ' -- zwykły tekst bez nadawania wartości zmiennym ( jedyny znak ucieczki to \' )
			## echo " " -- tekst w którym zmiennym są nadawane wartości,  ( \n, \t, \{, \}, \"  itp... )
			## 
			
			echo "</br></br></br>";
			
$duzyTekst = <<< identyfikator
	to jest tekst napisany
	w wielu liniach za pomoca heredoc
identyfikator;

echo $duzyTekst;

	// w linii w której znajduje się identyfikator zakończenia heredoc nie może znajdować się nic innego, nawet komentarz
	// identyfikator musi być dokładnie taki sam, nie mogą znajdować się tam dodatkowe spacje 

		
	
	     
			
		
		
		?>
		
	</body>
</html>