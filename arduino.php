<?php
	echo "Teste Vitor <br>";
	echo "<br>" . date("Y") . "<br>";
	date_default_timezone_set("America/Sao_Paulo");
	
	echo $_POST["numero"];
	$conexaoArduino = fopen("COM3","w");
	sleep(2); // Esperar um pouco, no caso 2 segundos
		/* Primeiro parametro passado é a porta,
		e o segundo parametro é o tipo que será feito, no caso, w = write (escrita)
		*/
	fwrite($conexaoArduino,$_POST["numero"]);
	//fwrite($conexaoArduino, date("H:i:s") );
		/* pela write me mostra aonde vou escrever (1º);
		2º o que irei escrever*/
	fclose($conexaoArduino);
		// fecha ao conexão arduino
?>

<form action="arduino.php" method="post">
Name: <input type="text" name="numero"><br>
E-mail: <input type="text" name="email"><br>
<input type="submit">
</form>