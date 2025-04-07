<?php
session_start();
include "includes/db.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log in</title>
  
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Include Font Awesome -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  <!-- External Styling /assets -->
  <link rel="stylesheet" href="./assets/index-style.css">
  <!-- SweetAlert2 CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <!-- SweetAlert2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
  <!-- Background image -->
  <!-- <div class="bg-image"> -->
    
  <!-- </div> -->
  <!-- Card -->
  <div class="container">
    <div class="card p-4">
      <div class="card-body">
        <h2 class="fw-bold mb-5 text-center">Sign up now</h2>
        <form action="authentication/loginAuth.php" method="POST">
          <!-- Email input -->
         <div class="form-outline mb-4 position-relative">
          <label class="form-label" for="form3Example3">Email address</label>
          <div class="input-group flex-nowrap">
            <span class="input-group-text"> <i class="bi-envelope"></i></span>
            <input type="text" id="form3Example3" class="form-control shadow-sm"  placeholder="Enter email address" name="username"/>
          </div>
        </div>

          <!-- Password input -->
          <div class="form-outline mb-4 position-relative">
            <label class="form-label" for="form3Example4">Password</label>
            <div class="input-group flex-nowrap">
             <span class="input-group-text"><i class="bi-lock"></i></span>
              <input type="password" id="form3Example4" class="form-control shadow-sm" placeholder="Enter password" name="password"/>
            </div>
          </div>

          <!-- Submit button -->
          <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary btn-block mb-4" name="login">
              Sign up
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <!-- SweetAlert2 Script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Show SweetAlert if needed -->
<script>
  <?php echo $swal; ?>
</script>

</body>

<?php
if (isset($_GET['status'])) {
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "<script>";
    switch ($_GET['status']) {
        case 'missing':
            echo "Swal.fire({ icon: 'warning', title: 'Missing fields', text: 'Please fill in all fields.' });";
            break;
        case 'wrong_password':
            echo "Swal.fire({ icon: 'error', title: 'Incorrect password', text: 'Try again.' });";
            break;
        case 'no_user':
            echo "Swal.fire({ icon: 'error', title: 'User not found', text: 'Check your username.' });";
            break;
        case 'success':
            echo "Swal.fire({ icon: 'success', title: 'Login successful', showConfirmButton: false, timer: 1500 }).then(() => { window.location.href = 'index.php'; });";
            break;
    }
    echo "</script>";
}
?>
</html>