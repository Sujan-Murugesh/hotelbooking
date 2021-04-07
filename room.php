<?php
include_once 'admin/include/class.user.php'; 
$user=new User();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Hotel Booking</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    
    
    <style>
          
        .well {
            background: rgba(0, 0, 0, 0.7);
            border: none;
            height: 200px;
        }
        
        body {
            /* background-image: url('images/back1.jpg'); */
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        
        h4 {
            color: #ffcc00;
        }
        h5
        {
            color: #bfbfbf;
            font-family:  monospace;
        }


    </style>
    
    
</head>

<body>
    <div class="container">
      
      
    <img class="img-responsive" src="images/New.jpg">   
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li class="active"><a href="room.php">Room Booking</a></li>
                </ul>
            </div>
        </nav>
        
        
        
        <?php
        
        $sql="SELECT * FROM `room` WHERE `id` NOT IN (SELECT `room_id` FROM `reservation` WHERE 1)";
        $result = mysqli_query($user->db, $sql);
        if($result)
        {
            

            if(mysqli_num_rows($result) > 0)
            {

                while($row = mysqli_fetch_array($result))
                {
                    
                    echo "
                    
                    
                  
                    <table class='table table-striped'>
  
  </thead>
  <tbody>
    <tr>
      <td><p class='text-info'>Room Type:</p>".$row['type']."</td>
      <td><p class='text-info'>Beds:</p>".$row['bedtype']."</td>
      <td><p class='text-info'>Price:</p>".$row['price']."</td>
      <td><a href='./booknow.php?type=".$row['type']."&id=".$row['id']."&amount=".$row['price']."'><button class='btn btn-warning'>Book Now</button> </a></td>
    </tr>
    
  </tbody>
</table>        
                        
                    
                         "; 
                    
                }
                
                
                          
             }
            else
            {
                echo "NO Data Exist";
            }
        }
        else
        {
            echo "Cannot connect to server".$result;
        }
        
        
        
        
        
        ?>



 </div>   
    
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>