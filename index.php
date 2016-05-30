<!DOCTYPE html>

<html>
<head>
<meta charset="UTF-8">
<title>todolist</title>
</head>
<body>
  <?php
    $dsn = 'mysql:dbname=todolist;host=localhost;charset=UTF8';
    $user = 'root';
    $dbh = new PDO($dsn, $user);
    $dbh->query('SET NAMES utf8');
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  ?>
<INPUT type="text" name="txt">
<button type="btn">add</button>
<HR>
</body>
</html>
