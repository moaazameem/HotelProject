<?php 


  $categories="Menu";
  $name=$_POST['name'];
  $price=$_POST['price'];
  $quantity=$_POST['quantity'];
  $date=$_POST['date'];

  $total=number_format($price * $quantity,2);


if(!empty($categories) || !empty($name) || !empty($price) || !empty($quantity) ||!empty($date))
   {
      
     
    $host="localhost";
    $dbusername="root";
    $dbpassword="";
    $dbname="Menuitems";

        $conn = mysqli_connect("$host","$dbusername","$dbpassword","$dbname");

           if(!$conn)
           {
            echo " Error in connection";
           }
         else
             {
                 $sql1= "CREATE TABLE $categories
                 (
                  id int NOT NULL AUTO_INCREMENT,
                 name varchar(50),
                 price varchar(50),
                 quantity varchar(50),
                 date varchar(50),
                 total varchar(50),
                 PRIMARY KEY (ID)
                 )";           
                   mysqli_query($conn , $sql1);

                   $sql2 = "INSERT INTO $categories(name,price,quantity,date,total) VALUES('$name','$price','$quantity','$date','$total')";
            
                   mysqli_query($conn , $sql2);
                   echo"
                   <script>
                    alert('Item Added Successfully');
                    var timer = setTimeout(function() {
                        window.location='../html/Add.html'
                    }, 2000);
                  </script> ";
           
              }
        
    }
    else
    {
    echo "All field are Required";
    die();
   }
 

?>