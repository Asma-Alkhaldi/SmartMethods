<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$R = $_POST["R"];
$forward = $_POST["forward"];
$L = $_POST["L"];	
}

// معلومات الإتصال بقاعدة البيانات

$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "IOT";

// إنشاء الإتصال
$conn = mysqli_connect($servername, $username, $password, $dbname);
// إختبار الإتصال
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO insert_size (R , forward , L ) VALUES ('$R', '$forward', '$L')";

if (mysqli_query($conn, $sql)) {
echo "Data sent successfully .. ";
} 
else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>
