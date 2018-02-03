<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['register']))
  {
$name=$_POST['name'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$bg=$_POST['bg'];

$sql="INSERT INTO  requests(name,gender,age,mobile,email,bg) VALUES(:name,:gender,:age,:mobile,:email,:bg)";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':age',$age,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':bg',$bg,PDO::PARAM_STR);

$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Your info submitted successfully";
}
else 
{
$error="Something went wrong. Please try again";
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

    <title>Donor4u|request</title>
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
     <?php include('header.php');?>
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Request <small>Blood</small></h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item active">Request Blood</li>
        </ol>
           
        <!-- Content Row -->
        <form name="donar" method="post">
<div class="row">
<div class="col-lg-4 mb-4">
<div class="font-italic"> Name<span style="color:red">*</span></div>
<div><input type="text" name="name" class="form-control" required></div>
</div>


<div class="col-lg-4 mb-4">
<div class="font-italic">Gender<span style="color:red">*</span></div>
<div><select name="gender" class="form-control" required>
<option value="">Select</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
</div>
</div>
<div class="col-lg-4 mb-4">
<div class="font-italic"> Age<span style="color:red">*</span></div>
<div><input type="text" name="age" class="form-control" required></div>
</div>
</div>


<div class="row">
<div class="col-lg-4 mb-4">
<div class="font-italic">Mobile number<span style="color:red">*</span></div>
<div><input type="text" name="mobile" class="form-control" required></div>
</div>


<div class="col-lg-4 mb-4">
<div class="font-italic">Email</div>
<div><input type="text" name="email" class="form-control" required></div>
</div>
<div class="col-lg-4 mb-4">
<div class="font-italic">Blood Group<span style="color:red">*</span> </div>
<div><select name="bg" class="form-control" required>
<?php $sql = "SELECT * from  tblbloodgroup ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
<option value="<?php echo htmlentities($result->BloodGroup);?>"><?php echo htmlentities($result->BloodGroup);?></option>
<?php }} ?>
</select>
</div>
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


    
  <?php include('../includes/footer.php');?>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
