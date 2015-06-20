
<!DOCTYPE html>
<html>
<body>







<?php 

session_start();
include("conn.php"); 


if ($_SERVER["REQUEST_METHOD"] == "GET")


{
    $iquery="SELECT * FROM reg;";
    $iresult=mysqli_query($conn,$iquery);

		while($row=mysqli_fetch_array($iresult))
		{
			
		     echo "<br><a href=\" image.php?rn=".$row['roll']."\">"."roll no.=".$row['roll']."</a><br>";
		}

	
	mysqli_close($conn);
	
}





?>


<form name="display"  method="get" action="<?php echo $_SERVER["PHP_SELF"];?>">





</form>

</body>
</html>
