<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://res.cloudinary.com/fortunatest/image/upload/v1518559898/HillelFoodDelivery.png">

    <title>Hillel Food Delivery</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="/static/album.css" rel="stylesheet">
      </head>
  <body>

    <div class="collapse bg-inverse" id="navbarHeader">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 py-4">
            <h4 class="text-white">About</h4>
          </div>
            </div>
      </div>
    </div>
    <div class="navbar navbar-inverse bg-inverse">
      <div class="container d-flex justify-content-between">
        <a href="/index.php?r=/" class="btn btn-success btn-lg">Food Delivery</a>
              <form method="POST" action="/index.php?r=/search">
          <div class="input-group md-3">
            <input type="text" class="form-control" placeholder="Enter product name" name="product">
            <div class="input-group-append">
              <input type="submit" class="btn btn-outline-primary" value="Search">
            </div>
          </div>
        </form>
        <?php if ($this->userSessionModel->isLoggedIn()) { ?>
          <form method="POST" action="/index.php?r=/logout">
            <input type="submit" class="btn btn-danger" value="Logout">
          </form>
          <?php if($this->userModel->checkAccessLevel($this->userSessionModel->getUserId())['access_lvl'] >= 5) { ?>
            <a class="btn btn-info" href="/index.php?r=/admin">Admin</a>
          <?php  } ?>
          <a class="btn btn-success" href="/index.php?r=/cart">Cart</a>
        <?php } else { ?>
          <a class="btn btn-primary" href="/index.php?r=/register">Register</a>
          <a class="btn btn-success" href="/index.php?r=/login">Login</a>
        <?php } ?>
      </div>
    </div>
