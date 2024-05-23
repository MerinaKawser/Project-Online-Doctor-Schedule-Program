<?php
//session_start();
include("../header.php");
include("../connection.php");
?>
<body>
    
<?php 
        if(isset($_SESSION['email'])){
            $email = $_SESSION['email'];
            $sql_s = "SELECT* FROM `doctor` WHERE `email`='$email' && `status`='Accepted'";
            $query_s = mysqli_query($con, $sql_s);
            $row_s = mysqli_num_rows($query_s);
            if($row_s>0){
                while($data_s=mysqli_fetch_assoc($query_s)){
                    
                    ?>                  
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">Day</div>
                        <div class="panel-body"><?php echo $data_s['s_day'];?></div>
                        <!--<div class="panel-footer"><button type="button" class="btn btn-info btn-sm" >Edit</button></div>-->
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">Time</div>
                        <div class="panel-body"><?php echo $data_s['s_time'];?></div>
                        
                    </div>
                    
                    <div class="panel panel-default">
                        <div class="panel-footer text-center"><button type="button" class="btn btn-info" data-toggle="modal" data-target="#mySchedule" >Edit</button></div>
                    </div>
                    <?php 
                }
            }
           
        }
    ?>
    <!-- Modal Design for Updating Data -->
    <div id="mySchedule" class="modal fade" role="dialog">
        <div class="modal-dialog">
             <!-- Modal content-->
             <div class="modal-content">
               <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h4 class="modal-title">My Schedule</h4>
               </div>
               <div class="modal-body">
                 <p><?php include("s_update.php");?></p>
               </div>
               <div class="modal-footer">
                 <button href="s_update.php?id=<?php echo $data_s['id'];?>"type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>
             </div>
        </div>
    </div>
</body>