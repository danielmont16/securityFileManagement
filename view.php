<?php include_once './inc/database.php';?>

<!-- body section -->
<body>

<!-- header section -->
<?php
	require './inc/header.php';
	//check for authentication before we show any data
	session_start();
	if (!isset($_SESSION['user_id'])) {
		header('location:signin.php');
		exit();
	}
 
?>

<!-- main section -->
    <div class="position-relative">
        <div class="position-absolute bottom-0 end-0">      
            <a href="logout.php"><button class="btn btn-warning m-5">Logout</button></a> 
        </div>
    </div>

<main>
<div class="container">
  
<div class="main-title"> <h1>Sales team personal information table</h1></div>

	<div class="row">
		<table class="table">
      <?php 
       $employeeID = $_POST['employeeID'];         
       $query = "SELECT * FROM tbl_eprofile WHERE employeeID = '$employeeID'";       
       $result = $database->getData($query);

       if($result==false){
        echo "<p> No data available with the Employee ID, please create a profile</p>";
       }else{
        $_SESSION['employeeID']=$result[0]['employeeID'];
       }
       
     
      ?>


      <!-- creating table headings -->
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Employee ID</th>
        <th>Position</th>
        <th>Personal email</th>
        <th>Date of Birth</th>
        <th>Number of Children</th>
        <th>Number of Cars</th>
        <th>Level of Education</th>
        <th>Country</th>
        <th>Name</th>
        <th>Profile Picture</th>
        
        
      </tr>

      
      <!-- iterating into the array result and printing the table in html -->
      <?php

        foreach($result as $key => $res){
          echo "<tr>";
          echo "<td>".$res['fName']."</td>";
          echo "<td>".$res['lName']."</td>";
          echo "<td>".$res['employeeID']."</td>";
          echo "<td>".$res['position']."</td>";
          echo "<td>".$res['email']."</td>";
          echo "<td>".$res['dateOfBirth']."</td>";
          echo "<td>".$res['nChildren']."</td>";
          echo "<td>".$res['nCars']."</td>";
          echo "<td>".$res['lEducation']."</td>";
          echo "<td>".$res['country']."</td>";
          echo "<td>".$res['name']."</td>"; 
          echo '<td><img id = "profile" src="' . $res['image'] . '"></td>';                
          echo "</tr>";
        }
     
      ?>
		</table>

    <?php
          
            if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
              $deleteId = $_GET['deleteId'];              
              $database->deleteRecord($deleteId);
            }

        ?>
    
    <div class="container">
       
        <a href="edit.php"><button class="btn btn-dark w-20">Edit</button></a>            
       
       <a  href="view.php?deleteId=<?php echo $employeeID ?>" onclick="return confirm('Are you sure?');"> <button class="btn btn-danger w-20">Delete</button></a>
       
    </div>

	</div>


 
</div>


              
</main>

<!-- footer section -->
    
<footer>
  <?php require ('./inc/footer.php'); ?>      
</footer>

</body>
