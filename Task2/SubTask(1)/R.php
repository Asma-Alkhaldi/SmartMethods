<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Right</title>
</head>

<body>
<?php
$conn = mysqli_connect("localhost:3306", "root", "", "IOT");

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT R FROM remote";
$result = $conn->query($sql);

	
//showing data
while($row = $result->fetch_assoc()) {
echo "<tr>
	  <td>". $row["R"]."</td> 
	  </tr>";
}

$conn->close();
?>
	
</body>
</html>