<?php
// Initialize the session
session_start();
?>

<?php
// Get the info related to the session and cookies

// echo 'Cookie info: '. $_COOKIE['CookieParty'] .'<br>';
// echo 'Cookie session name: '. $_COOKIE[session_name()] .'<br>';
// echo 'Session id: '.session_id() .'<br>';
// echo 'Session name: '.session_name() .'<br>';
//var_dump($_COOKIE);
//var_dump($_SESSION);
?>

<?php
// Delete cookie and session
if (isset($_GET['delete'])) {
  if (isset ($_COOKIE[session_name()])) {
    setcookie(session_name(), "", time() - 3600, "/");
    unset($_COOKIE[session_name()]);
  }
  session_unset(); // o bien $_SESSION = array();
  session_destroy();
}
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
            border: 0;
            border-radius: 1.5rem;
        }

        button:hover {
            box-shadow: 0.1rem 0.1rem 0.3rem 0.2rem lightgrey;
        }

        ul {
            list-style-type: none;
        }
    </style>
</head>
<body>
<div class="schedule-container">
    <h1>Schedule</h1>

  <?php
  add_delete_contact($_SESSION);

  /**
   * A function which, given the $_SESSION array, checks if the form was submitted and put the name and phone sent
   * into two new variables, by filtering the $_GET variable.
   * Then, checks if the name variable is empty, to show a warning message if so. Also checks if the phone input is
   * empty, deleting the contact in this case or check the phone length, showing a proper message if it is larger or
   * shorter than 9 digits.
   * Finally, if the inputs are correct, both are added into the $_SESSION array.
   * @param array $session
   */
  function add_delete_contact(array &$session)
  {
    if (isset($_GET['submit'])) {
      $new_name = filter_input(INPUT_GET, 'name');
      $new_phone = filter_input(INPUT_GET, 'phone');

      if (empty($new_name)) {
        echo '<p style="color: crimson">Write a name please</p>';
      } else if (empty($new_phone)) {
        unset($session['schedule'][$new_name]);
      } elseif (strlen((string)$new_phone) < 9 || strlen((string)$new_phone) > 9) {
        echo '<p style="color: crimson">Write a valid phone number (9 digits)</p>';
      } else {
        $session['schedule'][$new_name] = $new_phone;
      }
    }
  }

  /**
   * A function which, given the $_SESSION array, prints an unordered list of existing contacts.
   * @param array $sessions
   */
  function render_schedule(array $sessions)
  {
    if (empty($sessions)) {
      echo '<h3>Empty schedule! No contacts found.</h3>';
      echo '<p>Add some contacts and try again.</p>';
    } else {
      echo '<h2>Contacts</h2>';
      echo '<ul>';
      foreach ($sessions['schedule'] as $name => $phone) {
        $final_name = ucfirst($name);
        echo "<li>$final_name: $phone</li>";
      }
      echo '</ul>';
    }
  }

  /**
   * A function that prints a form which asks the user to write a name and a phone number.
   */
  function render_form()
  {
    ?>
      <form method="get">
          <label for="name"> Write a name:
              <br><input type="text" name="name" value="" placeholder="Name"/>
          </label><br>
          <label for="phone"> Write a phone:
              <br><input type="text" name="phone" value="" placeholder="Phone"/>
          </label><br>
          <button type="submit" name="submit">Send</button>
          <button type="submit" name="delete">Delete</button>
      </form>
    <?php
  }

  render_form();
  render_schedule($_SESSION);
  ?>
</div>

</body>
</html>
