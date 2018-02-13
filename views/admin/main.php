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
        <?php for($i = 0; $i < count($orders); $i++) { ?>
          <?php if($i > 4) { break; } ?>
          <tr>
            <td><?php echo $orders[$i]['username']; ?></td>
            <td><?php echo $orders[$i]['total']; ?></td>
            <td><?php echo $orders[$i]['create_date']; ?></td>
          </tr>
        <?php }?>
      </tbody>
    </table>
    </div>
  </div>
</div>



<?php require_once './views/partials/footer.php'; ?>
