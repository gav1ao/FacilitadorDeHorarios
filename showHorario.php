<!DOCTYPE html>
<html>
<h1> Tabela de Estudo</h1>
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
	
	$sql = "SELECT nomeDisc	, horaInicio, horaFim, diaSemana\n"
    . " FROM horario h\n"
    . " INNER JOIN disciplina d\n"
    . " ON h.codDisc = d.codDisc\n"
    . " INNER JOIN tempo t\n"
    . " ON h.codTempo = t.codTempo\n"
    . " INNER JOIN dia\n"
    . " ON dia.codDia = h.codDia\n"
    . "	GROUP BY codHorario, dia.codDia\n"
    . " ORDER BY dia.codDia asc, horaInicio ASC";
	
	
	$result = mysqli_query($conn, $sql);
?>
	<table style="width:100%">
	  <tr>
		<th>Disciplina</th>
		<th>Hora Inicio</th> 
		<th>Hora Fim</th>
		<th>Dia Semana</th>
	  </tr>
	<?php
		if (mysqli_num_rows($result) > 0) {
			// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>". $row["nomeDisc"] . "</td><td>" . $row["horaInicio"] . "</td><td>"
				. $row["horaFim"] . "</td><td>" . $row["diaSemana"] . "</td>";
				echo "</tr>";
			}
		}
	?>
	</table>

</body>
</html>