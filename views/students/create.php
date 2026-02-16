<?php require __DIR__ . "/../layouts/header.php"; ?>

<h2>Add Student</h2>

<form method="POST" action="index.php?action=student_store">

  <label>Student ID:</label><br>
  <input type="text" name="student_id"><br><br>

  <label>Name:</label><br>
  <input type="text" name="name"><br><br>

  <label>Email:</label><br>
  <input type="email" name="email"><br><br>

  <button type="submit">Save Student</button>

</form>

<p>
  <a href="index.php?action=students">Back to Students</a>
</p>

<?php require __DIR__ . "/../layouts/footer.php"; ?>
