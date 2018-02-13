<?php require_once './views/partials/header.php'; ?>

<div class="container-fluid">
  <div class="row">
    <div class="col-3">
      <?php require_once './views/partials/admin_menu.php'; ?>
    </div>
    <div class="container">
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title"><?php echo $ordersCountLastMonth; ?></h5>
          <p class="card-text">orders in last month.</p>
        </div>
      </div>
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title"><?php echo round($avgPrice, 2); ?></h5>
          <p class="card-text">average check cost in last month.</p>
        </div>
      </div>
    </div>
    <div class="col-8 offset-md-3">
     <table class="table table-striped table-dark">
      <thead>
        <tr>
          <th scope="col">Order date</th>
          <th scope="col">Product</th>
          <th scope="col">Quantity</th>
          <th scope="col">Cost</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($detailsOfSoldProduct as $details) { ?>
          <tr>
            <td><?php echo $details['date']; ?></td>
            <td><?php echo $details['product']; ?></td>
            <td><?php echo $details['quantity']; ?></td>
            <td><?php echo $details['cost']; ?></td>
          </tr>
        <?php }?>
      </tbody>
     </table>
    </div>
  </div>

</div>



<?php require_once './views/partials/footer.php'; ?>
