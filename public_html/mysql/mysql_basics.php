<?php

  $link = mysqli_connect("localhost", "cl48-example-4b8", "sDj^T!brd", "cl48-example-4b8");

  if (mysqli_connect_error()) {
    die("Error connecting to database.");
  }

  /* INSERT QUERY */
  //$query = "INSERT INTO `users` (`name`, `email`, `password`) VALUES ('Joanna', 'xjoannaxliux@gmail.com', 'ilovecoco')";

  /* UPDATE QUERY */
  //$query = "UPDATE `users` SET `email` = 'xjoannaxliux@gmail.com' WHERE `id` = 2 LIMIT 1";
  //$query = "UPDATE `users` SET `name` = 'Ian O\'Neil' WHERE id = 2 LIMIT 1";

  //mysqli_query($link, $query);
  $name = "Ian O'Neil";
  $query = "SELECT `name` FROM `users` WHERE name = '" . mysqli_real_escape_string($link, $name) . "'";

  /* SELECT QUERY */
  //$query = "SELECT * FROM users";

  if ($result = mysqli_query($link, $query)) {
    echo mysqli_num_rows($result);

    while ($row = mysqli_fetch_array($result)) {
      print_r($row);
    }
  } else {
    echo "Query failed.";
  }

?>
