<?php
  require './inc/header.php';
?>
    <main>
    <?php
      // including classes validate and database
      include_once ('./inc/validate.php');
      include_once ('./inc/database.php');
      
      // creating valid object
      $valid = new validate();

      //cheacking if the submit button has been clicked
      
      if(!empty($_POST['Submit'])){
        // if yes, retrieve data from various form fields
        $fName = $_POST['fName'];
        $lName = $_POST['lName'];
        $employeeID = $_POST['employeeID'];
        $position = $_POST['position'];
        $email = $_POST['email'];
        $dateOfBirth = $_POST['dateOfBirth'];
        $nChildren = $_POST['nChildren'];
        $nCars=$_POST['nCars'];
        $lEducation =$_POST['lEducation'];
        $country = $_POST['country'];
        
        //performing some validation
        //validating if there is an empty field
        $msg = $valid->checkEmpty($_POST, array('fName', 'lName', 'employeeID','position','email','dateOfBirth','lEducation','country'));
        //validating if there is a field with not numeric values
        $msg1 = $valid->checkNumeric($_POST,array('employeeID', 'nChildren', 'nCars'));
        
        $msg2 =$valid->checkString($_POST,array('fName', 'lName', 'position','lEducation','country'));

        //validating if the email has a proper structure
        $checkEmail = $valid->checkEmail($_POST['email']);

        //upload image

        $filename = $_FILES['files']['name'][0];
        // Location
        $target_file = './uploads/'.$filename;

        if(move_uploaded_file($_FILES['files']['tmp_name'][0], $target_file)){
          $uploadSuccess = true; 
        } 
        
        //if there is an empty field is going to appear a message in the webpage
        if($msg != null){
          echo $msg;
          //link to the previous page
          echo "<a href='javascript:self.history.back();'>Go Back</a>";

        //if some of the data is not numeric is going to appear a message in the webpage
        }elseif($msg1 != null){
          echo $msg1;
          echo "<a href='javascript:self.history.back();'>Go Back</a>";        
        }

        //if some of the data is not string is going to appear a message in the webpage
        elseif($msg2 != null){
          echo $msg2;
          echo "<a href='javascript:self.history.back();'>Go Back</a>";        
        }
        //if the email structure was not set well is going to appear a message in the webpage
        elseif(!$checkEmail){
          echo "<p >Please provide a valid email.</p>";
          echo "<a href='javascript:self.history.back();'>Go Back</a>";
        }else{
        //   if all the fields are valid
        //   using the object database, method execute, is posible to write the sql query to insert the information in the database
          $result = $database->execute("INSERT INTO tbl_eprofile(fName,lName,employeeID, position, email, dateOfBirth, nChildren, nCars, lEducation, country, name, image)
          VALUES('$fName','$lName','$employeeID', '$position','$email','$dateOfBirth','$nChildren','$nCars','$lEducation','$country','$filename', '$target_file')");
          // let the user know that the record has been added
          if($result){
            echo "<p>Data has been added correctly.</p>";
            echo "<a href='profile.php'>For View Result use your Employee ID</a>";
          }
               
        }
     }

     
    ?>
    <?php
  require './inc/footer.php';
?>
    </main>

