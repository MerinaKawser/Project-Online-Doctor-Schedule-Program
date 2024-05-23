<?php
//session_start();
include("../header.php");
include("../connection.php");
?>
<body>
    <div class="text-center">
        <h2 class="header">Doctors Details</h2>
        <hr>
    </div>
    <div class="container">
    <?php 
         $id = $_GET['id'];
         $sql = "SELECT* FROM `doctor` WHERE `id`='$id'";
         $query = mysqli_query($con, $sql);
         $row = mysqli_num_rows($query);
         if($row>0){
             while($data=mysqli_fetch_assoc($query)){
                 //echo $data['email'];
                 //echo "<h3> Welcome! " . $data['name'] . "</h3>";
                 ?>                  
                 <div class="panel panel-default">
                     <div class="panel-heading">Name</div>
                     <div class="panel-body"><?php echo $data['name'];?></div>
                     <!--<div class="panel-footer"><button type="button" class="btn btn-info btn-sm" >Edit</button></div>-->
                 </div>
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
                     <div class="panel-heading">BMDC No.</div>
                     <div class="panel-body"><?php echo $data['bmdc'];?></div>
                     
                 </div>              
                 <?php 
             }
         }       
    
    ?>
    </div>
    
</body>