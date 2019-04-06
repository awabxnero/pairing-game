 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname ="players";
$playername=$_POST["nama"];
$playertime=$_POST["time"];

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";




$sql = "INSERT INTO 2pairs (name, time)
VALUES ('$playername', '$playertime') ";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
	header('location:highscores2pairs.php');
	die();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



$conn->close();

?> 

