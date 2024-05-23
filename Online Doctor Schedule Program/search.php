<?php
  include("header.php");
  include("connection.php");
?>
<body>
    <div class="container">
        <h3 style="margin: 2%; text-align:center;">Doctors</h3>
        <hr>
        <?php 
            if(isset($_REQUEST['searching'])){
                @$id = $_GET['id'];
                $search = $_REQUEST['search'];
                if(empty($search)){
                   $error = "<h4 class='text-danger'>Not found anything.</h4>";
                }
                else{
                  $sql_search = "SELECT* FROM `doctor` WHERE `name` LIKE '$search%' AND `status`='Accepted' || `specialist` LIKE '$search%' AND `status`='Accepted'";
                  $query_search = mysqli_query($con, $sql_search);
                  $row_search = mysqli_num_rows($query_search);
                  if($row_search>0){
                    while($data_search=mysqli_fetch_assoc($query_search)){
                         ?>
                         <div style="display: flex; border: 1px solid black; width: 1000px; margin: 2%">
                            <div style="margin: 2% 10%;">
                                <img src="Doctor/profile/<?php echo $data_search['file'];?>" alt="profile" style="width:100px; height:auto;">
                                <div><?php echo $data_search['name'];?></div>
                            </div>
                            <div style="margin: 2% 10%;">
                            <h4 style='color:red;'>Information</h4>
                            
                            <?php 
                                echo "Email: ".$data_search['email'] . "<br>" .
                                "Phone: ".$data_search['phone'] . "<br>" .
                                "Specialist of " . $data_search['specialist'] . "<br>".
                                "Clinic Address: " . $data_search['clinic_address'];
                               
                                echo "<br>" . "<h4 style='color:red;'>Clinic Schedule</h4>" ;
                                echo "Day: " . $data_search['s_day'] . "<br>" .
                                "Time: " . $data_search['s_time'];

                            ?>
                        </div>
                         
                    </div>
                         <?php
                    }
                  }
                  else{
                    $error = "<h4 class='text-danger'>There are no doctor with this name.</h4>";
                  }
                }
              }
           echo @$error;
        ?>
    </div>
</body>
</html>