<?php 
//session_start();
include("../header.php");
include("../connection.php");
?>
<body>
    <?php
    if(isset($_SESSION['email'])){
        $email = $_SESSION['email']; 
        @$id = $_GET['id'];
        $sql = "SELECT* FROM `doctor` WHERE `email`='$email'";
        $query = mysqli_query($con, $sql);
        $row = mysqli_num_rows($query);
        if($row>0){
            while($data=mysqli_fetch_assoc($query)){
                $name = $data['name'];
                $email = $data['email'];
                $phone = $data['phone'];
                $specialist = $data['specialist'];
                $clinic_address = $data['clinic_address'];
                //$file_name = $data['file'];
                $password = $data['password'];
                $day = $data['s_day'];
                $time = $data['s_time'];
            }
        }
    }
        if(isset($_POST['save'])){
            $name = mysqli_real_escape_string($con, $_POST['name']);
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $phone = mysqli_real_escape_string($con, $_POST['phone']);
            
            $specialist = mysqli_real_escape_string($con, $_POST['specialist']);
            $clinic_address = mysqli_real_escape_string($con, $_POST['clinic_address']);
            
            // image upload
            /*$file_name = $_FILES['image']['name'];
            $file_type = $_FILES['image']['type'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $file_size = $_FILES['image']['size'];
            $folder = 'profile/' . $file_name;
            move_uploaded_file($tmp_name,$folder);*/
            // image upload

            $password = mysqli_real_escape_string($con, md5($_POST['password']));
            $day = mysqli_real_escape_string($con, $_POST['s_day']);
            $time = mysqli_real_escape_string($con, $_POST['s_time']);

            $update_query = "UPDATE `doctor` SET  `s_day`='$day', `s_time`='$time' WHERE `email`='$email' && `status`='Accepted'";
            $run = mysqli_query($con, $update_query);
            if($run){
                //$update = "<h5 style='color:green;'>Your Information is Updated</h5>";
                header("Location:dashboard.php");
            }
            else{
                $update = "<h5 style='color:red;'>Your Informatin Not Updated.</h5>";
            }
        }
    ?>
    <form action="s_update.php?id=<?php echo $id;?>" method="post">
    <?php echo @$update;?>
        
        <div class="form-group">
          <label for="email">Email address:</label>
          <input type="email" name="email" class="form-control" id="email" value="<?php echo @$email;?>">
        </div>
        
        
       
        
        
        
        <div class="form-group">
          <label for="day">Day:</label>
          <input type="text" name="s_day" class="form-control" id="day" value="<?php echo @$day;?>">
        </div>
        <div class="form-group">
          <label for="time">Time:</label>
          <input type="text" name="s_time" class="form-control" id="time" value="<?php echo @$time;?>">
        </div>
        <button type="submit" name="save" class="btn btn-success">Update</button>
    </form>
</body>
</html>