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
          <th scope="col">Сustomer</th>
          <th scope="col">Total price</th>
          <th scope="col">Order date</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($orders as $order) { ?>
          <tr>
            <td><?php echo $order['username']; ?></td>
            <td><?php echo $order['total']; ?></td>
            <td><?php echo $order['create_date']; ?></td>
          </tr>
        <?php }?>
      </tbody>
     </table>
    </div>
  </div>

</div>



<?php require_once './views/partials/footer.php'; ?>
