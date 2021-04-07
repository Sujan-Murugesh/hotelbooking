<?php

    session_start();

    include_once 'admin/include/class.user.php'; 
    $user=new User(); 

    if(isset($_GET['id']) && isset($_GET['amount'])){
        $id = $_GET['id'];
        $amount = $_GET['amount'];
    }else{
        $id = null; 
        $amount = null;
    }


    if(isset($_POST['submit'])) 
    {                                                                          //$_SESSION['guest_id'];
        $user->booknow($_POST['roomid'], $_POST['checkin'], $_POST['checkout'],$_SESSION['guest_id'],$_POST['amount']);
    }


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
  
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( ".datepicker" ).datepicker({
                  dateFormat : 'yy-mm-dd'
                });
  } );
  </script>

    
</head>

<body>
    <div class="container">
      
      
    <img class="img-responsive" src="images/New.jpg">       
        
    
      <div class="container">
      <div class="row justify-content-center">
      <div class="col-md-8">
            <h2>Book Now: <?php echo $_GET['type'].' type Room'; ?></h2>
            <hr>
            <form action="" method="post" name="room_category">
              
              <input type="hidden" name="roomid" value="<?php echo $id;?>">
              <input type="hidden" name="amount" value="<?php echo $amount;?>">


               <div class="form-group">
                    <label for="checkin">Check In :</label>;
                    <input type="text" class="datepicker" name="checkin">

                </div>
               
               <div class="form-group">
                    <label for="checkout">Check Out:</label>;
                    <input type="text" class="datepicker" name="checkout">
                </div>
                <div class="form-group">
                    <label for="name">Enter Your Full Name:</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                    <label for="phone">Enter Your Phone Number:</label>
                    <input type="text" class="form-control" name="phone" placeholder="Enter your Mobile number" required>
                </div>
                 
               
                

               <br>
                <div id="click_here">
                <button type="submit" class="btn btn-warning" name="submit">Book Now</button>
                    <a href="index.php">Back to Home</a>
                </div>
            

            </form>
            </div>
        </div>
        
        <div>



    </div>
    
    
    
    
    






    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
</body>

</html>