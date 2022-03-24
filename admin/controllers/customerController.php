<?php include_once __DIR__.'/../models/customer.php';
class CustomerController extends Customer{
    public function getCustomers()
    {
        return $this-> getCustomersInfo();
    }
    public function addCustomer($name,$mobile,$email,$date)
    {
        return $this -> addCustomerInfo($name,$mobile,$email,$date);
    }
    public function getCustomer($id)
    {
        return $this -> getCustomerInfo($id);
    }
    public function updateCustomer($id,$name,$mobile,$email,$date)
    {
        return $this -> updateCustomerInfo($id,$name,$mobile,$email,$date);
    }
    public function deleteCustomer($id)
    {
        return $this->deleteCustomerInfo($id);
        
    }

}
 ?>