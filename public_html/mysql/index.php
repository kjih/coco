<?php

  session_start();

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
      echo "There were error(s) in your signup details:" . $error;
    } else {
      /* Connect to DB */
      $link = mysqli_connect("localhost", "cl48-example-4b8", "sDj^T!brd", "cl48-example-4b8");
      /* Check for existing email */
      $query = "SELECT * FROM users WHERE email = '" . mysqli_real_escape_string($link, $_POST['email']) . "'";
      $result = mysqli_query($link, $query);
      $results = mysqli_num_rows($result);
      /* If exist error, else insert new user into table */
      if ($results) {
        echo "Email is already registered. Do you want to Log in?";
      } else {
        $query = "INSERT INTO `users` (`email`, `password`) VALUES ('" . mysqli_real_escape_string($link, $_POST['email']) . "', '" . md5(md5($_POST['email']).$_POST['password']) . "')";
        mysqli_query($link, $query);
        /* Set session id */
        $_SESSION['id'] = mysqli_insert_id($link);
        echo "Registration success";
        /* Redirect to logged in page */
      }
    }
  }

  if ($_POST['loginsubmit']) {
    /* Connect to DB */
    $link = mysqli_connect("localhost", "cl48-example-4b8", "sDj^T!brd", "cl48-example-4b8");
    /* Check for existing user */
    $query = "SELECT * FROM users WHERE email = '" . mysqli_real_escape_string($link, $_POST['loginemail']) . "' LIMIT 1";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    /* If user exists validate password, else error user does not exist */
    if ($row) {
      /* If password validate redirect to logged in page, else error incorrect password */
      if (md5(md5($_POST['loginemail']).$_POST['loginpassword'])  == $row['password']) {
        echo "Login Success!";
        /* Redirect to logged in page */
      } else {
        echo "Incorrect Password";
      }
    } else {
      /* User does not exist */
      echo "User does not exist";
    }
  }

?>

<form method="post">

  <input type="email" name="email" id="email" value="<?php echo addslashes($_POST['email']); ?>" />

  <input type="password" name="password" />

  <input type="submit" name="submit" value="Sign up" />

</form>

<form method="post">

  <input type="email" name="loginemail" id="loginemail" value="<?php echo addslashes($_POST['loginemail']); ?>" />

  <input type="password" name="loginpassword" />

  <input type="submit" name="loginsubmit" value="Log in" />

</form>
