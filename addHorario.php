<html>
<head>
	<h1>Adicionar Novo Horario</h1>
</head>

<body>

<?php
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
	
	$sql_dia = "SELECT codDia, diaSemana\n"
    . "FROM dia";
	
	$sql_disc = "SELECT codDisc, nomeDisc\n"
	. "FROM disciplina\n"
	. "GROUP BY nomeDisc asc";
	
	$sql_tempo = "SELECT codTempo, horaInicio, horaFim\n"
	. "FROM tempo\n"
	. "GROUP BY codTempo\n"
	. "ORDER BY horaInicio asc";
	
	$result_dia = mysqli_query($conn, $sql_dia);
	$result_disc = mysqli_query($conn, $sql_disc);
	$result_tempo = mysqli_query($conn, $sql_tempo);
?>

<form action="addHorarioToBD.php" method="post">
	<select name="diaSemana">

	<?php
		if (mysqli_num_rows($result_dia) > 0) {
			// output data of each row
			while($row = mysqli_fetch_assoc($result_dia)) {
				echo "<option value = '" . $row["codDia"] . "' > " . $row["diaSemana"] . "</option> <br>";
			}
		}		
	?>

	</select>
	
	<br>

	<select name="tempo">

	<?php
		if (mysqli_num_rows($result_tempo) > 0) {
			// output data of each row
			while($row = mysqli_fetch_assoc($result_tempo)) {
				echo "<option value = '" . $row["codTempo"] . "' > " . $row["horaInicio"] . " - " . $row["horaFim"] . "</option> <br>";
				echo $row["codTempo"];
			}
		}		
	?>

	</select>

	<br>

	<select name="disciplina">

	<?php
		if (mysqli_num_rows($result_disc) > 0) {
			// output data of each row
			while($row = mysqli_fetch_assoc($result_disc)) {
				echo "<option value = '" . $row["codDisc"] . "' > " . $row["nomeDisc"] . "</option> <br>";
			}
		}		
	?>

	</select>

<input type="submit">
</form>

</body>
</html>