<?php 
    include("../connection.php");
?>
<body>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Profile</th>
                <th>Status</th>
                <th>Approve</th>
                <th>Reject</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            // approval
            if(isset($_POST['approved'])){
                $id = $_GET['id'];
                $a_sql = "UPDATE `doctor` SET `status` = 'Accepted' WHERE `id` = '$id'";
                $a_query = mysqli_query($con, $a_sql);
            }
            // reject
            if(isset($_POST['deny'])){
                $id = $_GET['id'];
                $d_sql = "UPDATE `doctor` SET `status` = 'Denied' WHERE `id` = '$id' and `status` = 'Pending'";
                $d_query = mysqli_query($con, $d_sql);
            }
            $sql = "SELECT* FROM `doctor` WHERE `status` = 'Pending'";
            $query = mysqli_query($con, $sql);
            $row = mysqli_num_rows($query);
            if($row>0){
                while($data = mysqli_fetch_assoc($query)){
                    ?>
                    <tr>
                        <td><a href="doc_info.php?id=<?php echo $data['id'];?>"><?php echo $data['name'];?></a></td>
                        
                        <td><?php echo $data['status'];?></td>
                        <td>
                            <form action="dashboard.php?id=<?php echo $data['id'];?>" method="POST">
                                <input class ="btn btn-success" type="submit" name="approved" value="Accept">
                                <?php //header("Location:dashboard.php");?>
                            </form>
                        </td>
                        <td>
                            <form action="dashboard.php?id=<?php echo $data['id'];?>" method="POST">
                                <input class="btn btn-danger" type="submit" name="deny" value="Reject">
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