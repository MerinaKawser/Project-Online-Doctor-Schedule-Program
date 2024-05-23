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
        if(isset($_POST['update'])){
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

            $update_query = "UPDATE `doctor` SET `name` = '$name', `email` = '$email', `phone`='$phone',
             `specialist`='$specialist', `clinic_address`='$clinic_address', `password`='$password' WHERE `email`='$email' && `status`='Accepted'";
            $run = mysqli_query($con, $update_query);
            if($run){
                //$update = "<h5 style='color:green;'>Your Information is Updated</h5>";
                header("Location:dashboard.php");
            }
            else{
                $update = "<h4 style='color:red;'>Your Informatin Not Updated.</h4>";
            }
        }
    ?>
    <form action="update_profile.php?id=<?php echo $id;?>" method="post">
    <?php echo @$update;?>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" id="name" value="<?php echo @$name;?>">
        </div>
        <div class="form-group">
          <label for="email">Email address:</label>
          <input type="email" name="email" class="form-control" id="email" value="<?php echo @$email;?>">
        </div>
        <div class="form-group">
          <label for="phone">Phone:</label>
          <input type="phone" name="phone" class="form-control" id="phone" value="<?php echo @$phone;?>">
        </div>
        
        <div class="form-group">
          <label for="specialist">Specialist:</label>
          <input type="specialist" name="specialist" class="form-control" id="specialist" value="<?php echo @$specialist;?>">
        </div>
        <div class="form-group">
          <label for="clinic_address">Clinic Address:</label>
          <input type="clinic_address" name="clinic_address" class="form-control" id="clinic_address" value="<?php echo @$clinic_address;?>">
        </div>
        
        
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" name="password" class="form-control" id="pwd" value="<?php echo @$password;?>">
        </div>
        
        <button type="submit" name="update" class="btn btn-success">Update</button>
    </form>
</body>
</html>