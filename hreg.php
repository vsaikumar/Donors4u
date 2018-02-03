<?php


error_reporting(0);
include('includes/config.php');
     
if (isset($_POST['register'])) 
{


  {
$hname=$_POST['UserName'];
$hemail=$_POST['hemail'];
$hpass=md5($_POST['hpass']);
$hadd=$_POST['hadd'];
$hno=$_POST['hno'];

$sql="INSERT INTO  admin(UserName,email,Password,hadd,hno) VALUES(:UserName,:hemail,:hpass,:hadd,:hno)";
$query = $dbh->prepare($sql);
$query->bindParam(':UserName',$hname,PDO::PARAM_STR);
$query->bindParam(':hemail',$hemail,PDO::PARAM_STR);
$query->bindParam(':hpass',$hpass,PDO::PARAM_STR);
$query->bindParam(':hadd',$hadd,PDO::PARAM_STR);
$query->bindParam(':hno',$hno,PDO::PARAM_STR);

$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
 echo "<script>('Registration successful')</script>";
}


}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Donor4u| Registration</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/modern-business.css" rel="stylesheet">
    <style>
    .navbar-toggler {
        z-index: 1;
    }
    
    @media (max-width: 576px) {
        nav > .container {
            width: 100%;
        }
    }
    </style>
        <style>
    .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
    </style>


</head>

<body>

<?php include('includes/header.php');?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Hospital <small>Registration</small></h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item active">Hospital registration</li>
        </ol>
           
        <!-- Content Row -->
        <form name="donar" method="post">
<div class="row">
<div class="col-lg-4 mb-4">
<div class="font-italic">Hospital Name<span style="color:red">*</span></div>
<div><input type="text" name="UserName" class="form-control" required></div>
</div>


<div class="col-lg-4 mb-4">
<div class="font-italic"> Email<span style="color:red">*</span></div>
<div><input type="email" name="hemail" class="form-control" required></div>
</div>
</div>
<div class="row">
<div class="col-lg-4 mb-4">
<div class="font-italic"> Password<span style="color:red">*</span></div>
<div><input type="password" name="hpass" class="form-control" required></div>
</div>



<div class="col-lg-4 mb-4">
<div class="font-italic">Hospital number<span style="color:red">*</span></div>
<div><input type="text" name="hno" class="form-control" required></div>
</div>
</div>













<div class="row">
<div class="col-lg-8 mb-4">
<div class="font-italic">Hospital Address</div>
<div><textarea class="form-control" name="hadd"></textarea></div>
</div>


</div>

<div class="row">
<div class="col-lg-4 mb-4">
<div><input type="submit" name="register" class="btn btn-primary" value="submit" style="cursor:pointer"></div>
</div>



</div>



        <!-- /.row -->
</form>   
        <!-- /.row -->
</div>
  <?php include('includes/footer.php');?>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
