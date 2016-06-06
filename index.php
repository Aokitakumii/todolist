<!DOCTYPE html>

<html>
<head>
<meta charset="UTF-8">
<link href="http://netdna.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.css" rel="stylesheet">
<title>todolist</title>
</head>
<body onLoad="document.form1.txt.focus()">

  <?php
    $dsn = 'mysql:dbname=todolist;host=localhost;charset=UTF8';
    $user = 'root';
    $dbh = new PDO($dsn, $user);
    $dbh->query('SET NAMES utf8');
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


  ?>
<form name="form1" action="index.php" method="GET">
<input type="text" name="txt">
<button type='submit' name = 'add' value='add'>add</button>
</form>
<?php
if(isset($_GET['add'])){
  if ($_GET['txt'] != "") {
    try {
      $stmt = $dbh -> prepare('INSERT INTO todo (title) VALUES (:title)');
      $stmt->bindValue(':title', $_GET['txt']);
      $stmt->execute();
    } catch (Exception $e) {

    }
  }
}
elseif (isset($_GET['delete'])) {
  try {
    $stmt = $dbh -> prepare('DELETE FROM todo WHERE id = :id');
    $stmt->bindValue(':id',$_GET['delete']);
    $stmt->execute();
  } catch (Exception $e) {

  }
}
 ?>
 <?php

 try {
   $stmt = $dbh -> prepare('SELECT * FROM todo');
   $stmt->execute();
 } catch (Exception $e) {

 }
  ?>
  <table>
    <?php
   while($cnt = $stmt->fetch()){?>
    <tr>
      <td><?php print("・".$cnt['title']);?></td>
      <td><form action="index.php" method="GET">
      <button type='submit' name = 'delete' value= <?php print($cnt['id']); ?> ><i class="fa fa-trash" aria-hidden="true"></i></button>

      </form></td>
    </tr>
    <?php
    }
    ?>
  </table>

<HR>
</body>
</html>
