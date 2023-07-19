<?php
session_start();

// Include the database configuration file
require_once 'db_config.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Check if the email and password inputs are set
  if (isset($_POST['email']) && isset($_POST['password'])) {
    // Retrieve the email and password inputs from the form
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    // Sanitize the user inputs (for protection against SQL injection)
    $email = mysqli_real_escape_string($connection, $email);
    $password = mysqli_real_escape_string($connection, $password);

    // Query the database to check if the email and password match a user record
    $query = "SELECT * FROM login WHERE email='$email' AND password='$password'";
    $result = mysqli_query($connection, $query);

    // Check if the query was successful and if there is a matching user record
    if ($result && mysqli_num_rows($result) === 1) {
      // Set a session variable to indicate that the user is logged in
      $_SESSION['user_logged_in'] = true;

      // Redirect the user to the index.php page after successful login
      header('Location: index.php');
      exit;
    } else {
      // Handle invalid login credentials (e.g., show an error message)
      $loginError = "Invalid email or password. Please try again.";
    }
  } else {
    // Handle the case when one or both of the inputs are missing
    $loginError = "Please enter both email and password.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

  <title>Login</title>
</head>

<body>
  <div class="py-5">
    <div class="container">
      <h1 class="mb-5">Login</h1>
      <form action="login.php" method="post">
        <div>
          <label for="email">Email</label>
          <input type="email" name="email" id="email" required />
        </div>
        <div>
          <label for="password">Password</label>
          <input type="password" name="password" id="password" required />
        </div>
        <input type="submit" value="Submit">
      </form>
    </div>
  </div>

  <?php if (isset($loginError)) : ?>
    <div><?php echo $loginError; ?></div>
  <?php endif; ?>
</body>

</html>