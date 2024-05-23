<?php 
include("../header.php");
include("../connection.php");
?>
<body>
<nav class="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Online Doctor Schedule Program</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout </a></li>
    </ul>
  </div>
</nav>
    <div class="text-center">
        <h2 class="header">Admin Dashboard</h2>
        <hr>
    </div>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a data-toggle="pill" href="#request_list">ALL Request</a></li>
                        
                        <li><a data-toggle="pill" href="#list">All The Doctors Info</a></li>
                    </ul>
                </div>
                <div class="col-md-10">
                    <div class="tab-content">
                        <div id="request_list" class="tab-pane fade active in">
                            <?php include("request_list.php");?>
                        </div>
                        
                        <div id="list" class="tab-pane fade">
                            <?php include("all.php");?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>