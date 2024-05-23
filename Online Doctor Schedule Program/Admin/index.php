<?php 
    include("../header.php");
    include("../connection.php");
?>
<body>
    <div class="text-center">
        <h2 class="header">Admin Login</h2>
        <hr>
    </div>
    <div class="container-fluid">
        <div class="container">
            <?php 
                if(isset($_POST['submit'])){
                    $email = mysqli_real_escape_string($con, $_POST['email']);
                    $password = mysqli_real_escape_string($con, $_POST['password']);
                    if(empty($email) || empty($password)){
                        $error = "<h4 class='text-danger'>Please fill out the form first</h4>";
                    }
                    else{
                        $sql = "SELECT `email`, `password` FROM `admin` WHERE `email`='$email' && `password`='$password'";
                    $query = mysqli_query($con,$sql);
                    $row = mysqli_num_rows($query);
                    if($row>0){
                        while(mysqli_fetch_assoc($query)){
                            session_start();
                            $_SESSION['email'] = $row['email'];
                            $_SESSION['password'] = $row['password'];
                            header("Location:dashboard.php");
                        }
                    }
                    else{
                        $msg = "<h4 class='text-danger'>Username Or Password could not matched</h4>";
                    }
                    }
                    
                }
            ?>
            <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
                <?php 
                    echo @$error;
                    echo @$msg;
                ?>
                <div class="form-group">
                  <label for="email">Email address:</label>
                  <input type="email" name="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                  <label for="pwd">Password:</label>
                  <input type="password" name="password" class="form-control" id="pwd">
                </div>
                <button type="submit" name="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>