<!DOCTYPE html>
<html>
<head>
<title>Factory Inspection Department</TITLE>
<style>
#report{ margin: auto;
    width: 60%;
    border:3px solid black;
    padding-left: 80px;
	color: rgb(0,0,255);
font-family:"Comic Sans MS";}

	#heading{color:black;}
</style>

</head>
<body id="report">
<h1 id="heading"> Factory Report</h1>

<?php

session_start();
include("conn.php");


$factory=$_POST['factory'];

$sql = "SELECT * FROM factory where factname=\"". $factory." \" ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $row = mysqli_fetch_assoc($result); 
        echo "<b>Name of the Factory:  </b> " . $row["factname"]. "<br><br> <b>Date of Inspection:  </b>". $row["insdate"]."<br> <br><b> P.F.D.:  </b>" . $row["pfd"]."<br><br> <b> Temperature: </b>" . $row["temp"]."<br><br><b>  Visibility:   </b>" . $row["vis"]."<br> <br> <b>Type of Electric Connection:  </b>" . $row["elec"]."<br> <br><b>Oxygen Level:   </b>" . $row["oxy"]."<br> <br> <b>Toxicity Level:  </b>" . $row["tox"]."<br> <br><b> Flammability Level:  </b>" . $row["flam"]."<br><br> <b> Rescue Plan:   </b>" . $row["rescue"]."<br> <br><b> Maintenance of Pipes:   </b>" . $row["pipe"]."<br><br> <b>Disposal:  </b>" . $row["disposal"] ;
    
} else {
    echo "0 results";
}




mysqli_close($conn);

?>

<form action="survey.php">
<br><br>
<input type="submit" value="Go Back"></input>
<br><br>
</form>

</body>
</html>
