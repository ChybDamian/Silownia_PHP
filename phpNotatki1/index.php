<!DOCTYPE html>
<html>
	<head>
		<title>phpPodstawy2</title>
		<meta http-equiv="content-type" content="text/html"; charset="utf-8"/>
	</head>
	<body>
		<?php
		
			// Float liczby są często tylko przybliżeniem właściwej liczby (ostro porąbane)
			
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
					echo "private: " . @$this->tv . "</br>"; // nie zadziała ponieważ $tv jest private zmienną;
					echo "protected: " . $this->zamekOdDrzwi . "</br>";
				}
				
			}
			
			$object = new Dom2;
			$object->drukuj();
			
		?>
		
		
			
		<?php 
			/*
				Skrypty php można rozkładać na wiele znaczników <?php ?>
			*/
			
		
			$validated = true;
			if($validated): //
		?>
			<h2> Walidacja zakończona sukcesem </h2>
		<?php else: // ?>
			<h2> Odmowa dostępu </h2>
		<?php endif // ?>
		
		<?php
		
		##########################################
			
			echo 'nawiasy w echo: ' . ($x1 ? 2 : 1) . '</br>'; // nawias pozwala wydrukować skomplikowane stwierdzenie w echo
			echo 'nawiasy w echo: ' . $x1 ? 2 : 1 . '</br>';  // gdy pominie się nawiasy wydrukowany zostanie tylko wynik if
			
			
			##########
			## echo ' ' -- zwykły tekst bez nadawania wartości zmiennym ( jedyny znak ucieczki to \' )
			## echo " " -- tekst w którym zmiennym są nadawane wartości,  ( \n, \t, \{, \}, \"  itp... )
			
			echo "</br></br></br>";
			

// Identyfikator służy jako znak początku i końca
// Na końcu poniższej lini nie może się znaleźć nawet komentarz, nie ma tam też;
// Identyfikator kończący musi zostać napisany idealanie tak samo jak pierwszy( wliczając białe znaki -- spacje przed i po wywołają błąd )
			$duzyTekst = <<< identyfikator
				Ten tekst jest napisany
				w wielu
				linijkach w formacie heredoc
identyfikator;
// Nie można wstawić tab ani spacji

			echo $duzyTekst;

		?>		
	</body>
</html>