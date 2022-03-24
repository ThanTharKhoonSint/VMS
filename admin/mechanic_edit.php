<?php
include_once __DIR__.'/controllers/mechanicController.php';

session_start();
$id=$_GET['id'];
$mechanicController=new MechanicController();
$mechanic = $mechanicController -> getMechanic($id);

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
    if(!empty($_POST['mobile']))
    {
        $mobile=$_POST['mobile'];
    }
    else
    {
        $mobile_error="Please enter mobile";
        $errors=true;
    }
    if(!empty($_POST['email']))
    {
        $email=$_POST['email'];
    }
    else
    {
        $email_error="Please enter email";
        $errors=true;
    }
    if(!empty($_POST['address']))
    {
        $address=$_POST['address'];
        
    }
    else
    {
        $address_error="Please enter address";
        $errors=true;
    }
    
    if($errors==false)
    {
        
        $mec=$mechanicController->updateMechanic($id,$name,$mobile,$email,$address);
       
        if($mec)
        {
            $_SESSION['message']='Successfully updated ';
            header('location:mechanic_index.php');
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
                        <h1 class="h4 mb-0 text-gray-800">Mechanic Information</h1>
                        <a href="mechanic_create.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Add New Mechanic</a>
                    </div>
                    <div class="row-sm">
             <h4>EDIT VSMS MECHANICS</h4>
                    </div>
                    <div class="row">
  <div class="col-md-12">
   <form method="post" >
       <div class="m-3">
        <div class="row">
        <div class="col-md-4">
        <label class="form-label"> Mechanic Name</label></div>
        <div class="col-md-8">
        <input type="text" class="form-control " name="name" placeholder="Mechanic Name" value="<?php echo $mechanic[0]['name']; ?>"> 
         <span class="text-danger"><?php if(isset($name_error)) echo $name_error; ?></span>    
       </div>    
       </div> 
       </div>  
   
  
<div class="m-3">
<div class="row">
    <div class="col-md-4">
    <label class="form-label"> Mechanic Contact Number</label></div>
    <div class="col-md-8">
    <input type="text" class="form-control" name="mobile" placeholder="Contact Number"value="<?php echo $mechanic[0]['mobile']; ?>"> 
    <span class="text-danger"><?php if(isset($mobile_error)) echo $mobile_error; ?></span>
    </div>
</div>
</div>
                   

<div class="m-3">
        <div class="row">
        <div class="col-md-4">
        <label class="form-label"> Mechanic Email</label></div>
        <div class="col-md-8">
        <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $mechanic[0]['email']; ?>"> 
        <span class="text-danger"><?php if(isset($email_error)) echo $email_error; ?></span>
        </div>
</div>
</div>
<div class="m-3">
        <div class="row">
        <div class="col-md-4">
        <label class="form-label"> Mechanic Address</label></div>
        <div class="col-md-8">
        <input type="text" class="form-control" name="address" placeholder="Address" value="<?php echo $mechanic[0]['address']; ?>"> 
        <span class="text-danger"><?php if(isset($address_error)) echo $address_error; ?></span>           
        </div>
        </div>
</div>                   
<div class="m-2 d-flex justify-content-center">
    <button type="submit" name="submit" class="btn btn-primary ">Update
    </div>
   </form>
     </div>
  </div>
   </div>
   
<?php include_once "masterlayouts/footer.php"; ?>