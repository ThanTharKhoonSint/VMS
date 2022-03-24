<?php
include_once __DIR__.'/controllers/vehicleController.php';

session_start();
$id=$_GET['id'];
$vehicleController=new VehicleController();
$vehicle = $vehicleController -> getVehicle($id);

if(isset($_POST['submit']))
{
    $errors=false;
    if(!empty($_POST['name']))
    {
        $name=$_POST['name'];
    }
    else
    {
        $name_error="Please enter name";
        $errors=true;
    }
    
    if($errors==false)
    {
        
        $changeVehicle=$vehicleController->updateVehicle($id,$name);
       
        if($changeVehicle)
        {
            $_SESSION['message']='Successfully updated ';
            header('location:vehicle_index.php');
        }
    }

}
?>
<div id="wrapper">
<?php include_once __DIR__.'/masterlayouts/sidebar.php';?>
<div class="content-page">
<?php include_once __DIR__.'/masterlayouts/header.php';?>
              

                <!-- Start Page content -->
               
                <div class="content">

                    <div class="container-fluid bg-white">
                    

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 mb-0 text-gray-800">Vehicle Information</h1>
    <a href="vehicle_create.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Add New Vehicle</a>
</div>

<div class="row-sm">
             <h4>Edit VSMS MECHANICS</h4>
                    </div>
  <div class="row">
  <div class="col-md-12">
   <form method="post" >
       <div class="m-3">
        <div class="row">
        <div class="col-md-4">
        <label class="form-label"> Vehicle Name</label></div>
        <div class="col-md-8"> 
        <input type="text" class="form-control" name="name" placeholder="Vehicle Name" value="<?php echo $vehicle[0]['name']; ?>"> 
        <span class="text-danger"><?php if(isset($name_error)) echo $name_error; ?></span>    </div>    
        </div>  
       </div> 
       <div class="m-2 d-flex justify-content-center">
        <button type="submit" name="submit" class="btn btn-primary ">Update
         </div>
        
             </form>
         </div>
     </div>
 
                    </div> <!-- container -->

                </div> <!-- content -->

<?php include_once "masterlayouts/footer.php"; ?>