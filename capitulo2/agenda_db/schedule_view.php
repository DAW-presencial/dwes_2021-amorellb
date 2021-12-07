<?php
include_once 'Database.php';
include_once 'Schedule.php';

$database = new Database();
$db = $database->getConnection();

$contacts = new Schedule($db);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Schedule</title>

    <style>
        body {
            font-family: monospace, 'Courier New', Courier;
            margin: auto;
            width: 60vw;
        }

        .schedule-container {
            text-align: center;
            background-color: azure;
            border-radius: 0.8rem;
            box-shadow: 0.1rem 0.1rem 0.3rem 0.2rem lightgrey;
            margin-top: 5rem;
        }

        input, button {
            padding: 0.7rem;
            background-color: floralwhite;
            margin: 0.5rem;
            border: 1px solid lightgray;
            border-radius: 1.5rem;
        }

        input:focus {
            outline: none;
        }

        button:hover {
            box-shadow: 0.1rem 0.1rem 0.3rem 0.2rem lightgrey;
        }

        .delete:hover {
            color: crimson;
            box-shadow: 0.1rem 0.1rem 0.3rem 0.2rem crimson;
        }

        ul {
            padding: 0;
            list-style-type: none;
        }

        li {
            width: 60%;
            margin: 0 10% 0 20%;
            display: flex;
            justify-content: space-around;
        }

        li p {
           margin: 0.3rem 0 0.3rem 0;
        }

        .name {
            font-weight: bold;
        }
    </style>
</head>
<body>
<main class="schedule-container">
    <h1>Schedule</h1>

    <form method="POST" enctype="multipart/form-data">
        <label for="name"> Write your name:
            <input type="text" name="name" value="" placeholder="Name"/>
        </label><br>
        <label for="lastname"> Write your name:
            <input type="text" name="lastname" value="" placeholder="Last name"/>
        </label><br>
        <label for="phone"> Write your phone:
            <input type="number" name="phone" value="" placeholder="Phone"/>
        </label><br>
        <button class="send" type="submit" name="submit">Send</button>
        <button class="delete" type="submit" name="delete">Delete</button>
    </form>

  <?php
//  Write data into the database
  if (isset($_POST['submit'])) {
    $new_name = filter_input(INPUT_POST, 'name');
    $new_lastname = filter_input(INPUT_POST, 'lastname');
    $new_phone = filter_input(INPUT_POST, 'phone');

    if (empty($new_name)) {
      echo '<p style="color: crimson">Write a name please</p>';
    } elseif (strlen((string)$new_phone) < 9 || strlen((string)$new_phone) > 9) {
      echo '<p style="color: crimson">Write a valid phone number (9 digits)</p>';
    } else {
      $contacts->username = $new_name;
      $contacts->lastname = $new_lastname;
      $contacts->phone = $new_phone;
      $contacts->writeContacts();
    }
  }

  if (isset($_POST['delete'])) {
    $new_name = filter_input(INPUT_POST, 'name');

    $contacts->deleteContact($new_name);
  }

//  Read data from the database
  $data = $contacts->readContacts();
  if (empty($data)) {
    echo '<h3>Empty schedule! No contacts found.</h3>';
    echo '<p>Add some contacts and try again.</p>';
  } else {
    echo '<h2>Contacts</h2>';
      echo '<ul>';
    foreach ($data as list($name, $lastname, $phone)) {
      $user_name = ucfirst($name);
      $user_lastname = ucfirst($lastname);
      echo "<li><p class='name'>$user_name $user_lastname:</p> <p class='phone'>$phone</p></li>";
    }
      echo '</ul>';
  }
  ?>
</main>
</body>
</html>
