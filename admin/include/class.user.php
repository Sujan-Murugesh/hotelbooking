<?php
    include "db_config.php";
        class user
        {
            public $db;
            public function __construct()
            {
                $this->db=new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,'hotelmanagementsystem');
                if(mysqli_connect_errno())
                {
                    echo "Error: Could not connect to database.";
                    exit;
                }
            }

            
            
            
            public function booknow($roomid,$checkin, $checkout,$guestid,$amount)
            {
                    $get_current_id_sql = "SELECT `reservation_id` FROM `reservation` ORDER BY `reservation_id` DESC LIMIT 1";
                    $result=mysqli_query($this->db,$get_current_id_sql);


                    $row = mysqli_fetch_assoc($result);
                    $id = explode("RES", $row['reservation_id'])[1];
                    $id++;
                    $new_id = "RES".$id;

                    $insert_booking_sql = "INSERT INTO `reservation`(`reservation_id`, `room_id`, `check_in`, `check_out`, `guest_id`, `amount`) VALUES ('{$new_id}','{$roomid}','{$checkin}','{$checkout}','{$guestid}','{$amount}')";
                    mysqli_query($this->db,$insert_booking_sql);
                    echo "<script>alert('Booking succsessfull!')</script>";
            }
}

?>