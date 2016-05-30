<!DOCTYPE html>

<html>
<head>
<meta charset="UTF-8">
<title>todolist</title>
</head>
<body>
  <?php
    $dsn = 'mysql:dbname=todolist:host=localhost:charset=u'
    $user = 'root';
    $password = 'root';
    $dbh = new PDO($dsn, $user, password);
    $dbh->query('SET NAMES utf8');
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  ?>
<INPUT type="text" name="txt">
<button type="btn">add</button>
<HR>
</body>
</html>
