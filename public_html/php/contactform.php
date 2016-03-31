<?php
  $errorCount = 0;

  if ($_POST["submit"]) {
      if (!$_POST['name']) {
        $error = 'Please enter your name';
        $errorCount++;
      }

      if (!$_POST['email']) {
        if ($errorCount) {
          $error .= '<br />';
        }

        $error .= 'Please enter your email address';
        $errorCount++;
      }

      /* - Type validated by bootstrap -
      if ($_POST['email'] != "" AND !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error .='<br />Please enter a valid email address';
      }
      */

      if (!$_POST['message']) {
        if ($errorCount) {
          $error .= '<br />';
        }

        $error .= 'Please enter a message';
        $errorCount++;
      }

      if ($error) {
        $result = '<div class="alert alert-danger"><strong>' . $error . '</strong></div>';
      } else {
        if (mail("kjih1994@gmail.com", "Message from website",
            "Name: " . $_POST['name'] . "\n\nEmail: " . $_POST['email'] . "\n\nMessage: " . $_POST['message'])) {
          $result = '<div class="alert alert-success"><strong>Thank you!</strong> I\'ll be in touch.</div>';
        } else {
          $result = '<div class="alert alert-danger">Sorry, there was an error sending your message. Please try again later.</strong> I\'ll be in touch.</div>';
        }
      }
  }

?>

<!doctype html>
<html>
<head>
  <title>Webpage</title>

  <meta charset="utf-8" />
  <meta http-quiv="content-type" content="text/html"; charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

  <style>

    .emailForm{
      border: 1px solid grey;
      border-radius: 10px;
      margin-top: 20px;
    }

    form {
      padding-bottom: 20px;
    }

  </style>
</head>

<body>

  <?php
    /*
    $emailTo = "kjih1994@gmail.com";
    $subject = "Hello";
    $body    = "Cool";
    $headers = "From: kevinjih94@gmail.com";

    if (mail($emailTo, $subject, $body, $headers)) {
      echo "Mail sent successfully.";
    } else {
      echo "Mail not sent.";
    }
    */
  ?>

  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3 emailForm">

        <h1>Email Form</h1>

        <?php echo $result ?>

        <p class="lead">Please get in touch - I'll get back to you as soon as I can</p>

        <form method="post">

          <div class="form-group">

            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo $_POST['name']; ?>" />

          </div>

          <div class="form-group">

            <label for="name">Email:</label>
            <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $_POST['email']; ?>" />

          </div>

          <div class="form-group">

            <label for="message">Message:</label>
            <textarea class="form-control" name="message"><?php echo $_POST['message']; ?></textarea>

          </div>

          <input type="submit" name="submit" class="btn btn-success btn-lg" value="Submit" />

        </form>

      </div>
    </div>
  </div>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</body>
</html>
