<!-- This is the header layout file for the student management application. It includes the basic HTML structure and displays any error or success messages stored in the session. The header is included at the top of each page, allowing for consistent styling and message display across the application. The messages are displayed in red for errors and green for successes, and they are cleared from the session after being displayed to prevent them from showing up on subsequent pages. -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Student App</title>
  <link rel="stylesheet" href="views/layouts/style.css">
</head>
<body>

<?php if (!empty($_SESSION['error'])): ?> <!-- Check if there is an error message stored in the session and display it if it exists--> 
  <p style="color:red;">
    <?= htmlspecialchars($_SESSION['error']) ?> <!-- Display the error message in red and escape it to prevent XSS attacks -->
  </p>
  <?php unset($_SESSION['error']); ?> <!-- Clear the error message from the session after displaying it to prevent it from showing up on subsequent pages -->
<?php endif; ?>

<?php if (!empty($_SESSION['success'])): ?> <!-- Check if there is a success message stored in the session and display it if it exists-->
  <p style="color:green;">
    <?= htmlspecialchars($_SESSION['success']) ?> <!-- Display the success message in green and escape it to prevent XSS attacks -->
  </p>
  <?php unset($_SESSION['success']); ?> <!-- Clear the success message from the session after displaying it to prevent it from showing up on subsequent pages -->
<?php endif; ?>

<hr>