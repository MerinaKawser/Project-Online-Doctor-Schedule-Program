<?php 
    include("../connection.php");
?>
<body>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Profile</th>
                <th>Status</th>
                <th>Remove Account</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            
            // reject
            if(isset($_POST['remove'])){
                $id = $_GET['id'];
                $d_sql = "UPDATE `doctor` SET `status` = 'Remove' WHERE `id` = '$id' and `status` = 'Accepted'";
                $d_query = mysqli_query($con, $d_sql);
            }
            $sql = "SELECT* FROM `doctor` WHERE `status` = 'Accepted'";
            $query = mysqli_query($con, $sql);
            $row = mysqli_num_rows($query);
            if($row>0){
                while($data = mysqli_fetch_assoc($query)){
                    ?>
                    <tr>
                        <td><a href="schedule.php?id=<?php echo $data['id'];?>"><?php echo $data['name'];?></a></td>
                        
                        <td><?php echo $data['status'];?></td>
                        
                        <td>
                            <form action="dashboard.php?id=<?php echo $data['id'];?>" method="POST">
                                <input class="btn btn-danger" type="submit" name="remove" value="Remove">
                            </form>
                        </td>

                    </tr>
                    <?php
                }
            }
        ?>
        </tbody>
    </table>
</body>