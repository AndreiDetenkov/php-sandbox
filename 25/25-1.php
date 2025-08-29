<?php

if ($_SERVER["REQUEST_METHOD"] === "POST" && $_POST['movies']) {
  $movies = [];
  $lines = explode("\n", $_POST['movies']);

  foreach ($lines as $line) {
    if ($line) {
      $parts = explode('"', $line);
      print_r($parts);
      print_r("\n");
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .form {
      display: grid;
      gap: 1rem;
      max-width: 600px;
    }
  </style>
</head>

<body>
  <form action="25-1.php" method="post" class="form">
    <textarea name="movies" rows="4" cols="50"></textarea>
    <button type="submit">Submit</button>
  </form>

  <pre><?= print_r($lines); ?></pre>

  <?php if (!empty($movies)) { ?>
    <h1>Movies</h1>
    <table border="1">
      <thead>
        <tr>
          <th>Date</th>
          <th>Title</th>
          <th>Genre</th>
        </tr>
      </thead>
      <tbody>

      </tbody>
    </table>
  <?php } ?>
</body>

</html>