<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
  // Redirect to the login page if the user is not logged in
  header('Location: login.php');
  exit;
}

$metaTitle = "Da Milky Way";
$metaDesc = "It's a content management system called Da Milky Way";
$robotsInstruction = "noindex, nofollow";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="<?= $metaDesc; ?>" />
  <meta name="robots" content="<?= $robotsInstruction; ?>" />
  <title><?= $metaTitle; ?></title>
  <link rel="shortcut icon" href="./assets/favicon.ico" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <section class="py-5 text-center">
    <div class="container">
      <h1 class="mb-5">Successful</h1>
      <form action="success.php" method="post" class="mb-5">
        <div>
          <label for="meta_title">Meta Title</label>
          <input type="text" name="meta_title" id="meta_title" required />
        </div>
        <div>
          <label for="meta_desc">Meta Desc</label>
          <input type="text" name="meta_desc" id="meta_desc" required />
        </div>
        <div>
          <label for="page_content">Page Content</label>
          <textarea name="page_content" id="page_content" cols="100" rows="20" required></textarea>
        </div>
        <input type="submit" value="Submit">
      </form>
      <div><a class="btn btn-primary" href="logout.php">Logout</a></div>
    </div>
  </section>



  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>