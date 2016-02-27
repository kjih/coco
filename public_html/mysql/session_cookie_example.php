<?php

  //session_start();
  //$_SESSION['loginid'] = 1;
  //echo $_SESSION['loginid'];

  /* set cookie */
  /* id, value, expire */
  setcookie("id", "1234", time() + (60*60*24));

  echo $_COOKIE['id'];


  /* set cookie to expire */
  setcookie("id", "", time() - 3600);

?>
