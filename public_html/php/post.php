<!doctype html>
<html>
<head>
  <title>Webpage</title>

  <meta charset="utf-8" />
  <meta http-quiv="content-type" content="text/html"; charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>

<body>

  <?php

    $names = array("Kevin", "Joanna", "Coco");

    if ($_POST["submit"]) {
      if ($_POST["name"]) {
        foreach ($names as $name) {
          if ($_POST["name"] == $name) {
            echo "Hello, " . $name;

            $knowYou = 1;
          }
        }

        if (!$knowYou) {
          echo "Who are you?";
        }
      } else {
        echo "Please enter your name";
      }
    }

  ?>

  <div>
    <form method="post">
      <label for="name">Name</label>
      <input name="name" type="text" />
      <input type="submit" name="submit" value="Submit Your Name"/>

    </form>
  </div>

</body>
</html>
