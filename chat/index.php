<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title> CHAT </title>
		<link rel="stylesheet" href="style.css"/>
	</head>
	<body>
		<div id="chat">
			<div id="display">
				<?php
					
					function displayChat(){
						fgets( $GLOBALS['chatRead'] ); // fwrite pozostawia pustą linie na początku chat.txt
													  // fgets($chatRead) sprawia że następne użycie fgets będzie wczytywało zapisane linie
						while( !feof($GLOBALS['chatRead']) ){
							$nick_and_message = fgets($GLOBALS['chatRead']);
							$array = explode( ',', $nick_and_message);
							echo '<p class="message"><span class="nick">' . $array[0] . ' : </span>' . $array[1] . '</p>';
						}
					}
				
					$chatAppend = fopen('chat.txt', 'a'); // otwórz plik z uprawnieniem do dopisywania do pliku
					$chatRead = fopen('chat.txt', 'r' ); // otwórz plik z uprawnieniem do czytania pliku
					
					if( !empty($_POST["messageInput"]) and !empty($_POST["nick"]) ){ // jeśli dane są wprowadzone do <form>
						$message = $_POST["messageInput"];
						$nick = $_POST["nick"];

						fwrite( $chatAppend, "\n" . $nick . ',' . $message );
						displayChat();
											    											
					}else{ // jeśli wprowadzona tylko nazwa użytkownika wyświetl zawartość chat.txt (refresh)
						displayChat();
					};
					
					fclose($chatRead);
					fclose($chatAppend);
					
				?>
			</div>
			<form method="post" action=" <?php echo $_SERVER['PHP_SELF']; ?>">
				<p class="inputLine">
					 <span>Nick: <input class="input" id="nick" name="nick" type="text"/></span>
					 <span>Wiadomość: <input class="input" id="messageInput" name="messageInput" type="text"/></span>
				</p>
				<p class="inputLine">		
					<input id="send" type="submit" value="Send/Refresh"/>
				</p>
			</form>
		</div>
	</body>
</html>