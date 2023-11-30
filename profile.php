<?php
	require './inc/header.php';
	//check for authentication before we show any data
	session_start();
	if (!isset($_SESSION['user_id'])) {
		header('location:signin.php');
		exit();
	}
?>

<!-- body section -->
<body>

<!-- main section -->
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
                
                <h3>Employee Profile Form</h3><br>

                    <form class="profile-form" method="post" action="add.php" enctype='multipart/form-data'> 
                                      
                        <p><label for="fName">First name</label><input type="text" name="fName" id="fName" placeholder="Enter employee First Name"></p>
                        <p><label for="lName">Last name</label><input type="text" name="lName" id="lName" placeholder="Enter employee Last Name"></p>
                        <p><Label for="employeeID">Employee ID</Label><input type="text"  name="employeeID" id="employeeID" placeholder="Enter the Employee ID"></p>
                        <p><label for="position">Employee position</label><input type="text" name="position" id = "position" placeholder="Enter employee position name"></p>
                        <p><label for="email">Employee email</label><input type="text" name="email" id="email" placeholder="Enter personal employee email"></p>
                        <p><label for="dateOfBirth">Date of birth</label><input type="date" name="dateOfBirth" id="dateOfBirth"></p>
                        <p><label for="nChildren">Number of children</label><input type="text" name="nChildren" id="nChildren" placeholder="Enter number of children"></p>
                        <p><label for="nCars">Number of cars</label><input type="text" name="nCars" id="nCars" placeholder="Enter number of cars"></p>
                        <p><label for="lEducation">Level of education</label><input type="text" name="lEducation" id="lEducation" placeholder="Enter level of education"></p>
                        <p><label for="country">Country</label><input type="text" name="country" id="country" placeholder="Enter country name"></p>

                        <p><label for="pImage">Profile picture</label><input type='file' name='files[]' id="pImage" multiple  /></p> 
                        <!-- the following are the form buttons -->
                        <input class="btn btn-outline-* add" type="submit" name="Submit" value="Add">
                        <input class="btn btn-outline-* reset" type="reset" value="Clear">
                    </form>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 admin p-5">
                <div class="p-5 shadow">
                <h3>Employee Profile View</h3><br>
                    <form method="post" action="view.php">                
                        <p><Label for="employeeID">Employee ID</Label><input type="text"  name="employeeID" id="employeeID" placeholder="Enter the Employee ID"></p>
                        <input class="btn btn-outline-* add" type="submit" name="Submit" value="View">
                        <input class="btn btn-outline-* reset" type="reset" value="Clear">
                    </form>
                </div>

                <?php
                                    
                        if (isset($_GET['msg2']) == "update") {
                            echo "<div class='alert alert-success alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert'>×</button>
                                Your Registration updated successfully
                                </div>";
                        }
                        if (isset($_GET['msg3']) == "delete") {
                        echo "<div class='alert alert-success alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert'>×</button>
                                Record deleted successfully
                                </div>";
                        }
                        ?>
            </div>
        </div>  
    </div>
    
    </main>

    <!-- footer section -->

<?php require ('./inc/footer.php'); ?>


</body>

</html>