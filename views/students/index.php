<!-- This file is responsible for displaying the list of students in the application. It includes a header layout, displays a welcome message with the username from the session, and provides links for adding a new student and logging out. The students are displayed in a table format, showing their student ID, name, email, and an action link to delete each student. If there are no students found, it displays a message indicating that. Finally, it includes a footer layout at the end of the file. -->
<?php require __DIR__ . "/../layouts/header.php"; ?>

<h2>Students</h2>

<p>
  Welcome, <?= htmlspecialchars($_SESSION['username'] ?? 'User') ?> |
  <a href="index.php?action=logout">Logout</a>
</p>

<p>
  <a href="index.php?action=student_create">+ Add Student</a>
</p>

<table border="1" cellpadding="6">
  <tr>
    <th>Student ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Action</th>
  </tr>

  <?php if (empty($students)): ?>
    <tr>
      <td colspan="4">No students found.</td>
    </tr>
  <?php endif; ?>

  <?php foreach ($students as $s): ?>
    <tr>
      <td><?= htmlspecialchars($s['student_id']) ?></td>
      <td><?= htmlspecialchars($s['name']) ?></td>
      <td><?= htmlspecialchars($s['email']) ?></td>
      <td>
        <a href="index.php?action=student_delete&id=<?= $s['id'] ?>"
           onclick="return confirm('Delete this student?')">
           Delete
        </a>
      </td>
    </tr>
  <?php endforeach; ?>

</table>

<?php require __DIR__ . "/../layouts/footer.php"; ?>
