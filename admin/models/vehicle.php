<?php
include_once __DIR__.'/../includes/db.php';
class Vehicle {
    public function getVehiclesInfo(){
    
        $this->pdo=Database::connect();
    if($this->pdo!=null)
    {
       // echo "successful connection";
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //sql query
        $sql="select * from category";
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
    public function addVehicleInfo($name)
    {
       
        $this->pdo=Database::connect();
    if($this->pdo!=null)
    {
        echo "successful connection";
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //sql query
        $sql="insert into category(name)
         values(:name)";
        //sql statement
        $statement=$this->pdo->prepare($sql);
        //bind param
        $statement->bindParam(":name",$name);
        
        //run sql statement
        echo "///////";
        if($statement->execute())
        {
            echo "....";
            return true;
        }
        else
        {
            return false;
        }    
    }
}
public function getVehicleInfo($id){
    $this->pdo=Database::connect();
    if($this->pdo!=null)
    {
        echo "successful connection";
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //sql query
        $sql="select  * from category where id=:id";
        //sql statement
        $statement=$this->pdo->prepare($sql);
        //bind param
        $statement->bindParam(":id",$id);
       
        //run sql statement
        echo "///////";
       $statement->execute();
       $results=$statement->fetchAll(PDO::FETCH_ASSOC);
    //echo sizeof($results);
    return $results;
    }
}

public function updateVehicleInfo($id,$name)
{
    $this->pdo=Database::connect();
    if($this->pdo!=null)
    {
        echo "successful connection";
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //sql query
        $sql="update category set name=:name where id=:id";
        //sql statement
        $statement=$this->pdo->prepare($sql);
        //bind param
        $statement->bindParam(":id",$id);
        $statement->bindParam(":name",$name);
       
        //run sql statement
        echo "///////";
        if($statement->execute())
        {
            echo "....";
            return true;
        }
        else
        {
            return false;
        }    
    }
}
public function deleteVehicleInfo($id)
{
    $this->pdo=Database::connect();
    if($this->pdo!=null)
    {
        echo "successful connection";
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //sql query
        $sql="delete from category where id=:id";
        //sql statement
        $statement=$this->pdo->prepare($sql);
        //bind param
        $statement->bindParam(":id",$id);
       
        //run sql statement
        
        if($statement->execute())
        {
           
            return true;
        }
        else
        {
            return false;
        }    
    }
}
}
?>