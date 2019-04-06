 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname ="players";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);


$sql = "SELECT * FROM 4pairs ORDER BY Time ASC LIMIT 10";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	echo "<table><tr>";
        echo 
		"
		<th>Name:</th>
		<th>Time-Taken</th>
		</tr>
		<br>";
    while($row = $result->fetch_assoc()) {
		echo "<tr><td>".$row["name"]."</td>";
		echo "<td>".$row["time"]."</td></tr>";
    }
} else {
    echo "0 results";
}


$conn->close();
?> 
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
