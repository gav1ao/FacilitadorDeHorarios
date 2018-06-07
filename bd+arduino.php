<html>
<head>
	<meta http-equiv="refresh" content="120">
</head>

<?php
	// Define a timezone oficial do Brasil
	date_default_timezone_set("America/Sao_Paulo");
	
	// Comunicação com o Arduino
	$conexaoArduino = fopen("COM3","w");
	sleep(2); // Espera 2 segundos;
	
	// Para acessar o bd
	$servername = "localhost";
	$username = "vitor";
	$password = "vitor";
	$dbname = "horario";
		
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$hora = date("H:i:s");
	$data = date("d/m/Y");
	$dia = date("w") + 1;
	//$disc = "Banco de Dados";
	
	echo "Hora atual: " . $hora . "<br>";
	echo "Dia: " . $data . "<br><br>";
	
	$sql = "SELECT nomeDisc\n"
    . "FROM horario h\n"
    . "INNER JOIN disciplina d\n"
    . "	ON h.codDisc = d.codDisc\n"
    . "INNER JOIN tempo t\n"
    . "	ON h.codTempo = t.codTempo\n"
    . "INNER JOIN dia\n"
    . "	ON dia.codDia = h.codDia\n"
	. "WHERE horaInicio < \"$hora\" AND horaFim > \"$hora\" AND dia.codDia = \"$dia\""
	//. "WHERE nomeDisc = \"$disc\""
	;
	
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			//echo "Disciplina: " . $row["nomeDisc"]. " - Dia da semana: " . $row["diaSemana"] . "<br>";
			echo "Disciplina: " . $row["nomeDisc"];
			$txt = "Estude: " . $row["nomeDisc"];
			//$txt = $row["nomeDisc"];
			
		}
	}
	else {
		echo "0 results" . "<br>" . "Tempo livre. Aproveite!";
		$txt = "Tempo livre. Aproveite!";
	}
	fwrite($conexaoArduino, $txt);
	
	mysqli_close($conn); // Fecha comunicação com o BD
	fclose($conexaoArduino); // fecha a conexão com o arduino	
?>

</html>