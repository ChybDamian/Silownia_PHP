
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>MySql </title>
	</head>
	<body>
		<?php
			define('USER', 'test1');
			define('PASSWORD', '1234');
			define('HOST','localhost');
			define('BAZADANYCH', 'test1');
			
			if( $database = mysql_connect(HOST,USER,PASSWORD) ){
				if( !mysql_select_db(BAZADANYCH)){
					trigger_error('Nie udało się połączyć do bazy danych: ' . mysql_error());
					exit();	
				}
			}
			else{
				trigger_error('Nie udało się połączyć do MySql: ' . mysql_error());
				exit();
			}
			
			// NAPISAC QUERY Z PHP
		?>
	</body>
</html>