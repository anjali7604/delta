
<!DOCTYPE html>
<html>
<body>







<?php 

session_start();
include("conn.php"); 


if ($_SERVER["REQUEST_METHOD"] == "GET")
{
	
	$image=$_GET["rn"];
	
	
	$iquery="SELECT * FROM reg;";
 $iresult=mysqli_query($conn,$iquery);

		while($row=mysqli_fetch_array($iresult))
		{
			
		     if($row['roll']==$image)
	         echo "<img src=\"" . $row['location'] ."\" >";  
		}
	
	
	mysqli_close($conn);
	
}

?>


<form name="display"  method="get" action="<?php echo $_SERVER["PHP_SELF"];?>">





</form>

</body>
</html>
