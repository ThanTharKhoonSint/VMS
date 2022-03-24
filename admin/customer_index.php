<?php
include_once __DIR__.'/controllers/customerController.php';
 
session_start();

$customercontroller = new CustomerController();
$customers = $customercontroller -> getCustomers();


?>
<div id="wrapper">
<?php include_once __DIR__.'/masterlayouts/sidebar.php';?>
<div class="content-page">
<?php include_once __DIR__.'/masterlayouts/header.php';?>
              

                <!-- Start Page content -->
               
                <div class="content">

                    <div class="container-fluid">
                    <div class="container-fluid bg-white">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 mb-0 text-gray-800">Customer Information</h1>
     <a href="customer_create.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
          class="fas fa-download fa-sm text-white-50">
      </i> Add New Customer</a>
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
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Moblie Number</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    
                        <?php
                        $count=1;
                        foreach ($customers as $customer)
                        {
                            echo "<tr><td>".$count++."</td>";
                            echo "<td>".$customer['name']."</td>";
                            echo "<td>".$customer['mobile']."</td>";
                            echo "<td>".$customer['email']."</td>";
                            echo "<td>".$customer['date']."</td>";
                            echo "<td id=".$customer['id'].">
       
        <a class='btn text-primary m-1' href='customer_edit.php?id=".$customer['id']."'>Edit</a>
        |
        <a class='btn text-danger m-1 cdelete '  >Delete</a></td>";
        echo "</tr></tbody>";
                        }
                        ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

                    
                    </div> <!-- container -->

                </div> <!-- content -->




 <?php include_once __DIR__.'/masterlayouts/footer.php';?>