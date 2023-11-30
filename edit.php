
<?php
require './inc/header.php';
include_once './inc/database.php';
	//check for authentication before we show any data
	session_start();
	if (!isset($_SESSION['user_id'])) {
		header('location:signin.php');
		exit();
	}
  
  $employeeID = $_SESSION['employeeID'];         
  $query = "SELECT * FROM tbl_eprofile WHERE employeeID = '$employeeID'";       
  $result = $database->getData($query);
?>


<div class="position-relative">
        <div class="position-absolute bottom-0 end-0">      
            <a href="logout.php"><button class="btn btn-warning m-5">Logout</button></a> 
        </div>
    </div>

<main>


<div class="container">

    <div class="form-row row">
    
    <div class="col-sm-12 col-md-6 admin p-5">
    
            <div class="p-5 shadow">
            
            <h3>Update Employee Profile Form</h3><br>

                <form method="post" enctype='multipart/form-data'> 
                                  
                    <p><label for="fName">First name</label><input type="text" name="ufName" id="fName" value="<?php echo $result[0]['fName']; ?>"></p>
                    <p><label for="lName">Last name</label><input type="text" name="ulName" id="lName" value="<?php echo $result[0]['lName']; ?>"></p>
                    <p><Label for="employeeID">Employee ID</Label><input type="text"  name="uemployeeID" id="employeeID" value="<?php echo $result[0]['employeeID']; ?>"></p>
                    <p><label for="position">Employee position</label><input type="text" name="uposition" id = "position" value="<?php echo $result[0]['position']; ?>"></p>
                    <p><label for="email">Employee email</label><input type="text" name="uemail" id="email" value="<?php echo $result[0]['email']; ?>"></p>
                    <p><label for="dateOfBirth">Date of birth</label><input type="date" name="udateOfBirth" id="dateOfBirth" value="<?php echo $result[0]['dateOfBirth']; ?>"></p>
                    <p><label for="nChildren">Number of children</label><input type="text" name="unChildren" id="nChildren" value="<?php echo $result[0]['nChildren']; ?>"></p>
                    <p><label for="nCars">Number of cars</label><input type="text" name="unCars" id="nCars" value="<?php echo $result[0]['nCars']; ?>"></p>
                    <p><label for="lEducation">Level of education</label><input type="text" name="ulEducation" id="lEducation" value="<?php echo $result[0]['lEducation']; ?>"></p>
                    <p><label for="country">Country</label><input type="text" name="ucountry" id="country" value="<?php echo $result[0]['country']; ?>"></p>
                    <input type="hidden" name="entry" value="<?php echo $result[0]['entry']; ?>">
                    <input class="btn btn-outline-* add" type="submit" name="Submit" value="update">
    
                </form>

                
                <?php
                  // Update Record in customer table
                    if(!empty($_POST)) {
                      $ufName = $_POST['ufName'];
                      $ulName = $_POST['ulName'];
                      $uemployeeID =$_POST['uemployeeID'];
                      $uposition =$_POST['uposition'];
                      $uemail =$_POST['uemail'];
                      $udateOfBirth =$_POST['udateOfBirth'];
                      $unChildren =$_POST['unChildren'];
                      $unCars =$_POST['unCars'];
                      $ulEducation =$_POST['ulEducation'];
                      $ucountry =$_POST['ucountry'];
                      $entry =$_POST['entry'];
                      $database->updateRecord($ufName, $ulName, $uemployeeID,$uposition, $uemail, $udateOfBirth, $unChildren, $unCars,  $ulEducation, $ucountry, $entry);
                    }
              
                ?>
            </div>
        </div>

       
    </div>  
</div>

</main>

<?php require ('./inc/footer.php'); ?>