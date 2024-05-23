<?php include("header.php");?>
<body>
    <nav class="navbar navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Online Doctor Schedule Program</a>
        </div>
        <ul class="nav navbar-nav">
          <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
        
                  <form class="navbar-form navbar-right" action="search.php" method="get">
          <div class="form-group">
            <input type="text" name="search" class="form-control" placeholder="Search">
          </div>
          <button type="submit" name="searching" class="btn btn-default">Submit</button>
        </form>
        
        
       
      </div>
    </nav>
    <!--End nevigation -->
    <!-- Start main content -->
    <main class="container">
        <div class="row">
            <div class="col-md-6">
              
            <?php include('doctors.php');?>
            </div>
            <div class="row col-md-2"></div>
            <div class="row col-md-4">
                <?php include("department.php");?>
            </div>
        </div>
        
    </main>
    <!-- End main content -->
</body>
</html>