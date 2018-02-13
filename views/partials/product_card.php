<div class="card">
  <img data-src="holder.js/100px280/thumb" alt="100%x280" style="height: 280px; width: 100%; display: block;"
  src="<?php echo $product['image']; ?>" data-holder-rendered="true">
  <p class="card-text"><h3><?php echo $product['title']; ?></h3></p>
  <form method="POST" action="/index.php?r=/cart/add">
    <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
    <input type="submit" class="btn btn-primary" value="Add to cart">
  </form>
</div>
