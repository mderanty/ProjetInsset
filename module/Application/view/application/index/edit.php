<?php

$title = 'Edit User';
$this->headTitle($title);
?>
<h1><?php echo $this->escapeHtml($title); ?></h1>
<form method="post">
  fullname: <input type="text" name="fullname" value="<?php echo $user->getFullname(); ?>"><br>
  <input type="submit" value="Submit">
</form>