<?php
include_once __DIR__.'/../models/mechanic.php';
class MechanicController extends Mechanic{

    public function getMechanics(){
        return $this->getMechanicsInfo();
    }

    public function addMechanic($name,$moblie,$email,$address){
        echo "/////";
        return $this -> addMechanicInfo($name,$moblie,$email,$address);
    }

    public function getMechanic($id)
    {
        return $this-> getMechanicInfo($id);
    }

    public function updateMechanic($id,$name,$mobile,$email,$address)
    {
        return $this->updateMechanicInfo($id,$name,$mobile,$email,$address);
    }
    public function deleteMechanic($id)
    {
        return $this->deleteMechanicInfo($id);
    }
}
?>