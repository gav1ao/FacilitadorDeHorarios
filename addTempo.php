<html>
<body>

<?php
$horaInicio = $_POST["horaInicio"];
$horaFim = $_POST["horaFim"];
?>

<h1>Novo tempo a ser adicionado</h1>
Hora de Inicio: <?php echo $horaInicio; ?><br>
Hora Final: <?php echo $horaFim; ?>

</body>
</html>

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
	
	$sql = "INSERT INTO tempo (horaInicio, horaFim)
	VALUES ('$horaInicio','$horaFim')";

	if (mysqli_query($conn, $sql)) {
		echo "<br>Novo tempo adicionado com sucesso!";
	} else {
		echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
?>