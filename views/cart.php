<?php require_once './views/partials/header.php'; ?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Count</th>
      <th scope="col">Price</th>
      <th scope="col">Summ</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($products as $product) { ?>
    <tr id="product-<?php echo $product['id']; ?>">
        <td>
          <a href="/index.php?r=/product&id=<?php echo $product['id']; ?>">
              <?php echo $product['title']; ?></td>
          </a>
        <td>
          <div class="btn-group btn-sm" role="group" >
          <form method="POST" action="/index.php?r=/cart/substract">
            <input type="hidden" name="id" class="count" value="<?php echo $product['id']; ?>">
            <input type="submit" value="-" class="substract btn btn-danger btn-sm">
          </form>
          <span class="btn" id="product-count-<?php echo $product['id']; ?>" >
            <?php echo $lineItems[$product['id']]; ?>
          </span>
          <form method="POST" action="/index.php?r=/cart/add">
            <input type="hidden" name="id" class="count" value="<?php echo $product['id']; ?>">
            <input type="submit" value="+" class="add btn btn-success btn-sm">
          </form>
        </div>
           </td>

        <td id="price-<?php echo $product['id']; ?>">
          <?php echo $product['price']; ?>
        </td>
        <td class="total" id="total-<?php echo $product['id']; ?>">
          <?php echo $lineItems[$product['id']] * $product['price']; ?>
        </td>
      </tr>
    <?php }?>

  </tbody>
  <tfoot>
    <tr>
    <td id="global-total" colspan="4">
        Total:
        <?php
          $total = 0;
          foreach ($products as $product) {
            $total += $product['price'] * $lineItems[$product['id']];
          }

          echo $total;
        ?>
      </td>
    </tr>
  </tfoot>
</table>

<a href="/index.php?r=/order" class="btn btn-warning">Place order</a>

<?php require_once './views/partials/footer.php'; ?>
