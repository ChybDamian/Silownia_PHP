<!DOCTYPE html>
<html>
	<head>
		<title> PHP -  zaawansowane </title>
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
				"Bill_Gates" => array( '72mld', 57, true ),
				"Steve_Jobs" => array( '8,3mld', 56, false),
				"Latający_Potwór_Spagetti" => array( '∞', '∞', true)
			);
			
			czytelnyArray($zarobki);
			
			echo 'Bill Gates: <br/> Majątek: ' . $zarobki['Bill_Gates'][0] . '<br/>lat:   ' . $zarobki['Bill_Gates'][1] . '<br/>Nadal żyje? ' . $zarobki['Bill_Gates'][2];
			
			
			
			
		?>
	</body>
</html>