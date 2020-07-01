<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title> Remote Control </title>
	
	<style>
	.id{
		border: 2px solid cornflowerblue;
  		border-radius: 1px;
		width: 20%;	
  		padding: 12px 20px;
	  	margin: 3px 0;
  		box-sizing: border-box;
		}
		
	.btn { 
		margin-left: 10px;
		padding: 10px 18px;
		color: white;
		width: 9%;
		border: 2px solid darkblue;
		background-color: cornflowerblue;
		}
</style>
	
</head>

<body>

	<form method="post" action="data_Insert.php">
	<h1> Insert The Directions </h1>
	
	<!-- Right button -->
	<button class="btn" type="submit"  value="0"  formaction=""> Right </button>
	<input class="id" type="text" name="R" placeholder="How much should move"  >
	<br>
		
	<!-- Forward button -->
	<input class="btn" type="button" onClick="length_line()" value="Forward" />
	<input class="id" type="text" name="forward" id="length_num" placeholder="How much should move">
	<br>
		
	<!-- Left button -->
	<button class="btn" type="submit"  value="0"  formaction=""> Left </button>
	<input class="id" type="text" name="L" placeholder="How much should move">
	<br> <br>
	
	
	<button class="btn" type="reset"  value="0"  formaction=""> Delete </button>
	
	<button class="btn" type="submit"  value="0"  formaction="tryInsert.php"> Save </button>
	<button class="btn"> Start </button>
	
	</form>
	
	<br>
<table border="1" width="120"> 
		<?php
		$conn = mysqli_connect("localhost:3306", "root", "", "IOT");

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT R, forward, L FROM insert_size";

		$result = $conn->query($sql);


		//Show the data
		while($row = $result->fetch_assoc()) {
			echo "<tr>
			<td>" . $row["R"]. "</td>
			<td>" . $row["forward"] . "</td>
			<td>" . $row["L"]. "</td>
			</tr>";
		}

$conn->close();
?>
<br>
	
<canvas id="myCanvas" width="650" height="150"> </canvas>

<script>
var c = document.getElementById("myCanvas");
var ctx = c.getContext("2d");
	
	
function length_line(){
	var num = document.getElementById("length_num").value;
	//Begin The Path	
ctx.beginPath();
	
//Select The Start Position of The Path	
ctx.moveTo(285, 10);
	
//Select The Path Points	
ctx.lineTo(285, parseInt(num));

	
//Adjust Style and Line width
ctx.strokeStyle = "#00f";
ctx.lineWidth = 2;
	
	
//Draw The Path
ctx.stroke(); 
}
	
/*function drawing_line(){
//Begin The Path	
ctx.beginPath();
	
//Select The Start Position of The Path	
ctx.moveTo(285, 10);
	
//Select The Path Points	
ctx.lineTo(285, parseInt(num));
	
ctx.moveTo(285,10);
ctx.lineTo(30000,285);
	
	
	
//Adjust Style and Line width
ctx.strokeStyle = "#00f";
ctx.lineWidth = 2;
	
	
//Draw The Path
ctx.stroke();
	
} */

</script>
						
		
</body>
</html>
