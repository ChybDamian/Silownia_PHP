<?php
	// fopen( ścieżka dostępu, uprawnienia )
	/*
	 * Uprawnienia: r - read ( od początku pliku )
	 * 				r+ - ready/write ( od początku pliku )
	 * 				w - write ( czyści plik o danej nazwie, albo tworzy jeżeli nie znaleziono pliku)
	 * 				w+ - write/read ( czyści plik o danej nazwie, albo tworzy jeżeli nie znaleziono pliku)
	 * 				a - append (wpisuje na koniec pliku)
	 */ 
	$beton = fopen('beton.txt', 'r') or exit("Nie udało się otworzyć beton.txt");
		// jeżeli nie uda się wczytać pliku(plik nie istnieje itp) to zamknij skrypt i wyświetl wiadomość
	echo '<div style="
			border: 1px solid black;
			border-radius: 10px;
			margin: 10px;
			padding: 10px;
			width: 350px;">
		  <div style="
		  	background-color: lightgrey; 
		  	text-align:center">Zabójczy beton nadchodzi
		  </div>';
		  
		// feof($beton) -- sprawdza czy linika którą ma wydrukować $beton jest końcem pliku (eof - end of file)    
		while( !feof($beton) ){
			echo fgets($beton) . '<br/>'; // fgets($beton) -- wczytuje jedną linijke betonu
		}
	
	echo '<div/>';	
	
	fclose($beton);
	
?>