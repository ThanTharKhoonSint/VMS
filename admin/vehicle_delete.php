<?php
include_once  __DIR__.'/controllers/vehicleController.php';

$id=$_POST['vid'];
$vehicleController = new VehicleController();
$result = $vehicleController->deleteVehicle($id);

$vehicles =$vehicleController->getVehicles();
//variable type to JS file
$output = null;
$count=0;
foreach($vehicles as $vehicle)
{
    $output .= "<tbody><tr>";
    $output= "<td>". $count++."</td>";
    $output= "<td>". $vehicle['name']."</td>";
  
    $output= "<td>". $vehicle['mobile']."</td>";
    
    $output= "<td>". $vehicle['email']."</td>";
    $output= "<td>". $vehicle['address']."</td>";
    $output= "<td id=".$vehicle['id'].">
        <a class='btn btn-primary m-1' href='emp_view.php?id=".$vehicle['id']."'>View </a>
        <a class='btn btn-warning m-1' href='emp_edit.php?id=".$vehicle['id']."'>Edit</a>
        <a class='btn btn-danger m-1 vdelete' >Delete</a></td>";
    $output= "</tr></tbody>";
}

echo $output;
?>