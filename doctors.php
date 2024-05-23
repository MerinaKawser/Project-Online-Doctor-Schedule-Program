<?php 
    include("header.php");
    include("connection.php");
?>
<body>
    <div class="container">
    <h3 style="margin: 2%;">Doctors</h3>
              <hr>
        <?php 
            //$id = $_GET['id'];
             $sql = "SELECT* FROM `doctor` WHERE  `status`='Accepted'";
             $query = mysqli_query($con, $sql);
             $row = mysqli_num_rows($query);
             if($row>0){
                 while($data=mysqli_fetch_assoc($query)){
                    ?>
                    <div style="display: flex; border: 1px solid black; width: 500px; margin: 2%">
                        <div style="margin: 2% 5%;">
                            <img src="Doctor/profile/<?php echo $data['file'];?>" alt="profile" style="width:100px; height:auto;">
                            <div><?php echo $data['name'];?></div>
                        </div>
                        <div style="margin: 2% 5%;">
                            <h4 style='color:red;'>Information</h4>
                            
                            <?php 
                                echo "Email: ".$data['email'] . "<br>" .
                                "Phone: ".$data['phone'] . "<br>" .
                                "Specialist of " . $data['specialist'] . "<br>".
                                "Clinic Address: " . $data['clinic_address'];
                               
                                echo "<br>" . "<h4 style='color:red;'>Clinic Schedule</h4>" ;
                                echo "Day: " . $data['s_day'] . "<br>" .
                                "Time: " . $data['s_time'];

                            ?>
                        </div>
                         
                    </div>
                    
                    <?php
                 }
             }
        ?>

        
        
    </div>
</body>
</html>