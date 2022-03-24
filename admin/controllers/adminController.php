<?php
include_once __DIR__.'/../models/admin.php';
class AdminController extends Admin
{
    public function getAdmins()
    {
        return $this->getAdminsInfo();
    }
}
?>