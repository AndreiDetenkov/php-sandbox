<?php

$movies = [];

if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['movies'])) {
  $lines = explode("\n", $_POST['movies']);

  foreach ($lines as $line) {
    $line = trim($line);
    if ($line) {

      $firstQuote = strpos($line, '“');
      $lastQuote = strpos($line, '”', $firstQuote);

      if ($firstQuote !== false && $lastQuote !== false) {
        $date = trim(substr($line, 0, $firstQuote));
        $title = trim(substr($line, $firstQuote, $lastQuote - $firstQuote + 3));
        $genres = trim(substr($line, $lastQuote + 3));

        $movies[] = [
          'date' => $date,
          'title' => $title,
          'genres' => explode(',', $genres)
        ];
      }
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
    form {
      display: grid;
      gap: 1rem;
      max-width: 600px;
    }
    button {
      width: 100px;
    }
    table {
      border-collapse: collapse;
    }
    th, td {
      border: 1px solid rgb(160 160 160);
      padding: 8px 10px;
    }
  </style>
</head>
<body>
  <form action="25-1.php" method="post">
    <label>
      <textarea name="movies" rows="10" cols="80" placeholder="Вставьте данные о фильмах...">
        27 февраля “Пианистка”            драма
        28 февраля “Globe: Доктор Фауст”  фильм-спектакль, драма
        02 марта   “Зверопой”             мультфильм, драма, комедия, семейный, музыка
        02 марта   “Логан”                фантастика, боевик, драма
        06 марта   “Вчера”                сегодня, завтра, мелодрама, комедия
        13 марта   “На игле”              драма
        16 марта   “Красавица и чудовище” мюзикл, фэнтези, мелодрама, семейный
      </textarea>
    </label>
    <button type="submit">Submit</button>
  </form>

  <?php if (!empty($movies)) { ?>
    <br>
    <h1>Movies</h1>
    <table>
      <thead>
        <tr>
          <th>Date</th>
          <th>Title</th>
          <th>Genre</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($movies as $movie): ?>
          <tr>
            <td><?= htmlspecialchars($movie['date']); ?></td>
            <td><?= htmlspecialchars($movie['title']); ?></td>
            <td>
              <table>
                <?php foreach ($movie['genres'] as $genre): ?>
                  <tr>
                    <td><?= htmlspecialchars($genre); ?></td>
                  </tr>
                <?php endforeach;?>
              </table>
            </td>
          </tr>
       <?php endforeach; ?>
      </tbody>
    </table>
  <?php } ?>
</body>
</html>