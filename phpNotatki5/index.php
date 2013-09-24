<!-- OGARNĄĆ WYRAŻENIA REGULARNE DO KOŃCA (Derek Banas phpTutorial 8-9) -->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
	</head>
	<body>
		<?php
			function czytelnyArray($arr){
				echo '<pre>'; 
				print_r($arr);
				echo '</pre>';
			}
			
		
			$randomArray = array('Damian', 'Damian Chybek', 'DamianJeż', '123 Main St', 'ST', '123456', '(91)125 34 65', '10/02/2025', '22',
			'chybek@gmail.com', '$1,234', '$3 765', 'Turtle3Dove', '123-453-454', 'p* 1 ','ulica 2 ', '<span>divText</span>', 'pająk', 'palacz', 'pakunek', 
			'S.K.R.Ó.T', 'PL zst.495', '31/12/1995', '31.12.1995', '20-02-95' );
			
			czytelnyArray($randomArray);
			
			/*
			 * \d (0-9) "\d - digits"
			 * \D !\d
			 * \w (a-z,0-9,_) "\w - words"
			 * \W !\w
			 * \s (spacja) "\s - space"
			 * \S !\s
			 * \b (spacja między słowami) "\b - word Boundry"
			 * \B !\b
			 * 
			 * [A-z,.]  - oznacza jeden z podanych pomiędzy nawiasami znaków ( A-Z oznacza duże litery od A do Z );
			 *  		
			 * 
			 * Znaki oznaczające początek i koniec selektora / @ # \ % & ' " `
			 * 
			 * \d{4} - dokładnie 4 liczby
			 * 
			 * \w* - * oznacza 0 lub więcej znaków danego typu
			 * [A-Z]+ - conajmniej jeden znak
			 * [,.]? - oznacza że może być jeden przecinek, ale nie musi
			 * 
			 * ^\d -  ^ oznacza pierwszy znak ( pierwszym znakiem musi być liczba )
			 * \w{3}$ - oznacza zakończenie ( po trzech znakach nie może już nic więcej występować ) 
			 * . - oznacza jakikolwiek znak
			 * ( ) - sprawia że tylko zawartość nawiasów zostanie wysłana jako wybrany text
			 * 
			 * 
			 * (?=[A-Z]+) - w całym stringu musi być conajmniej jeden znak z dużej litery 
			 */
			 											
			$match = preg_grep('%Damian%', $randomArray); // znajduje te elementy które zawierają podane znaki
			echo '<br/><br/>selektor: %Damian% - (element tablicy zawierający następującą kombinacje znaków)';
			czytelnyArray($match);
			
			$match = preg_grep('%\d{3}%', $randomArray);
			echo '<br/><br/>selektor: %\d{3}% - (element tablicy dokładnie 3 następujące po sobie liczby)';
			czytelnyArray($match);
			
			$match = preg_grep('%\d{1,3}%', $randomArray);
			echo '<br/><br/>selektor: %\d{3}% - (element tablicy zawierający od 1 do 3 następujących po sobie liczb)';
			czytelnyArray($match);

			$match = preg_grep('%\d{1,3}%', $randomArray);
			echo '<br/><br/>selektor: %\d{1,3}% - (element tablicy zawierający od 1 do 3 następujących po sobie liczb)';
			czytelnyArray($match);
			
			$match = preg_grep('%^<.*>.*<.*>$%', $randomArray);
			echo '<br/><br/>selektor: %^<.*>(.*)<.*>$}%  - Zaczyna i kończy się się od <> w których znajduje się dowolna ilość znaków ';
			czytelnyArray($match);
			
			$match = preg_grep('%^pa[jąk|lacz|kunek]%', $randomArray);
			echo '<br/><br/>selektor: %^pa[jąk|lacz|kunek]% - Zaczyna się od "pa" po których następuje "jąk" albo "lacz" albo "kunek"';
			czytelnyArray($match);	 	 			
			
			
			$match = preg_grep('%^pa[^lacz|kunek]%', $randomArray);
			echo '<br/><br/>selektor: %^pa[^lacz|kunek]% - drugie użycie ^ oznacza wszystko poza tym co znajduje się w tym kwadratowym nawiasie';
			czytelnyArray($match);	 
			
			$match = preg_grep('%[A-Z]{2}\s[0-9a-z.]{7}%', $randomArray);
			echo '<br/><br/>selektor: %[A-Z]{2}\s[0-9a-z.]{7}% - ';
			czytelnyArray($match);
			
			$match = preg_grep('%^\$[,.]?\d+%', $randomArray); // \$ - $ to znak specjalny dlatego trzeba go oznaczyć \ by był potraktowany jak zwykły znak 
			echo '<br/><br/>selektor: %^\$[,.]?\d+% - ';
			czytelnyArray($match);
			
			
			// next tut
			
			$matchEmail = preg_grep('%[0-9A-Za-z.-_]+@[0-9A-Za-z.-_]+\.[A-Za-z]{2,4}%', $randomArray);
			echo '<br/><br/>selektor: %[0-9A-Za-z.-_]+@[0-9A-Za-z.-_]\.[A-Za-z]{2,4}% - email . jest znakiem specjalnym, dlatego \.';
			czytelnyArray($matchEmail);
			
			$matchData = preg_grep('%0?[1-9]|[12][0-9]|3[01][-/.]0[1-9]|1[12][-/.](19|20)?[0-9]{2}%', $randomArray);
			echo '<br/><br/>selektor: %0?[1-9]|[12][0-9]|3[01][-/.]0[1-9]|1[12][-/.](19|20)?[0-9]{2}% - data \.';
			czytelnyArray($matchData);
			
			//przerobić Derek Banas pt8 10:0+ && pt 9 
			
		?>
		
		
	</body>
</html>