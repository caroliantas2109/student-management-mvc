<!-- This is the login page for the student management application. It includes a form for users to enter their email and password to log in. The form submits a POST request to the do_login action in the AuthController, which handles the authentication logic. If there are any errors during login (such as missing fields or incorrect credentials), appropriate error messages will be displayed. After successful login, users are redirected to the students page. There is also a link to the registration page for users who do not have an account yet. -->


<?php require __DIR__ . "/../layouts/header.php"; ?>

<h2>Login</h2>

<form method="POST" action="index.php?action=do_login">
  <label>Email:</label><br>
  <input name="email" type="email"><br><br> <!-- Input field for the email, which is required for login and must be in a valid email format -->

  <label>Password:</label><br>
  <input name="password" type="password"><br><br> <!-- Input field for the password, which is required for login and will be hidden as the user types -->

  <button type="submit">Login</button> <!-- Submit button to log in, which will trigger the authentication process in the AuthController -->
</form>

<p><a href="index.php?action=register">No account?  Register</a></p> <!-- Link to the registration page for users who do not have an account yet -->

<?php require __DIR__ . "/../layouts/footer.php"; ?> 