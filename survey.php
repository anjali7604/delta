<!DOCTYPE html>
<html>
 <head>
 <title>Factory Inspection Department</title>
 <style>
 #imp{float:left;
 margin-left:30%;
 margin-top:5%;}
 
 #image{float:left;
 margin-left:75%;
 margin-top:1%;}
 
 #top{background-color: #b0c4de;}
 
 #logo,#page{float:left;}
 
 #header{
float:left;
font-size:60px;
margin-top:80px;

}
 </style>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link href="theme/css/bootstrap.min.css" rel="stylesheet">
 <link href="theme/css/sb-admin-2.css" rel="stylesheet">
 <script src="theme/js/html5shiv.js"></script>
 <script src="theme/js/respond.min.js"></script>
 <script src="theme/js/jquery-1.11.0.js"></script>
 
 </head>








<body>
<nav class="navbar navbar-inverse" role="navigation">
 <div id="top"><img src="logo.png" id="logo">
 
 <h1 id="header">FACTORY INSPECTION DEPARTMENT</h1><br><br><br><br><br><br><br><br><br><br><br>
 </div>
 <div id="page">
 <ul class="nav navbar-nav">
 <li><a href="home.php">Home</a></li>
 <li><a href="acts.php">Policies and Acts</a></li>
 <li class="active"><a href="survey.php">Survey reports</a></li>
 <li><a href="contactus.php">Contact Us</a></li>
 </ul>
 </li>
 </ul>
 </div>
 </nav>
 <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">

 <li>
<a href="authorised.php"><i class="fa fa-dashboard fa-fw"></i> Authorised Factories</a>
</li>
<li>
<a href="unauthorised.php"><i class="fa fa-dashboard fa-fw"></i> Unauthorised Factories</a>
</li>
<li>
<a href="faq.php"><i class="fa fa-dashboard fa-fw"></i> FAQ</a>
</li>

            </ul>
        </div>
      </div>
	  
  
<form id="imp" name="front" action="report.php" method="post">
<b>Choose the Factory for Survey Report</b>
<br><input type="radio" value="Ambuja Cement" name="factory">Ambuja Cement</input>
<br><input type="radio" value="Ramco Cement" name="factory">Ramco Cement</input>
<br><input type="radio" value="JK Cement" name="factory">JK Cement </input>
<br><input type="radio" value="UltraTech Cement" name="factory">UltraTech Cement</input>
<br><input type="radio" value="Jaypee Cement" name="factory">Jaypee Cement</input>
<br><br>

<input type="submit">
</form>



</body>
</html>
