<?php require_once './views/partials/header.php'; ?>

<div class="container">
  <div class="col-md">
    <form method="POST" action="/index.php?r=/login">
      <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" placeholder="Enter username" name="username">
        <small id="emailHelp" class="form-text text-muted">We'll never share your username with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password">
      </div>

      <button type="submit" class="btn btn-primary">Login!</button>
    </form>
  </div>
</div>

<?php require_once './views/partials/footer.php'; ?>
