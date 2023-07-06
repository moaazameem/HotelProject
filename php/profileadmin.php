
<?php
session_start();
$_SESSION["refresh"]="no";
$host="localhost";
    $dbusername="root";
    $dbpassword="";
    $dbname="hotelmanagement";

$conn = mysqli_connect("$host","$dbusername","$dbpassword","$dbname");

if(!$conn)
{
    echo " Error in connection";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/normalized.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/profilepage.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark navbar-custom sticky-top"> 
       <div class="container-fluid">
          <a class="navbar-brand" href="#">Hotel Management</a>
          <div class="dropdown dropleft">
            <button type="button" class="btn btn-defaultdropdown-toggle text-light" data-toggle="dropdown"><b> Menu </b>
             <i class="fa fa-arrow-down" aria-hidden="true"></i>
            </button>
     <div class="dropdown-menu" >
        <ul class="list-group list-group-item-action">
            <li class="list-group-item"><a href="../php/customerpanel.php">Home</a></li>
            <li class="list-group-item"><a href="../php/logout.php">Log out</a></li>
        </ul>
      </div>     
  </div>
       </div>
    </nav>
<div class="container-fluid">
<div class="container form">
    <?php 
     $email=$_SESSION["email"];
     $sql="SELECT * FROM admins where email='$email'";
        $result=mysqli_query($conn,$sql);
       while($row=mysqli_fetch_array($result))
      {
    ?>
          <table class="table-hover table">
          <form action="../php/updatedataAdmin.php" method="POST"> 
              <tr>
                <td>
                    <label class="text-light">Name</label></td><td>
                    <input type="hidden" name="table" value="admins">
                    <input type="text" name="fname" value=<?php echo $row["fname"]?>>
                    <input type="text" name="lname" value=<?php echo $row["lname"]?>><br>
                </td>
              </tr>
              <tr>
                <td>
                    <label class="text-light">Email</label></td><td>
                    <input type="text" name="email" value=<?php echo $row["email"]?>><br>
                </td>
                <tr>
                <td>
                    <label class="text-light">phonenumber</label></td><td>
                    <input type="text" name="phone" value=<?php echo $row["phone"]?>><br>
                </td>
                <tr>
                <td>
                    <label class="text-light">Password</label></td><td>
                    <input type="text" name="passw" value=<?php echo $row["passw"]?>><br>
                </td>
              </tr>                  
              <tr><td><button type="submit" name="submit" class="btn text-dark float-right btn-primary" style="background:white; border:1px solid black;" >Update</button></td><td></td></tr>
      </form>
          </table>        
      </form>
  <?php
    }
   ?>

    </div>
</div>
</body>
</html>