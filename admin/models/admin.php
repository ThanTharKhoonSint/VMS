<?php
include_once __DIR__.'/../includes/db.php';
class Admin {
    public function getAdminsInfo()
    {
        $this->pdo=Database::connect();
    if($this->pdo!=null)
    {
       // echo "successful connection";
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //sql query
        $sql="select * from admin";
        //sql statement
        $statement=$this->pdo->prepare($sql);
        //run sql statement
        $statement->execute();
        //get the results
        $results=$statement->fetchAll(PDO::FETCH_ASSOC);
        //echo sizeof($results);
        return $results;
    }
    }
}
?>