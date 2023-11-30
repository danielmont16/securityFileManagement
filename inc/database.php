<?php

//creating the class Database to initiate the database connection
  
  class Database{
    
    private $connection;

    //calling the method connection_db()
    function __construct()
      {
        $this->connect_db();
      }
   
    //this method establishes the connection with the database using mysqli_connect function
    //if the connection fails it display an error message

    public function connect_db(){
      $this->connection = mysqli_connect('localhost', 'root', '', 'db1');
     
      if(mysqli_connect_error()){
       die("Database Connection Failed" . mysqli_connect_error());
      }
    }

//fetching data from the database
    public function getData($query){
      $result = $this->connection->query($query);
      if ($result == false){
        return false;
        
      }
      $rows = array();
      while ($row = $result->fetch_assoc()){
        $rows[] = $row;
      }
      return $rows;
    }

//method to allow execute of sql queries
    public function execute($query){
      $result = $this->connection->query($query);    

      if ($result == false){
        echo 'Error: cannot execute the command';
        return false;
      }else{
        return true;
      }
    }

    public function updateRecord($ufName, $ulName, $uemployeeID,$uposition, $uemail, $udateOfBirth, $unChildren, $unCars,  $ulEducation, $ucountry, $entry)
  {
      $query = "UPDATE tbl_eprofile SET fName = '$ufName', lName = '$ulName', employeeID = '$uemployeeID', position = '$uposition', email = '$uemail', dateOfBirth ='$udateOfBirth',
      nChildren = '$unChildren', nCars ='$unCars', lEducation ='$ulEducation', country = '$ucountry' WHERE entry = '$entry'";
      
      $sql = $this->connection->query($query);
      if ($sql==true) {
        header("Location:profile.php?msg2=update");
      }else{
        echo "Registration updated failed try again!";
      }
    
  }
    
// Delete customer data from customer table
  public function deleteRecord($id)
  {
    
    $query = "DELETE FROM tbl_eprofile WHERE employeeID = '$id'";
    $sql = $this->connection->query($query);
    if ($sql==true) {
      header("Location:profile.php?msg3=delete");
    }else{
      echo "Record does not delete try again";
    }
  }


  }

  //creating the object database to interect with the connection
  $database = new Database();
?>
