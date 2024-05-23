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
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">Email</div>
                        <div class="panel-body"><?php echo $data['email'];?></div>
                        <!--<div class="panel-footer"><button type="button" class="btn btn-info btn-sm" >Edit</button></div>-->
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">Phone</div>
                        <div class="panel-body"><?php echo $data['phone'];?></div>
                        
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">Specialist</div>
                        <div class="panel-body"><?php echo $data['specialist'];?></div>
                        
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">Clinic Address</div>
                        <div class="panel-body"><?php echo $data['clinic_address'];?></div>
                        
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">Password</div>
                        <div class="panel-body"><input type='password' name='password'/></div>
                       
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-footer text-center"><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal" >Edit</button></div>
                    </div>
                    <?php 
                }
            }
           
        }
    ?>
    <!-- Modal Design for Updating Data -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
             <!-- Modal content-->
             <div class="modal-content">
               <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h4 class="modal-title">My Profile</h4>
               </div>
               <div class="modal-body">
                 <p><?php include("update_profile.php");?></p>
               </div>
               <div class="modal-footer">
                 <button href="update_profile.php?id=<?php echo $data['id'];?>"type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>
             </div>
        </div>
    </div>
</body>