<?php if(!isset($_SESSION)) {session_start();}  ?>

<!DOCTYPE html >
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Donor4u</title>

<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/modern-business.css" rel="stylesheet">
 
</head>

<body>


<?php include('config.php'); ?>
<?php include('header.php'); ?>
 
<div class="nav_bg">


     <form method="post" enctype="multipart/form-data">
 <table cellpadding="20" cellspacing="20" width="1000px" height="200px"  style="margin:auto" >

   <tr><td colspan="7" align="center"><img src="Images/brequest.png" height="90px" /></td></tr>

   <tr><td>&nbsp;</td><td>&nbsp;</td></tr>   
 <tr style="background-color:bisque" align="center" class="bold">            
             <td class="bold" style="color:red"  >Name</td><td align="center">Gender</td><td align="center">Age</td><td align="center">Contact No</td><td align="center">Email</td><td align="center">Blood Group</td>
            
        </tr>
                   



<?php

	
$cn=mysqli_connect("localhost","root","","Donor4u");
$s="select * from requests";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	//echo $r;
	while($data=mysqli_fetch_array($result))
	{
				echo"<tr><td  style=' padding-left:50px'>$data[0]</td><td  style=' padding-left:10px'>$data[1]</td><td  style=' padding-left:20px'>$data[2]</td><td  style=' padding-left:30px'>$data[3]</td><td  style=' padding-left:50px'>$data[4]</td><td  style=' padding-left:50px'>$data[5]</td></tr>";
			}
			mysqli_close($cn);
			?>


</table>
</form>
        </div>
    </div>

          
  


<script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

			
			
	
</body>
</html>