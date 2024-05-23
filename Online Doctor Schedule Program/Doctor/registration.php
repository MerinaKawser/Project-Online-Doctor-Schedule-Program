<?php 
  include("../header.php");
  include("../connection.php");
?>
  <body>
    <div class="text-center">
        <h2 class="header">Doctor Registraion</h2>
        <hr>
    </div>
    <!-- Start PHP Code -->
    <?php 
      
      if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $gender = mysqli_real_escape_string($con, $_POST['gender']);
        $specialist = mysqli_real_escape_string($con, $_POST['specialist']);
        $clinic_address = mysqli_real_escape_string($con, $_POST['clinic_address']);
        $bmdc = mysqli_real_escape_string($con, $_POST['bmdc']);
        // image upload
        $file_name = $_FILES['image']['name'];
        $file_type = $_FILES['image']['type'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $file_size = $_FILES['image']['size'];
        $folder = 'profile/' . $file_name;
        move_uploaded_file($tmp_name,$folder);
        // image upload

        $password = mysqli_real_escape_string($con, md5($_POST['password']));
        if(empty($name) || empty($email) || empty($phone) || empty($gender) || empty($specialist) || empty($clinic_address) || empty($bmdc) || empty($file_name) || empty($password)){
          $error = "<h4 class='text-danger'>Please Fill out the Form First</h4>";
        }
        else{
          $sql = "SELECT `email` FROM `doctor` WHERE `email` = '$email'";
          $query = mysqli_query($con, $sql);
          $row = mysqli_num_rows($query);
          if($row>0){
            $msg = "<h4 class='text-danger'>User email address already exist</h4>";
          }
          else{
            $sql_insert = "INSERT INTO `doctor`(`name`, `email`, `phone`, `gender`, `specialist`, `clinic_address`, `bmdc`, `file`, `password`, `status`)
                            VALUES('$name', '$email', '$phone', '$gender', '$specialist', '$clinic_address', '$bmdc', '$file_name', '$password', 'Pending')";
            $run = mysqli_query($con, $sql_insert);
            if($run){
              $msg = "<h4 class='text-success'>Request has been sent. Wait for the admin approval</h4>";
            }
            else{
              $msg = "<h4 class='text-danger'>There is something wrong. Please try again!</h4>";
            }
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
            <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="form-group">
                  <label for="name">Name:</label>
                  <input type="text" name="name" class="form-control" id="name">
                </div>
                <div class="form-group">
                  <label for="email">Email address:</label>
                  <input type="email" name="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                  <label for="phone">Phone:</label>
                  <input type="phone" name="phone" class="form-control" id="phone">
                </div>
                <div class="form-group">
                     <label for="gender">Gender:</label>
                    <div class="radio">
                        <label><input type="radio" name="gender" checked>Male</label>
                    </div>
                    <div class="radio">
                      <label><input type="radio" name="gender">Female</label>
                    </div>                    
                </div>
                <div class="form-group">
                  <label for="specialist">Specialist:</label>
                  <input type="specialist" name="specialist" class="form-control" id="specialist">
                </div>
                <div class="form-group">
                  <label for="clinic_address">Clinic Address:</label>
                  <input type="clinic_address" name="clinic_address" class="form-control" id="clinic_address">
                </div>
                <div class="form-group">
                  <label for="bmdc">BMDC Registration No:</label>
                  <input type="bmdc" name="bmdc" class="form-control" id="bmdc">
                </div>
                <div class="form-group">
                  <label for="image">Profile:</label>
                  <input type="file" name="image" class="form-control" id="image">
                </div>
                <div class="form-group">
                  <label for="pwd">Password:</label>
                  <input type="password" name="password" class="form-control" id="pwd">
                </div>
                <button type="submit" name="submit" class="btn btn-default">Submit</button>
            </form>
            <br>
            <p>Already a Member? <a href="index.php"> Login</a></p>
        </div>
    </div>

  </body>
</html>