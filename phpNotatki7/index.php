
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title> Programowanie obiektowe PHP </title>
	</head>
	<body>
		<?php
		
			// ogarnąć ERRORS
			error_reporting(E_ALL);
			
			$num=1;
			$num1=0;
			
			function error_wrangler($num,$num1){
				if($num1 == 0){
					throw new Exception("nie można dzielić 0");
				}
				
				return true;
			}
			
			try
			{
				error_wrangler($num0,$num1);
				echo $num . ' podzielone przez ' . $num1 . ' = ' . $num/$num1;
			}
			
			catch(Exception $e){
				echo 'Błąd: ' . $e->getMessage() . '<br/>' . $e->getFile() . '<br/>' . $e->getLine();
			}
				
		?>		
	</body>
</html>