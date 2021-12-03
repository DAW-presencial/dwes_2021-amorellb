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

    <form method="POST" enctype="multipart/form-data">
        <label for="name"> Write your name:
            <input type="text" name="name" value="" placeholder="Name"/>
        </label><br>
        <label for="lastname"> Write your lastname:
            <input type="text" name="lastname" value="" placeholder="Lastname"/>
        </label><br>
        <label for="birth"> Write your birth date:
            <input type="date" name="birth" value="" placeholder="Birth date"/>
        </label><br>
        <label for="userfile1"> Upload file 1:
            <input type="file" name="userfile1">
        </label><br>
        <label for="userfile2"> Upload file 2:
            <input type="file" name="userfile2">
        </label><br>

        <button type="submit" name="submit">Send</button>
    </form>
    <h2>Uploaded info</h2>

    <?php
    var_dump($_FILES);

    if (isset($_POST['submit'])) {
    echo "Name: " . $_POST['name'] . "<br>";
    echo "Lastname: " . $_POST['lastname'] . "<br>";
    echo "Birth date: " . $_POST['birth'] . "<br>";
      store_uploaded_files($_FILES);
    }
    ?>
    </body>
    </html>

<?php
/**
 * Función para recoger los datos de la variable $_FILES, mover los archivos a la carpeta en la que se encuentra el
 * archivo .php y mostrar la información de los archivos (name y size).
 * @param $files array
 */
function store_uploaded_files(array $files)
{
  $upload_dir = __DIR__;
  foreach ($files as $user_file) {
    if (!$user_file["error"] == UPLOAD_ERR_OK) {
      $size = $user_file["size"];
      $name = basename($user_file["name"]);
      $tmp_name = $user_file["tmp_name"];
      echo 'File ' . $name . ' is successfully uploaded with a size of ' . $size . 'bytes<br>';
      move_uploaded_file($tmp_name, "$upload_dir/$name");
    }
  }
}
?>