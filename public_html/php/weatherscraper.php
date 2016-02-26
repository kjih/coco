<!doctype html>
<html>
<head>
  <title>Weather Scraper</title>

  <meta charset="utf-8" />
  <meta http-quiv="content-type" content="text/html"; charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <!-- Optional theme -->
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

  <style>

    html, body {
      height: 100%;
    }

    .container {
      background-image: url("background.jpg");
      width: 100%;
      height: 100%;
      background-size: cover;
      background-position: center;
      padding-top: 140px;
    }

    .input {
      width: 50px;
    }

    .center {
      text-align: center;
    }

    p {
      padding-top: 15px;
      padding-bottom: 15px;
    }

    button {
      margin-top: 15px;
    }

    .alert{
      margin-top: 20px;
      display: none;
    }

  </style>
</head>

<body>

  <div class="container">
    <div class="row">

      <div class="col-md-6 col-md-offset-3 center">

        <h1 class="center"><strong>Weather</strong></h1>
        <p class="lead center">Enter your city below to get a forecast for the weather.</p>

        <form method="post">

          <div class="form-group">

            <input type="text" id="city" name="city" class="form-control center" placeholder="Eg. Santa Barbara, San Franciso, Goleta..." />

          </div>

          <button id="go" name="go" class="btn btn-info btn-lg">Go!</button>

        </form>

        <div id="success" class="alert alert-success"></div>
        <div id="fail" class="alert alert-danger">Could not find city. Please try again.</div>
        <div id="nocity" class="alert alert-danger">Please enter a city.</div>

      </div>

    </div>
  </div>


<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<script>

  $(".container").css("padding-top", $(window).height() / 5);

</script>

<script>

  $("#go").click(function(event) {
    event.preventDefault();

    if ($("#city").val() != "") {
      $.get("scraper.php?city=" + $("#city").val(), function(data) {
        if (data == "") {
          $(".alert").hide();
          $("#fail").fadeIn();
        } else {
          $(".alert").hide();
          $("#success").html(data).fadeIn();
        }
      });
    } else {
      $(".alert").hide();
      $("#nocity").fadeIn();
    }
  });

</script>

</body>
</html>
