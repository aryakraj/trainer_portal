<!DOCTYPE html>
<html lang="en-US">
<body>
//    ****
     // *
     // * @function:chart
     // * @function:Create Chart
     // * @author  Arya K Raj
     // * @link    http:'http://localhost/trainerport/'
     // * @date:06/03/2021
     //      ****

<h1>Chart View of Yuva Keralam</h1>

<div id="piechart"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

  <?php 
      if($n->num_rows()>0)
      {
          foreach($n->result() as $row)
          {
      ?>
// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ['Domain', <?php echo $row->domain;?>],
  ['IT',<?php echo $row->it;?> ],
  ['English', <?php echo $row->english;?>],
  ['Softskill', <?php echo $row->ss;?>],
  ['Ojt', <?php echo $row->ojt;?>]
]);

<?php 
}
}
?>
  // Optional; add a title and set the width and height of the chart
  var options = {'title':'My Average Day', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>

<a href="<?php echo base_url()?>main/masterdashboard">Back To Dashboard</a>
</body>
</html>
