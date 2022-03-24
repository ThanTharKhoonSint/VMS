<?php include_once __DIR__.'/../includes/db.php';
class Customer 
{
    public function getCustomersInfo()
    {
        $this->pdo=Database::connect();
        if($this->pdo!=null)
        {
           // echo "successful connection";
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //sql query
            $sql="select * from user";
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
    public function getCustomerInfo($id)
    {
        $this->pdo=Database::connect();
        if($this->pdo!=null)
        {
            echo "successful connection";
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //sql query
            $sql="select  * from user where id=:id";
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
    public function addCustomerInfo($name,$mobile,$email,$date)
    {
       
        $this->pdo=Database::connect();
    if($this->pdo!=null)
    {
        echo "successful connection";
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //sql query
        $sql="insert into user(name,mobile,email,date)
         values(:name,:mobile,:email,:date)";
        //sql statement
        $statement=$this->pdo->prepare($sql);
        //bind param
        $statement->bindParam(":name",$name);
        $statement->bindParam(":mobile",$mobile);
        $statement->bindParam(":email",$email);
        $statement->bindParam(":date",$date);
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
    public function updateCustomerInfo($id,$name,$mobile,$email,$date)
    {
        $this->pdo=Database::connect();
        if($this->pdo!=null)
        {
            echo "successful connection";
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //sql query
            $sql="update user set name=:name, mobile=:mobile, email=:email, date=:date where id=:id";
            //sql statement
            $statement=$this->pdo->prepare($sql);
            //bind param
            $statement->bindParam(":id",$id);
            $statement->bindParam(":name",$name);
            $statement->bindParam(":mobile",$mobile);
            $statement->bindParam(":email",$email);
            $statement->bindParam(":date",$date);
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
    public function deleteCustomerInfo($id)
    {
        $this->pdo=Database::connect();
        if($this->pdo!=null)
        {
           // echo "successful connection";
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //sql query
            $sql="delete from user where id=:id";
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