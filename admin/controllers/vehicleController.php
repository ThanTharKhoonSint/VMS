<?php
include_once __DIR__.'/../models/vehicle.php';
class VehicleController extends Vehicle{ 
public function getVehicles()
 {
    return $this->getVehiclesInfo();
 }
 public function addVehicle($name)
 {
    return $this->addVehicleInfo($name);
    }
public function getVehicle($id)
    {
       return $this -> getVehicleInfo($id);
    }
public function updateVehicle($id ,$name)
{
   return $this->updateVehicleInfo($id,$name);
}
public function deleteVehicle($id)
{
   return $this -> deleteVehicleInfo($id);
}
}
?>