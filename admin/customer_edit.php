<?php
include_once __DIR__.'/controllers/customerController.php';

session_start();
$id=$_GET['id'];
$customerController=new customerController();
$customer = $customerController -> getCustomer($id);
echo $customer[0]['name'];
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
    if(!empty($_POST['date']))
    {
        $date=$_POST['date'];
       
    
        
    }
    else
    {
        $date_error="Please enter date";
        $errors=true;
    }
    
    if($errors==false)
    {
        
        $user=$customerController->updateCustomer($id,$name,$mobile,$email,$date);
       
        if($user)
        {
            $_SESSION['message']='Successfully updated ';
            header('location:customer_index.php');
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
    <h1 class="h3 mb-0 text-gray-800">Customer Information</h1>
    <a href="customer_create.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Add New Customer</a>
</div>
<div class="row-sm">
             <h4>EDIT VSMS CUSTOMERS</h4>
                    </div>
  <div class="row">
  <div class="col-md-12">
   <form method="post" >
       <div class="m-3">
        <div class="row">
        <div class="col-md-4">
        <label class="form-label"> Customer Name</label></div>
        <div class="col-md-8"> 
        <input type="text" class="form-control" name="name" placeholder="Customer Name" value="<?php echo $customer[0]['name'] ?>"> 
        <span class="text-danger"><?php if(isset($name_error)) echo $name_error; ?></span>
        </div>
        </div>
       </div>
       
       <div class="m-3">
        <div class="row">
        <div class="col-md-4">
        <label class="form-label"> Customer Contact Number</label></div>
        <div class="col-md-8">
        <input type="text" class="form-control" name="mobile" placeholder="Contact Number"value="<?php echo  $customer[0]['mobile']  ?>"> 
         <span class="text-danger"><?php if(isset($mobile_error)) echo $mobile_error; ?></span>
                        
        </div>
        </div></div>

        <div class="m-3">
        <div class="row">
        <div class="col-md-4">
        <label class="form-label"> Customer Email</label></div>
        <div class="col-md-8">
        <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo  $customer[0]['email']  ?>"> 
        <span class="text-danger"><?php if(isset($email_error)) echo $email_error; ?></span>
        </div>
        </div></div>

        <div class="m-3">
        <div class="row">
        <div class="col-md-4">
        <label class="form-label"> Customer Date</label></div>
        <div class="col-md-8">
        <input type="date" class="form-control" name="date" placeholder="Date" value="<?php echo  $customer[0]['date'] ?>"> 
                             <span class="text-danger"><?php if(isset($date_error)) echo $date_error; ?></span>
        </div>
        </div></div>
      
        <div class="m-2 d-flex justify-content-center">
        <button type="submit" name="submit" class="btn btn-primary ">Add
        </div>
        

             </form>
         </div>
     </div>
 </div><!-- container -->

                </div> <!-- content -->
       
              
<?php include_once "masterlayouts/footer.php"; ?>