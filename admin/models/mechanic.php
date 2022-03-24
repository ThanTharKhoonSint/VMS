<?php
include_once __DIR__.'/../includes/db.php';
class Mechanic {
    public function getMechanicsInfo()
    {
        $this->pdo=Database::connect();
    if($this->pdo!=null)
    {
       // echo "successful connection";
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //sql query
        $sql="select * from mechanic";
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
    public function addMechanicInfo($name,$mobile,$email,$address)
    {
       
        $this->pdo=Database::connect();
    if($this->pdo!=null)
    {
        echo "successful connection";
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //sql query
        $sql="insert into mechanic(name,mobile,email,address)
         values(:name,:mobile,:email,:addr)";
        //sql statement
        $statement=$this->pdo->prepare($sql);
        //bind param
        $statement->bindParam(":name",$name);
        $statement->bindParam(":mobile",$mobile);
        $statement->bindParam(":email",$email);
        $statement->bindParam(":addr",$address);
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

    public function getMechanicInfo($id){
        $this->pdo=Database::connect();
        if($this->pdo!=null)
        {
            echo "successful connection";
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //sql query
            $sql="select  * from mechanic where id=:id";
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

    public function updateMechanicInfo($id,$name,$mobile,$email,$address)
    {
        $this->pdo=Database::connect();
        if($this->pdo!=null)
        {
            echo "successful connection";
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //sql query
            $sql="update mechanic set name=:name, mobile=:mobile, email=:email, address=:addr where id=:id";
            //sql statement
            $statement=$this->pdo->prepare($sql);
            //bind param
            $statement->bindParam(":id",$id);
            $statement->bindParam(":name",$name);
            $statement->bindParam(":mobile",$mobile);
            $statement->bindParam(":email",$email);
            $statement->bindParam(":addr",$address);
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
    public function deleteMechanicInfo($id)
    {
        $this->pdo=Database::connect();
        if($this->pdo!=null)
        {
           // echo "successful connection";
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //sql query
            $sql="delete from mechanic where id=:id";
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
} ?>