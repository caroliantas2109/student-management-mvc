<!-- This is the registration page for the student management application. It includes a form for users to create a new account by providing a username, email, and password. The form submits a POST request to the do_register action in the AuthController, which handles the registration logic. If there are any errors during registration (such as missing fields or an already registered email), appropriate error messages will be displayed. After successful registration, users are redirected to the login page. -->


<?php require __DIR__ . "/../layouts/header.php"; ?>

<h2>Register</h2> <!-- Heading for the registration page -->

<form method="POST" action="index.php?action=do_register">
  <label>Username:</label><br>
  <input name="username" type="text"><br><br> <!-- Input field for the username, which is required for registration -->

  <label>Email:</label><br>
  <input name="email" type="email"><br><br> <!-- Input field for the email, which is required for registration and must be in a valid email format -->

  <label>Password:</label><br>
  <input name="password" type="password"><br><br> <!-- Input field for the password, which is required for registration and will be hidden as the user types -->

  <button type="submit">Create Account</button> <!-- Submit button to create the account, which will trigger the registration process in the AuthController -->
</form>

<p><a href="index.php?action=login">Already have an account? Login</a></p> <!-- Link to the login page for users who already have an account -->

<?php require __DIR__ . "/../layouts/footer.php"; ?>