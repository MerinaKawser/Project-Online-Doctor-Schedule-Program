<?php  
    session_start();
    include("../header.php");
    include("../connection.php");
    
?>
<body>
    <div class="text-center">
        <h2 class="header">Doctor Login</h2>
        <hr>
    </div>
    <?php 
        if(isset($_POST['submit'])){
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $password = mysqli_real_escape_string($con, md5($_POST['password']));
            if(empty($email) || empty($password)){
                $error = "<h4 class='text-danger'>Please fill out the form</h4>";
            }
            else{
                $sql = "SELECT `email`, `password`, `status` FROM `doctor` WHERE `email`='$email' && `password`='$password' && `status`='Accepted'";
                $query = mysqli_query($con,$sql);
                    $row = mysqli_num_rows($query);
                    if($row>0){
                        while($data = mysqli_fetch_assoc($query)){
                            $_SESSION['id'] = $data['id'];
                            $_SESSION['email'] = $data['email'];
                            $_SESSION['password'] = $data['password'];
                            header("Location:dashboard.php");
                        }
                }
                else{
                    $msg = "<h4 class='text-danger'>Username Or Password could not matched</h4>";
                }
            }
        }
    ?>
    <div class="container-fluid">
        <div class="container">
            <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
                <?php 
                    echo @$error;
                    echo @$msg;
                ?>
                <div class="form-group">
                  <label for="email">Email address:</label>
                  <input name="email" type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                  <label for="pwd">Password:</label>
                  <input name="password" type="password" class="form-control" id="pwd">
                </div>
                <button name="submit" type="submit" class="btn btn-default">Submit</button>
            </form>
            <br>
            <p>Not Yet a Member? <a href="registration.php"> Register</a></p>
        </div>
    </div>
</body>
</html>