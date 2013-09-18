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
					function writeDisplay($file){ // funkjca drukująca zawartość chat.txt na display -- dokończyć
						while( !feof($file) ){
							echo fgets($file);
						}
					}
				
					$message = "";
					$nick = "";
					@$message = $_POST["messageInput"]; // by zapobiec błędu gdy nie wprowadzono informacji do formu
					@$nick = $_POST["nick"];
					
					$chat = fopen("chat.txt", "a");
						fwrite($char, $nick);
						fwrite($chat, $message);		
					
					
					
					
					fclose($chat);
				?>
			</div>
			<form method="post" action=" <?php echo $_SERVER['PHP_SELF']; ?>">
				<p>wiadomość: <input class="input" id="messageInput" name="messageInput" type="text"/></p>
				<p>nick: <input class="input" id="nick" name="nick" type="text"/></p>
				<input id="send" type="submit" value="send"/>
			</form>
		</div>
	</body>
</html>