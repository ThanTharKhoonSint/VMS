<?php
include_once  __DIR__.'/controllers/customerController.php';

$id=$_POST['cid'];
$customerController = new customerController();
$result = $customerController->deleteCustomer($id);

$customers =$customerController->getCustomers();
//variable type to JS file
$output = null;
$count=0;
foreach($customers as $customer)
{
    $output .= "<tbody><tr>";
    $output= "<td>". $count++."</td>";
    $output= "<td>". $customer['name']."</td>";
  
    $output= "<td>". $customer['mobile']."</td>";
    
    $output= "<td>". $customer['email']."</td>";
    $output= "<td>". $customer['address']."</td>";
    $output= "<td id=".$customer['id'].">
        <a class='btn btn-primary m-1' href='emp_view.php?id=".$customer['id']."'>View </a>
        <a class='btn btn-warning m-1' href='emp_edit.php?id=".$customer['id']."'>Edit</a>
        <a class='btn btn-danger m-1 delete' >Delete</a></td>";
    $output= "</tr></tbody>";
}

echo $output;
?>