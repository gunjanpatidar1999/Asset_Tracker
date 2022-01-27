@extends('admin.master')

@section('content');


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0">Dashboard</h1>

          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

         <script type="text/javascript">
            google.charts.load('current', {
              'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

              var data = google.visualization.arrayToDataTable([
                ['Assets', 'No. of assests'],
                <?php echo $chartdata ?>
              ]);

              var options = {
                title: 'Asset types'
              };

              var chart = new google.visualization.PieChart(document.getElementById('piechart'));
              chart.draw(data, options);
            }
          </script>

          <script type="text/javascript">
            google.charts.load('current', {
              'packages': ['bar']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
              var data = google.visualization.arrayToDataTable([
                ['Asset', 'Status', {
                  role: 'style'
                }],
                ['Active', <?php echo $active; ?>, 'color: green'],
                ['Not Active', <?php echo $notactive; ?>, 'color:blue'],
              ]);

              var options = {
                chart: {
                  title: 'Assets Status',
                },
                bars: 'vertical' // Required for Material Bar Charts.
              };

              var chart = new google.charts.Bar(document.getElementById('barchart_material'));

              chart.draw(data, google.charts.Bar.convertOptions(options));
            }
          </script>

          <div class="container" id="piechart" style="height: 500px;"></div>
          <div class="container">

            <div class="container" id="barchart_material" style=" height:500px;" >
            </div>
          </div>
        </div><!-- /.col -->
         
    
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

</div>
<!-- /.content-wrapper -->



@endsection