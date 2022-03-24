<?php
include_once  __DIR__.'/controllers/mechanicController.php';

$id=$_POST['cid'];
$mechanicController = new MechanicController();
$result = $mechanicController->deleteMechanic($id);

$results =$mechanicController->getMechanics();
//variable type to JS file
$output = null;
$count=0;
foreach($results as $mechanic_result)
{
    $output .= "<tbody><tr>";
    $output= "<td>". $count++."</td>";
    $output= "<td>". $mechanic_result['name']."</td>";
  
    $output= "<td>". $mechanic_result['mobile']."</td>";
    
    $output= "<td>". $mechanic_result['email']."</td>";
    $output= "<td>". $mechanic_result['address']."</td>";
    $output= "<td id=".$mechanic_result['id'].">
        <a class='btn btn-primary m-1' href='emp_view.php?id=".$mechanic_result['id']."'>View </a>
        <a class='btn btn-warning m-1' href='emp_edit.php?id=".$mechanic_result['id']."'>Edit</a>
        <a class='btn btn-danger m-1 delete' >Delete</a></td>";
    $output= "</tr></tbody>";
}

echo $output;
?>