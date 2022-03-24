<?php
 include_once __DIR__.'/controllers/mechanicController.php';

 session_start();

 
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
        $mobile_error="Please enter contact No.";
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
        $mechanicController=new MechanicController();
        $mechanics=$mechanicController->addMechanic($name,$mobile,$email,$address);
        if($mechanics)
        {
            echo "rrrrr";
            $_SESSION['message']="Successfully added new employee";
            header('location:mechanic_index.php');
        }
    }

}
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
                        <h1 class="h4 mb-0 text-gray-800">Mechanic Information</h1>
                        <a href="mechanic_create.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Add New Mechanic</a>
                    </div>
                    <div class="row-sm">
             <h4>Add VSMS MECHANICS</h4>
                    </div>
  <div class="row">
  <div class="col-md-12">
   <form method="post" >
       <div class="m-3">
        <div class="row">
        <div class="col-md-4">
        <label class="form-label"> Mechanic Name</label></div>
        <div class="col-md-8">
        <input type="text" class="form-control " name="name" placeholder="Mechanic Name" value="<?php if(isset($name)) echo $name; ?>"> 
         <span class="text-danger"><?php if(isset($name_error)) echo $name_error; ?></span>    
       </div>    
       </div> 
       </div>  
   
  
<div class="m-3">
<div class="row">
    <div class="col-md-4">
    <label class="form-label"> Mechanic Contact Number</label></div>
    <div class="col-md-8">
    <input type="text" class="form-control" name="mobile" placeholder="Contact Number"value="<?php if(isset($mobile)) echo $moblie; ?>"> 
    <span class="text-danger"><?php if(isset($mobile_error)) echo $mobile_error; ?></span>
    </div>
</div>
</div>
                   

<div class="m-3">
        <div class="row">
        <div class="col-md-4">
        <label class="form-label"> Mechanic Email</label></div>
        <div class="col-md-8">
        <input type="text" class="form-control" name="email" placeholder="Email" value="<?php if(isset($email)) echo $email; ?>"> 
        <span class="text-danger"><?php if(isset($email_error)) echo $email_error; ?></span>
        </div>
</div>
</div>
<div class="m-3">
        <div class="row">
        <div class="col-md-4">
        <label class="form-label"> Mechanic Address</label></div>
        <div class="col-md-8">
        <input type="text" class="form-control" name="address" placeholder="Address" value="<?php if(isset($address)) echo $address; ?>"> 
        <span class="text-danger"><?php if(isset($address_error)) echo $address_error; ?></span>           
        </div>
        </div>
</div>                   
<div class="m-2 d-flex justify-content-center">
    <button type="submit" name="submit" class="btn btn-primary ">Add
    </div>
   </form>
     </div>
  </div>
   </div>
         
               
 <?php include_once __DIR__.'/masterlayouts/footer.php'; ?>