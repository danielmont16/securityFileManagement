<?php
  require './inc/header.php';
?>

  <main>
    <section class="row signin-row justify-content-center  ">
    
      <div class="form-row row p-5 w-25 p-3">
          <div class="p-5 shadow">
              <h3>Please log In with username and Password!</h3>
              <p>Sign in below</p>
              <form method="post" action="./inc/validate-user.php">
                <p><input class="form-control" name="username" type="text" placeholder="Username" required /></p>
                <p><input class="form-control" name="password" type="password" placeholder="Password" required /></p>
                <input class="btn btn-primary" type="submit" value="Login" />
              </form>
            </div>
      </div>
    
  </section>

    
  </main>
<?php
  require './inc/footer.php';
?>
