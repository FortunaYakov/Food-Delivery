<?php require_once './views/partials/header.php'; ?>

<div class="container">
  <div class="col-md">
    <form method="POST" action="/index.php?r=/order">
      <div class="form-group">
        <label>Address</label>
        <input type="text" class="form-control" placeholder="Enter your address" name="address">
      </div>

      <button type="submit" class="btn btn-primary">Post Your Order</button>
    </form>
  </div>
</div>

<?php require_once './views/partials/footer.php'; ?>
