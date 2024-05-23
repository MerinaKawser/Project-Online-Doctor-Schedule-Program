<?php
//session_start();
include("../header.php");
include("../connection.php");
?>
<body>
<?php 
        if(isset($_SESSION['email'])){
            $email = $_SESSION['email'];
            $sql = "SELECT* FROM `doctor` WHERE `email`='$email' && `status`='Accepted'";
            $query = mysqli_query($con, $sql);
            $row = mysqli_num_rows($query);
            if($row>0){
                while($data=mysqli_fetch_assoc($query)){
                    //echo $data['email'];
                    //echo "<h3> Welcome! " . $data['name'] . "</h3>";

                    ?>
                    <h4 class="text-center">Welcome!</h4>
                    <img class="img-circle" src="profile/<?php echo $data['file'];?>" alt="profile" style="width:150px; height:auto;">
                    <h4 class="text-center"><?php echo $data['name'];?></h4>                    
                    <?php 
                }
            }
           
        }
       
    ?>
</body>