<?php
//session_start();
include("../header.php");
include("../connection.php");
?>
<body>
    <div class="text-center">
        <h2 class="header">Doctors Schedule</h2>
        <hr>
    </div>
    <div class="container">
    
    <div class="text-center">
        <h4 class="">Set Appointment</h4>
        <hr>
        <?php 
            if(isset($_POST['submit'])){
                $day = $_POST['a_day'];
                $time = $_POST['a_time'];
                
                if(empty($day) || empty($time) ){
                    $error = "Please fillout the form first";
                }
                else{
                    $sql = "INSERT INTO `appointment`(`a_day`, `a_time`, `uid`, `did`)
                                VALUES('$day', '$time')";
                    $query = mysqli_query($con, $sql);
                    if($query){
                        $msg = "Inserted";
                    }
                    else{
                        $msg = "not";
                    }
                }
            }
        ?>
    <!-- End PHP Code -->
    <div class="container-fluid">
        <div class="container">
          <?php 
            echo @$error . "<br>";
            echo @$msg;
          ?>
            <form action="test.php" method="POST"  autocomplete="off">
                id: <input type="text" name="did"><br>
                day: <input type="date" name="a_day"><br>
                time: <input type="time" name="a_time"><br>
               
                <button type="submit" name="submit" class="btn btn-success">Submit</button>
            </form>
            
        </div>
    </div>
    </div>
    </div>
    
    
</body>