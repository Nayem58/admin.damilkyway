<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Include the database configuration file
  require_once 'db_config.php';

  // Check if the form fields are set
  if (isset($_POST['meta_title'], $_POST['meta_desc'], $_POST['page_content'])) {
    // Retrieve the form data
    $metaTitle = $_POST['meta_title'];
    $metaDesc = $_POST['meta_desc'];
    $pageContent = $_POST['page_content'];

    // Sanitize the user inputs (for protection against SQL injection)
    $metaTitle = mysqli_real_escape_string($connection, $metaTitle);
    $metaDesc = mysqli_real_escape_string($connection, $metaDesc);
    $pageContent = mysqli_real_escape_string($connection, $pageContent);

    // Query to insert the form data into the 'page' table
    $query = "INSERT INTO page_content (meta_title, meta_desc, page_content) VALUES ('$metaTitle', '$metaDesc', '$pageContent')";

    // Execute the query
    if (mysqli_query($connection, $query)) {
      // Redirect to the index.php page after successful data insertion
      header('Location: index.php');
      exit;
    } else {
      // Handle the case when the query fails (you can show an error message or log the error)
      echo "Error: " . mysqli_error($connection);
    }

    // Close the database connection
    mysqli_close($connection);
  } else {
    // Handle the case when one or more form fields are missing
    echo "Error: One or more form fields are missing.";
  }
}
