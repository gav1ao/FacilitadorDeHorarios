<html>
<body>

<?php
$codTempo = $_POST['tempo'];
$codDisc = $_POST["disciplina"];
$codDia = $_POST["diaSemana"];

?>

<h1>Novo horario a ser adicionado</h1>

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
	$sql = "INSERT INTO horario (codTempo, codDia, codDisc)
	VALUES ('$codTempo', '$codDia', '$codDisc')";

	if (mysqli_query($conn, $sql)) {
		echo "<br>Novo horário adcionado com sucesso!";
	} else {
		echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
?>