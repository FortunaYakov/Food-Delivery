<?php require_once './views/partials/header.php'; ?>

<div class="container-fluid">
  <div class="row">
    <div class="col-3">
      <?php require_once './views/partials/admin_menu.php'; ?>
    </div>
    <div class="col-8">
      <table class="table table-striped table-dark">
      <thead>
        <tr>
          <th scope="col">Product</th>
          <th scope="col">Actual price</th>
          <th scope="col">Old price</th>
          <th scope="col">Difference %</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($price as $cost) { ?>
          <tr>
            <td><?php echo $cost['product']; ?></td>
            <td><?php echo $cost['actual_price']; ?></td>
            <td><?php echo $cost['old_price']; ?></td>
            <td><?php echo ( 100 - ($cost['old_price'] / $cost['actual_price'] * 100)); ?>%</td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
    </div>
  </div>
</div>



<?php require_once './views/partials/footer.php'; ?>
