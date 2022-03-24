<?php
include_once __DIR__.'/controllers/mechanicController.php';
 
session_start();

$mechanicController = new MechanicController();
$mechanics = $mechanicController -> getMechanics();


?>

        <!-- Begin page -->
        <div id="wrapper">
<?php include_once __DIR__.'/masterlayouts/sidebar.php';?>
<div class="content-page">
<?php include_once __DIR__.'/masterlayouts/header.php';?>
              

                <!-- Start Page content -->
               
                <div class="content">

                    <div class="container-fluid bg-white">

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 mb-0 text-gray">Mechanic Information</h1>
     <a href="mechanic_create.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
          class="fas fa-download fa-sm text-white-50">
      </i> Add New Mechanic</a>
  </div>

  <div class="row">
                        
                        <?php
                            if(isset($_SESSION['message'])) 
                            {
                               echo "<div class='col-md-12 alert alert-primary'>";
                               echo  $_SESSION['message'];
                               echo "</div>";
                               
                            }
                            unset($_SESSION['message']);
                               
                            ?>
                        
   </div>

    <div class="row">
        
        <div class="col-md-12">
            <table class="table table-bordered text-center">
                <thead >
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Moblie Number</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
               
                    
                        <?php
                        $count=1;
                        foreach ($mechanics as $mechanic)
                        {
                            echo " <tbody id='tbody'>";
                            echo "<tr><td>".$count++."</td>";
                            echo "<td>".$mechanic['name']."</td>";
                            echo "<td>".$mechanic['mobile']."</td>";
                            echo "<td>".$mechanic['email']."</td>";
                            echo "<td>".$mechanic['address']."</td>";
                            echo "<td id=".$mechanic['id'].">
       
        <a class='btn text-primary m-1' href='mechanic_edit.php?id=".$mechanic['id']."'>Edit</a>
        |
        <a class='btn text-danger m-1 delete'>Delete</a></td>";
        echo "</tr></tbody>";
        
                        }
                        ?>
              
            </table>
        </div>
    </div>

                    </div> <!-- container -->

                </div> <!-- content -->

                <?php include_once __DIR__.'/masterlayouts/footer.php';?>
          