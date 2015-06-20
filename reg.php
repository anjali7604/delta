
<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">
function Captcha(){
                     var alpha = new Array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',0,1,2,3,4,5,6,7,8,9);
                     var i;
                     for (i=0;i<6;i++){
                       var a = alpha[Math.floor(Math.random() * 61)];
                       var b = alpha[Math.floor(Math.random() * 61)];
                       var c = alpha[Math.floor(Math.random() * 61)];
                       var d = alpha[Math.floor(Math.random() * 61)];
                       var e = alpha[Math.floor(Math.random() * 61)];
                       var f = alpha[Math.floor(Math.random() * 61)];
                       var g = alpha[Math.floor(Math.random() * 61)];
                      }
                    var code ='   '+ a + ' ' + b + ' ' + ' ' + c + ' ' + d + ' ' + e + ' '+ f + ' ' + g;
                    document.getElementById("mainCaptcha").innerHTML = code;
                  }
                  function ValidCaptcha(){
                      var string1 = removeSpaces(document.getElementById('mainCaptcha').innerHTML);
                      var string2 = removeSpaces(document.getElementById('txtInput').value);
					  var check="false";
                      if (string1 == string2){
                     
					   check="true";
                      }
                      else{        
                        style="display:none"
						 check="false";
                      }
					   document.getElementById("hide").value =check;
                  }
				  
                  function removeSpaces(string){
                    return string.split(' ').join('');
                  }
</script>
</head>
<body onload="Captcha();">
<style>
form {

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
$nameErr=$rollErr=$deptErr=$yearErr=$mailErr=$passErr=$captchaErr="";
$name=$roll=$dept=$year=$mail=$pass="";
$checkcap="";
$exitcode=0;
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
$moveimg= $target_dir .$roll.".".$imageFileType;
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


//CAPTCHA
if($exitcode==1)
{$checkcap=$_POST['hv'];
		if($checkcap=="true")
		{$exitcode=1;}
	else{$exitcode=0;
	 $captchaErr="wrong captcha input";}
}


if($name!=""&& $roll!="" && $year!="" && $dept!="" && $mail!="" && $pass!=""&&  $uploadOk ==1 && $exitcode==1)
{
 move_uploaded_file($_FILES["img"]["tmp_name"], $moveimg);
  if (file_exists($moveimg)) {
     $uploadOk = 1;
}
    else {
		$uploadOk = 0;
	    echo "<script type='text/javascript'>confirm('no uploads folder exists');</script>";
	}	
}
	
if($name!="" && $roll!="" && $year!="" && $dept!="" && $mail!="" && $pass!="" && $uploadOk == 1 && $exitcode==1)
{
$d=9;
$is_unique = "true";
$idquery="SELECT * FROM reg;";
$idresult=mysqli_query($conn,$idquery);
 
 do
{$code="";
for($i=1;$i<=$d;$i++)
{$code= $code.rand(1,9);}

if(!mysqli_fetch_array($idresult))
{$is_unique = "true";}
else{
		while($row=mysqli_fetch_array($idresult))
		{
	     if($row['id']==$code)
		     {$is_unique = "false";
		      $d++;
	          break;}
        }
    }
 
   if($is_unique=="true") 
   {
	   {
			$split=[];
			$split=str_split($code);
	   }
	    
		$valid=$split[$d-1];
		for($j=$d-2;$j>=0;$j--)
        {
		 $val=$split[$j]*2; 
		    if($val>9)
			{$xtr=str_split($val);
		      $val=$xtr[0]+$xtr[1];
			}
        $valid=$valid+$val;}
	
	    if($valid%10!=0)
  { $is_unique="false";}      
	
   }
}while($is_unique == "false");
  
$encpass=sha1($pass);
$query="insert into reg(roll,name,dept,year,mail,pass,id,location) values('$roll','$name','$dept','$year','$mail','$encpass','$code',' $moveimg')";
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

<div id="mainCaptcha" style="border:solid;width:300px;height:70px;font-size:45px;">kkkk</div>
<input type="button" onclick="Captcha();" style="float:left;" value="refresh"></input>

              <br><br>
          
            <input type="text" id="txtInput" />    
<span class="error">* <?php echo $captchaErr;?></span><br><br>
           
          
		  <input type="text" id="hide" style="display:none" name="hv"/>
		 
<input type="submit" onclick="ValidCaptcha();"><br><br>












<script>

function check(obj)
{if(obj.checked)
	{  document.getElementById('visible').type = 'text';}
else
{  document.getElementById('visible').type = 'password';}
}






                 
             
</script>

</body>
</html>
