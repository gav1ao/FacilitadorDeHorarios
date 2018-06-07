<!DOCTYPE html>
<html>
<h1> Tabela de Tempos de Estudos</h1>
<head>
<style>
h1 {
    text-align: center;
}
table, th, td {
    border: 1px solid black;
	text-align: center;
}

</style>
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
	
	$sql = "SELECT horaInicio, horaFim\n"
			. " FROM tempo t\n"
			. " ORDER BY horaInicio asc";
	
	$result = mysqli_query($conn, $sql);
?>
	<table style="width:100%">
	  <tr>
		<th>Hora Inicio</th> 
		<th>Hora Fim</th>
	  </tr>
	<?php
		if (mysqli_num_rows($result) > 0) {
			// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>". $row["horaInicio"] . "</td><td>". $row["horaFim"] . "</td>";
				echo "</tr>";
			}
		}
	?>
	</table>

</body>
</html>