<?php require_once './views/partials/header.php'; ?>

<section class="jumbotron text-center">
  <div class="progress" style="height: 40px;">
    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="10" aria-valuemin="20" aria-valuemax="50">
    <h1 >Hille Food Delivery</h1>
  </div>
    </div>
</section>

<div class="album text-muted">
  <div class="container">

    <div class="row">
      <?php foreach ($products as $product) { ?>
        <?php require './views/partials/product_card.php'; ?>
      <?php } ?>
    </div>

  </div>
</div>

<?php require_once './views/partials/footer.php'; ?>
