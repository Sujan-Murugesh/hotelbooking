<!doctype html>

<?php


define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'hotelmanagementsystem');

$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);


$name = $identity = $address = $phone = $email =  $password = $password_confirmation = "";

$name_err = $identity_err = $address_err = $phone_err = $email_err =  $password_err = $password_confirmation_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if (empty($_POST['email'])){

    }else{

        $sql = "";

        if($stmt = mysqli_prepare($db, $sql)){

            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_execute($stmt)){
                if(mysqli_stmt_num_rows($stmt)==1){
                    $email_err = "This email already taken";
                }else{
                    $email = trim($_POST['email']);
                }
            }else{
                echo "trouble in backend";
            }
            mysqli_stmt_close($stmt);
        }
    }

    $name = mysqli_real_escape_string($db, $_POST['name']);
    $identity = mysqli_real_escape_string($db, $_POST['identity']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $email =  mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);


    $get_current_id_sql = "SELECT `guest_id` FROM `guest` ORDER BY `guest_id` DESC LIMIT 1 ";

    $result=mysqli_query($db,$get_current_id_sql);

    $row = mysqli_fetch_assoc($result);
    $id = explode("GNR", $row['guest_id'])[1];
    $id++;
    $new_id = "GNR".$id;



    $sql1 = "INSERT INTO `loginWeb`(`login_id`, `login_email`, `login_password`) VALUES ('$new_id','$email','$password')";

    $sql2 = "INSERT INTO `guest`(`guest_id`, `guest_name`, `gidentity`, `gtel`, `gemail`, `gvisit`, `gaddress`, `gimage`) VALUES ('$new_id','$name','$identity','$phone','$email',null,'$address',null)";

    mysqli_query($db,$sql1);
    mysqli_query($db,$sql2);


    echo "<script>alert('Regitration succsessfull!')</script>";



}



?>


<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->


    <title>Gamage Rest</title>

    <!-- Scripts -->

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
<div class="container">
      
      
       <img class="img-responsive" src="images/New.jpg">
       </div>
<br>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register</div>

                <div class="card-body">
                    <form method="POST" action="">

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="" required placeholder="Please enter your Name" autofocus>


                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="identity" class="col-md-4 col-form-label text-md-right">NIC or Passport Number</label>

                            <div class="col-md-6">
                                <input id="identity" type="text" class="form-control" name="identity" value="" required placeholder="Please enter your National ID number" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="" required placeholder="Please enter your address" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Phone Number</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" pattern="0[0-9]{9}" maxlength="10" class="form-control" name="phone" value="" required placeholder="Please enter your phone number" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="" required placeholder="Please enter your email" ">


                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required placeholder="Please enter your password">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Re-type Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" onkeyup="check_pwd()" type="password" class="form-control" name="password_confirmation" required placeholder="Please re-type password">
                            </div>

                            
                        </div>

                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                            <p id="password_error"></p>

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type="submit" value="Submit" id="submit_btn" class="btn btn-primary"/>
                                <a href="login.php">Login Here</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function check_pwd() {
        var pwd = document.getElementById("password").value;
        var c_pwd = document.getElementById("password-confirm").value;

        if(pwd == c_pwd) {
            document.getElementById("password_error").innerHTML = "Password match";
            document.getElementById("submit_btn").disabled = false;
        } else {
            document.getElementById("password_error").innerHTML = "Password not match";
            document.getElementById("submit_btn").disabled = true;
        }
    }
    // document.getElementById("password_error").innerHtml = "password_error";
</script>


</body>

</html>