<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<main>
  <?php
  $name = '';
  $age = '';
  $email = '';

  if (isset($_GET['submit'])) {
    $name = filter_input(INPUT_GET, 'name', FILTER_CALLBACK, array('options' => 'validateName'));
    $age = filter_input(INPUT_GET, 'age', FILTER_CALLBACK, array('options' => 'validateAge'));
    $email = filter_input(INPUT_GET, 'email', FILTER_VALIDATE_EMAIL);

    function validateName($nameParam = "")
    {
      $nameParam = trim($nameParam);
      return is_string($nameParam) && (strlen($nameParam) > 2) ? $nameParam : 'Your name is too short. Try another one.';
    }

    function validateAge($ageParam)
    {
      $ageParam = trim($ageParam);
      return is_numeric($ageParam) && ($ageParam >= 1 && $ageParam <= 140) ? $ageParam : "Weird. I don't think so.";
    }
  }
  ?>
    <form action="get">
        <label for="name">Enter your name:</label><br>
        <input type="text" name="name" placeholder="Name" value="<?= $name; ?>"/><br>
        <label for="age">Enter your age:</label><br>
        <input type="text" name="age" placeholder="Age" value="<?= $age; ?>"/><br>
        <label for="email">Enter your email:</label><br>
        <input type="text" name="email" placeholder="Email" value="<?= $email; ?>"/><br>
        <button type="submit">Submit</button>
    </form>
</main>
</body>
</html>
