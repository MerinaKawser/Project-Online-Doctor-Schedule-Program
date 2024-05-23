<?php 
    include("header.php");
    include("connection.php");
?>
<style>
    nav{
    padding: 1%;
}
.img_size{
    width:30%;
    height: auto;
    display: block;
    margin-left:auto;
    margin-right:auto;
}
.col-md-4{
    border: 1px solid black;
    padding: 2%;
}
.row{
    margin: 15% 10%;
}

</style>
<body>
    <div class="container">
        <div class="text-center">
            <h2 class="header">Login</h2>
            <hr>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="Admin/index.php"><img src="icon/user.png" class="img-rounded img_size" alt="admin"><p style="text-align:center; margin: 20px 0;">Admin</p></a>
            </div>
            <div class="col-md-4">
                <a href="Doctor/index.php"><img src="icon/group.png" class="img-rounded img_size" alt="user"><p style="text-align:center; margin: 20px 0;">Doctor</p></a>
            </div>
            
            <?php 
                $sql = "SELECT* FROM `doctor` WHERE `status` = 'Denied' or `status`='Accepted' or `status`='Remove'";
                $query = mysqli_query($con, $sql);
                $row = mysqli_num_rows($query);
            ?>
            <div class="col-md-4">
                <a href="Notification/notification.php">
                    <img src="icon/notification.png" class="img-rounded img_size" alt="notification">
                        <p style="text-align:center; margin: 20px 0;">Notifications
                            <?php 
                                if($row>0){
                                     echo '<span style="color:red;">'.' (' . $row .')' . '</span>';
                                }
                            ?>
                        </p>
                </a>
                            
            </div>
        </div>
    </div>
</body>