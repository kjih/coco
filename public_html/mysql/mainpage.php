<?php

  session_start();

  include("connection.php");

  $query = "SELECT diary FROM users WHERE id = '" . $_SESSION['id'] . "' LIMIT 1";

  $result = mysqli_query($con, $query);
  $row = mysqli_fetch_array($result);

  $diary = $row['diary'];

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Secret Diary</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>

      .navbar-brand {
        font-size: 1.8em;
      }

      #topContainer {
        background-image: url("background.jpg");
        height: 400px;
        width: 100%;
        background-size: cover;
        background-position: center;
      }

      #topRow {
        margin-top: 60px;
        text-align: center;
      }

      #topRow h1 {
        font-size: 300%
      }

      .bold {
        font-weight: bold;
      }

      .marginTop {
        margin-top: 40px;
      }

      .marginBottom {
        margin-bottom: 20px;
      }

      .divMarginTop {
        margin-top: 180px;
      }

      .center {
        text-align: center;
      }

      .title {
        margin-top: 100px;
        font-size: 300%;
      }

      #footer {
        background-color: #B0D1FB;
        width: 100%;
      }

      .marginBottom {
        margin-bottom: 30px;
      }

      .siteImage {
        width: 250px;
      }

      textarea {
        margin-top: 10px;
      }

    </style>

  </head>
  <body data-spy="scroll" data-target=".navbar-collapse">
    <div class="navbar navbar-inverse navbar-fixed-top" id="navBar">
      <div class="container">
        <div class="navbar-header pull-left">
          <a href="" class="navbar-brand">Secret Diary</a>
        </div>

        <div class="pull-right">
          <ul class="nav navbar-nav">
            <li><a href="index.php?logout=1">Log out</a></li>
          </ul>
        </div>

    </div>
  </div>

  <div class="container contentContainer" id="topContainer">
    <div class="row marginBottom">
      <div class="col-md-6 col-md-offset-3" id="topRow">
        <textarea class="form-control"><?php echo $diary; ?></textarea>
      </div>
    </div>
  </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>

    <script>
      $(".contentContainer").css("min-height", $(window).height());
      $("textarea").css("height", $(window).height() - 100);

      $("textarea").keyup(function() {
        $.post("updatediary.php", {diary:$("textarea").val()});
      });
    </script>
  </body>
</html>
