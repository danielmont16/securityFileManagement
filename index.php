<?php
  require './inc/header.php';
?>

<!-- main section -->

<main>

    <div class="container">

    <div class="row mb-0 ">
        <h1>Login Portal</h1>

        <div class="welcome p-3">
            <p>Welcome to Our HR Portal!
            We're delighted to welcome you to our Human Resources portal a centralized hub designed to streamline your employee experience. 
            This portal is your gateway to a range of HR services and resources that will empower you throughout your journey with us.    
            </p>
            <p>If this is your first time here, get ready to unlock a world of convenience. To access the portal, all you need to do is sign up. 
                Click on the "Sign Up" button to create your account.</p>
            <p>For our returning users, simply enter your established username and password in the designated fields to access your personalized HR dashboard.</p>
        </div>
    </div>

        <div class="form-row row mt-0">

            <div class="col-sm-12 col-md-6 col-lg-6 user  p-3">

            <div class="p-5 shadow">
                <h2>User Registration</h2><br>
                    <form method="post" action="save-user.php">         
                        <p><label for="fName">First Name</label><input type="text" name="first_name" id="fName" placeholder="first Name"></p>
                        <p><label for="lName">Last Name</label><input type="text" name="last_name" id="lName" placeholder="Last name"></p>
                        <p><label for="fName">User name</label><input type="text" name="username" id="fName" placeholder="Enter user Name"></p>
                        <p><label for="password">Password</label><input type="text" name="password" id="password" placeholder="Enter password"></p>
                        <p><label for="cPassword">Confirm Password</label><input type="text" name="confirm" id="confirm" placeholder="Confirm password"></p>
                        <input class="btn btn-outline-* reset" type="submit" name="Submit" value="Sign up">
                    </form>
                   
            </div>
            </div>
      
            
            <div class="col-sm-12 col-md-6 admin p-3">

                    <div class="p-5 shadow"> 
                        <h2>User Log in</h2><br>
                        <form method="post" action="./inc/validate-user.php" >    
                            <p><label for="uName">User name</label><input type="text" name="username" id="user_name" placeholder="Enter user Name"></p>
                            <p><label for="password">Password</label><input type="text" name="password" id="password" placeholder="Enter password"></p>               
                            <input class="btn btn-outline-* reset" type="submit" name="Submit" value="Log in">
                        </form>
                      
                    </div>   
            </div>

        
        </div>
    </div>

    
</main>

    <!-- footer section -->
<?php require ('./inc/footer.php'); ?>
