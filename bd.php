<?php
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
	
	$sql = "SELECT nomeDisc, horaInicio, horaFim, diaSemana\n"
    . "FROM horario h\n"
    . "INNER JOIN disciplina d\n"
    . "	ON h.codDisc = d.codDisc\n"
    . "INNER JOIN tempo t\n"
    . "	ON h.codTempo = t.codTempo\n"
    . "INNER JOIN dia\n"
    . "	ON dia.codDia = h.codDia\n";
	
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			echo "Disciplina: " . $row["nomeDisc"]. " - Dia da semana: " . $row["diaSemana"] . "<br>";
		}
	}
	else {
		echo "0 results";
	}

	mysqli_close($conn); 
?>