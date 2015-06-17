
	<!DOCTYPE html>
<html>
<body onload="Captcha();">
<style>
form {
text-transform:capitalize;
color:blue;
}

span{
	color:red;
}
#header{text-align:center;
text-transform:uppercase;
color:red;

font-size:80px;}
</style>


<?php
session_start();
include("conn.php"); 

$uploadOk = 1;
$nameErr=$rollErr=$deptErr=$yearErr=$mailErr=$passErr="";
$name=$roll=$dept=$year=$mail=$pass="";
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
 if (empty($_POST["name"])) {
    $nameErr="Name is required";
  } 
  else
  {$name=mysqli_real_escape_string($conn,$_POST['name']); 
	  if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
  $nameErr = "Only letters and white space allowed"; 
  $name="";
}
  }	
  
   if (empty($_POST["roll"])) {
    $rollErr = "roll no. is required";
  }
else
{$roll=mysqli_real_escape_string($conn,$_POST['roll']);
if (!preg_match('/^[0-9]*$/', $roll))
 {$roll="";
$rollErr="enter only number format";}
}
   if (empty($_POST["dept"])) {
    $deptErr = "department is required";
  } 
  else
  {
	$dept=mysqli_real_escape_string($conn,$_POST['dept']);  
  }
   if (empty($_POST["year"])) {
    $yearErr = "year of study is required";
   }
   
 else
	 $year=mysqli_real_escape_string($conn,$_POST['year']);
   if (empty($_POST["mail"])) {
    $mailErr = "e-mail is required";
  } 
  else 
  {$mail=mysqli_real_escape_string($conn,$_POST['mail']);
if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
  $mailErr = "Invalid email format";
  $mail="";  
}
  }
   if (empty($_POST["pass"])) {
    $passErr = "password is required";
  } 
  else
	$pass=mysqli_real_escape_string($conn,$_POST['pass']);




$exitcode=1;
$rquery="SELECT * FROM reg;";
$res=mysqli_query($conn,$rquery);

if(!mysqli_fetch_array($res))
{$exitcode=1;}	
else 
{while($rowr=mysqli_fetch_array($res))
{ if($rowr['roll']==$roll)
		     {
				echo "<script type='text/javascript'>alert('Roll no. already registered!!!');</script>";
				$exitcode=0;
			
		     }
}
}
	




$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["img"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["img"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

}

// Check file size
if ($_FILES["img"]["size"] > 500000) {
	echo "<script type='text/javascript'>confirm('Sorry, your file is too large.');</script>";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
	echo "<script type='text/javascript'>alert('Sorry, your file was not uploaded.');</script>";
// if everything is ok, try to upload file
} 








if($name!="" && $name!="" && $roll!="" && $year!="" && $dept!="" && $mail!="" && $pass!="" && $name!="" && $exitcode==1)
{
	
	move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
	
	
	if (file_exists($target_file)) {
     $uploadOk = 1;
}
    else {
		$uploadOk = 0;
	
		echo "<script type='text/javascript'>confirm('file already exists or no uploads folder exists');</script>";
	}	
	
	
}
	
if($name!="" && $name!="" && $roll!="" && $year!="" && $dept!="" && $mail!="" && $pass!="" && $name!="" && $uploadOk == 1 && $exitcode==1)
{
$d=9;
$code="";
 $is_unique = true;
 
 do
{
for($i=1;$i<=$d;$i++)
{$code= $code.rand(1,9);}
 $squery="SELECT * FROM reg;";
 $result=mysqli_query($conn,$squery);
		
if(!mysqli_fetch_array($result))
{$is_unique = true;}
else{
		while($row=mysqli_fetch_array($result))
		{
			
		     if($row['id']==$code)
		     {$is_unique = false;
	           $d++;
	           break;}
        }
  
		}
}while($is_unique == false);

$encpass=sha1($pass);
$query="insert into reg(roll,name,dept,year,mail,pass,id,location) values('$roll','$name','$dept','$year','$mail','$encpass','$code',' $target_file')";
mysqli_query($conn,$query);
}

else {
echo "<script type='text/javascript'>alert('sorry,not registered!!!');</script>";}
mysqli_close($conn);
}
?>









<form name="front"  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
<div id="header">
registration form
</div>

<p><span class="error">* required field.</span></p>
rollno.<input type="number" name="roll" required >
<span class="error">* <?php echo $rollErr;?></span><br><br>


name<input type="text" name="name" required>
<span class="error">* <?php echo $nameErr;?></span><br><br>

department<input type="text" name="dept" required>
<span class="error">* <?php echo $deptErr;?></span><br><br>

year of study<input type="number" name="year" required>
<span class="error">* <?php echo $yearErr;?></span><br><br>

email-id<input type="email" name="mail" required>
<span class="error">* <?php echo $mailErr;?></span><br><br>

Password<input type="password" id="visible" name="pass" required>
<span class="error">* <?php echo $passErr;?></span><br>
<input type="checkbox" id="ch" onclick="check(this)">make password visible <br><br>


PROFILE PICTURE   <input type="file" name="img" id="img" required><br><br>
<input type="submit" ><br><br>
<p id="demo"></p>











<script>

function check(obj)
{if(obj.checked)
	{  document.getElementById('visible').type = 'text';}
else
{  document.getElementById('visible').type = 'password';}
}






                 function Captcha(){
                     var alpha = new Array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
                     var i;
                     for (i=0;i<6;i++){
                       var a = alpha[Math.floor(Math.random() * alpha.length)];
                       var b = alpha[Math.floor(Math.random() * alpha.length)];
                       var c = alpha[Math.floor(Math.random() * alpha.length)];
                       var d = alpha[Math.floor(Math.random() * alpha.length)];
                       var e = alpha[Math.floor(Math.random() * alpha.length)];
                       var f = alpha[Math.floor(Math.random() * alpha.length)];
                       var g = alpha[Math.floor(Math.random() * alpha.length)];
                      }
                    var code = a + ' ' + b + ' ' + ' ' + c + ' ' + d + ' ' + e + ' '+ f + ' ' + g;
                    document.getElementById("mainCaptcha").value = code
                  }
                  function ValidCaptcha(){
                      var string1 = removeSpaces(document.getElementById('mainCaptcha').value);
                      var string2 = removeSpaces(document.getElementById('txtInput').value);
                      if (string1 == string2){
                        return true;
                      }
                      else{        
                        return false;
                      }
                  }
                  function removeSpaces(string){
                    return string.split(' ').join('');
                  }
             
</script>

</body>
</html>


