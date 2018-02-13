<?php require_once './views/partials/header.php'; ?>

<script>
  window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer", {
      animationEnabled: true,
      exportEnabled: true,
      theme: "light1", // "light1", "light2", "dark1", "dark2"
      title:{
        text: "Simple Column Chart with Index Labels"
      },
      data: [{
      type: "column", //change type to bar, line, area, pie, etc
      //indexLabel: "{y}", //Shows y value on all Data Points
      indexLabelFontColor: "#5A5757",
      indexLabelPlacement: "outside",
      dataPoints: <?php echo json_encode($graphicData, JSON_NUMERIC_CHECK); ?>
      }]
    });
    chart.render();
  }
</script>

<div class="container-fluid">
  <div class="row">
    <div class="col-3">
      <?php require_once './views/partials/admin_menu.php'; ?>
    </div>
    <div class="col-8">
      <div id="chartContainer" style="height: 370px; width: 100%;"></div>
      <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    </div>
  </div>
</div>

<?php require_once './views/partials/footer.php'; ?>
