<!doctype html>
<html>
<head>
  <title>Webpage</title>

  <meta charset="utf-8" />
  <meta http-quiv="content-type" content="text/html"; charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>

<body>

  <div>
    <?php

      $emailTo = "kjih1994@gmail.com";
      $subject = "Hello";
      $body    = "Cool";
      $headers = "From: kevinjih94@gmail.com";

      if (mail($emailTo, $subject, $body, $headers)) {
        echo "Mail sent successfully.";
      } else {
        echo "Mail not sent.";
      }

     ?>
  </div>

</body>
</html>
