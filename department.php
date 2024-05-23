<?php 
    include("header.php");
    include("connection.php");
?>
<body>
    <?php 
        //bone
         $sql = "SELECT* FROM `doctor` WHERE  `status`='Accepted' and `specialist`='bone' ";
         $query = mysqli_query($con, $sql);
         $row = mysqli_num_rows($query);
         if($row>0){
             while($data=mysqli_fetch_assoc($query)){
                ?>

               <?php
             }
         }
        //bone
        //medicine
        $sql_medicine = "SELECT* FROM `doctor` WHERE  `status`='Accepted' and `specialist`='medicine' ";
             $query_medicine = mysqli_query($con, $sql_medicine);
             $row_medicine = mysqli_num_rows($query_medicine);
             if($row>0){
                 while($data=mysqli_fetch_assoc($query_medicine)){
                    ?>
                    
                   <?php
                 }
             }
        //medicine

    ?>  
    <div class="container">
    <h3 style="margin: 2%;">Doctors Department</h3>
              <hr>
              
        
        <ul class="list-group" style="width: 500px;">

            <li class="list-group-item"><a href="department/bone.php">Bone</a><span class="badge"><?php echo $row;?></span></li>             
            <li class="list-group-item"><a href="department/medicine.php">Medicine</a><span class="badge"><?php echo $row_medicine;?></span></li>             
        </ul>

        
        
    </div>
</body>
</html>