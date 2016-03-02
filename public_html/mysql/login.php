<?php

  session_start();

  /* if logout */
  if ($_GET["logout"] == 1 AND $_SESSION['id']) {
    session_destroy();

    $message = "You have been logged out. Have a nice day!";
  }

  /* POST form submit */
  if ($_POST['submit']) {
    /* Check for valid email */
    if (!$_POST['email']) {
      $error .="<br />Please enter your email";
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $error .= "<br />Please enter a valid email address";
    }
    /* Check for valid password */
    if (!$_POST['password']) {
      $error .= "<br />Please enter your password";
    } else {
        if (strlen($_POST['password']) < 8)
          $error .= "<br />Please enter a password with at least 8 characters";
        if (!preg_match('`[A-Z]`', $_POST['password']))
          $error .= "<br />Passwords require at least one capital letter";
    }
    /* If no errors add to table, else print errors */
    if ($error) {
      $error = "There were error(s) in your signup details:" . $error;
    } else {
      /* Connect to DB */
      include("connection.php");
      //$con = mysqli_connect("localhost", "cl48-example-4b8", "sDj^T!brd", "cl48-example-4b8");
      /* Check for existing email */
      $query = "SELECT * FROM users WHERE email = '" . mysqli_real_escape_string($con, $_POST['email']) . "'";
      $result = mysqli_query($con, $query);
      $results = mysqli_num_rows($result);
      /* If exists error, else insert new user into table */
      if ($results) {
        $error = "Email is already registered. Do you want to Log in?";
      } else {
        $query = "INSERT INTO `users` (`email`, `password`) VALUES ('" . mysqli_real_escape_string($con, $_POST['email']) . "', '" . md5(md5($_POST['email']).$_POST['password']) . "')";
        mysqli_query($con, $query);
        /* Set session id */
        $_SESSION['id'] = mysqli_insert_id($con);
        /* Redirect to logged in page */
        header("Location:mainpage.php");
      }
    }
  }

  if ($_POST['loginsubmit']) {
    /* Connect to DB */
    include("connection.php");
    //$con = mysqli_connect("localhost", "cl48-example-4b8", "sDj^T!brd", "cl48-example-4b8");
    /* Check for existing user */
    $query = "SELECT * FROM users WHERE email = '" . mysqli_real_escape_string($con, $_POST['loginemail']) . "' AND password = '" .md5(md5($_POST['loginemail']).$_POST['loginpassword']) . "' LIMIT 1";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    /* If user and password combination exists redirect, else login error */
    if ($row) {
      $_SESSION['id'] = $row['id'];
      $error = "Login Success!";
      print_r($row);
      /* Redirect to logged in page */
      header("Location:mainpage.php");
    } else {
      /* Invalid email or password */
      /* Note: Specifying which is incorrect can help adversaries */
      $error = "Invalid email or password.";
    }
  }

?>
