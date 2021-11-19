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
<h1>Upload files to </h1>
<h2>Supported file extensions: jpeg, png, txt and pdf.</h2>
<form method="POST" enctype="multipart/form-data">
    <input type="file" name="userfile1"><br>
    <input type="file" name="userfile2"><br>
    <input type="file" name="userfile3"><br>
    <input type="file" name="userfile4"><br>
    <button type="submit" name="submit">Send</button>
    <button type="submit" name="delete">Delete</button>
</form>
</body>
</html>

<?php
//var_dump($_FILES);

if (isset($_POST['submit'])) {
  echo 'File sent <br>';

  store_files($_FILES);
}

?>

<?php
function store_files($files)
{
//  $upload_dir = '/Users/andawa/IJPHPProjects/dwes_2021-amorellb/capitulo2/send_files';
  $upload_dir = __DIR__;
  foreach ($files as $userfile) {
    if (!$userfile["error"] == UPLOAD_ERR_OK) {
      check_upload($userfile);
    } else if (check_file_format($userfile)) {
      $tmp_name = $userfile["tmp_name"];
      $name = basename($userfile["name"]);
      move_uploaded_file($tmp_name, "$upload_dir/$name");
      echo 'File ' . $name . ' is successfully uploaded<br>';
    }
  }
}

function check_upload($file)
{
  echo match ($file["error"]) {
    UPLOAD_ERR_INI_SIZE, UPLOAD_ERR_FORM_SIZE => 'Exceeded file size limit. File name: ' . $file["name"] . '<br>',
    UPLOAD_ERR_PARTIAL => 'The file was partially upload. File name: ' . $file["name"] . '<br>',
    UPLOAD_ERR_NO_FILE => 'No file sent.<br>',
    UPLOAD_ERR_NO_TMP_DIR => 'No temporal directory. File name: ' . $file["name"] . '<br>',
    UPLOAD_ERR_CANT_WRITE => 'Can not write the file into the disc. File name: ' . $file["name"] . '<br>',
    UPLOAD_ERR_EXTENSION => 'Wrong file extension. File name: ' . $file["name"] . '<br>',
    default => 'Unable to upload the file. File name:' . $file["name"] . '<br>',
  };
}

// TODO: Not working.
function check_file_format($file): bool
{
  $flag = true;
  $finfo = new finfo(FILEINFO_MIME_TYPE);
  $ext = array_search(
    $finfo->file($file['tmp_name']),
    array(
      'jpg' => 'image/jpeg',
      'png' => 'image/png',
      'txt' => 'text/plain',
      'pdf' => 'application/pdf'
    ),
    true
  );
  if ($ext === false) {
    $flag = false;
    echo 'Invalid file format. File: ' . $file["name"];
  }
  return $flag;
}

// Not used
//function store_one_file()
//{
//  if ($_FILES["userfile"]["error"] == UPLOAD_ERR_OK) {
//    $upload_dir = '/Users/andawa/IJPHPProjects/dwes_2021-amorellb/capitulo2/send_files';
//    $tmp_name = $_FILES["userfile"]["tmp_name"];
//    $name = basename($_FILES["userfile"]["name"]);
//    move_uploaded_file($tmp_name, "$upload_dir/$name");
//  }
//}

?>
