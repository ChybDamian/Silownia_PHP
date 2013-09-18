<!DOCTYPE html>
<html>
	<head>
		<title> PHP -  zaawansowane </title>
		<link rel="stylesheet" href="style.css"/>
		<meta charset="UTF-8"/>
	</head>
	<body>
		<?php
			function czytelnyArray($x){
				echo '<pre>';
				print_r($x);
				echo '</pre>';				
			};
			 
			// Wielowymiarowe Tablice - Multidimensional Array's
			
			$arrayZwykly = array(1,2,3,4);
			
			$arrayDwuwymiarowy = array(
				array(1,2,3,4),
				array(5,6,7,8),
				array(9,10,11,12)
			);
			 
			czytelnyArray($arrayDwuwymiarowy);
			echo '$arrayDwuwymiarowy[1][0] = ' . $arrayDwuwymiarowy[1][0]; // 5

			
			// ciekawszy przykład
			
			$zarobki = array(
				"Bill_Gates" => array( '72mld', 57 ),
				"Steve_Jobs" => array( '8,3mld', 56 ),
				"Latający_Potwór_Spagetti" => array( '∞', '∞' )
			);
			
			czytelnyArray($zarobki);
			
			echo 'Bill Gates: <br/> Majątek: ' . $zarobki['Bill_Gates'][0] . '<br/>lat:   ' . $zarobki['Bill_Gates'][1] . '<br/>';
			// Kilka różnych sposobów na wydrukowanie czasu/daty
			// http://php.net/manual/pl/function.date.php -- dokładna specyfikacja wszystkich opcji
			
			echo 'date("Y/M/D") = ' . date('D/M/Y') . '<br/>'; // słownie
			echo 'date("d.m.y") = ' . date('d.m.y') . '<br/>'; // liczbami
			echo 'date("Y/M/D") = ' . date('l-F-Y') . '<br/>'; // słownie (bez skrótów)
			echo 'date("Y/M/D") = ' . date('d xXx m xXx Y') . '<br/>';// Między znaki decydujące o tym jak zostanie wyświetlona data możesz wstawić
																	  //niemalże dowolne znaki ( które nie są możliwymi opcjami tej funkcji -- patrz link powyżej ) 
			echo 'date(g,i,s,a) = ' . date('G:i:s') . '<br/>'; 	// aktualna godzina
			
			/* mktime(hour,minute,second,month,day,year,is_dst) -- pozwala stworzyć date wybranego dnia
			 * date( "argument1", $argument2)
			 * 		$argument2 - zmienna stworzona przy pomocy mktime (jeśli nie podany, weźmie dzisiejszą date )
			 * 	    $argument1 - ciąg znaków opisujące które i w jakiej formie wydobyć elementy 
			 */
			
			// 10 lat, 2 miesiące i 3 dni temu był
			$staraData = mktime( 0,0,0, date('m')-2, date('d')-3, date('y')-10 );
			echo 'stara data: ' . date( "d/m/Y", $staraData ) . '<br/>'; 
		
			
			include 'beton.php';
			include 'char.php';
			
		?>			
		
		

	</body>
</html>