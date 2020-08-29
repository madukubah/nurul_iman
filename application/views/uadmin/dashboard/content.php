<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-6 col-12">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $student_count?></h3>

                <p>Santri</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6 col-12">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>Rp <?= $total_accumulation?></h3>

                <p>Total Iuran</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6 col-12">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>Rp <?= $month_accumulation?></h3>

                <p>Iuran Bulan Ini</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
       
        <!-- /.row (main row) -->
        <div class="row">
          <div class="col-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  Iuran Santri tahun <?= $this->input->get("year") ? $this->input->get("year") : date('Y') ?>
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <form action="<?= base_url('uadmin/home') ?>" method="get">
                  <div class="col-12">
                    <div class="row">
                      <div class="form-group">
                        <input type="text" name="year" id="year" class="form-control" value="<?= $this->input->get("year") ? $this->input->get("year") : date('Y') ?>">
                      </div>
                      <div class="form-group ml-2">
                        <button type="submit" class="btn btn-primary">Filter</button>
                      </div>
                    </div>
                  </div>
                </form>
                <div id="line-chart" style="height: 300px;"></div>
              </div>
            </div>
          </div>
          
          <div class="col-md-4 col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Pembayaran Santri</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body">
                <form action="<?= base_url('uadmin/home') ?>" method="get">
                  <div class="col-12">
                    <div class="row">
                      <div class="form-group">
                        <select name="month" id="month" class="form-control">
                          <?php 
                          $month_id = $this->input->get("month") ? $this->input->get("month") : date('m');
                          $months = ["-- Bulan --", "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                          foreach ($months as $key => $month) { ?>
                            <option <?= $month_id == $key ? "selected" : "" ?> value="<?= $key ?>"><?= $month ?></option>                            
                          <?php }?>
                        </select>
                      </div>
                      <div class="form-group ml-2">
                        <button type="submit" class="btn btn-primary">Filter</button>
                      </div>
                    </div>
                  </div>
                </form>
                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Santri Pendaftar</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="chartStudentRegis" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Uang Pendaftaran</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="chartPaymentRegis" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>
    <!-- /.content -->
  </div>
  <script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/') ?>plugins/flot/jquery.flot.js"></script>
  <script src="<?= base_url('assets/') ?>plugins/chart.js/Chart.min.js"></script>
  <script>
    const saving_months = []
    <?php foreach ($saving_months as $key => $month) { ?>
      saving_months.push([ <?= $month->month ?>, <?= $month->nominal_month ?>]);
    <?php } ?>
    
    const line_data1 = {
      label: 'Bulan',
      data : saving_months,
      color: '#3c8dbc'
    }
    $.plot('#line-chart', [line_data1], {
      grid  : {
        hoverable  : true,
        borderColor: '#f3f3f3',
        borderWidth: 1,
        tickColor  : '#f3f3f3'
      },
      series: {
        lines     : {
          show: true
        },
        points    : {
          show: true
        }
      },
      lines : {
        fill : false,
        color: ['#3c8dbc']
      },
      yaxis : {
        axisLabel: "Rupiah",
        axisLabelUseCanvas: true,
        axisLabelFontSizePixels: 12,
        axisLabelFontFamily: 'Verdana, Arial',
        axisLabelPadding: 3,
      },
      xaxis : {
        show: true,
        tickLength: 0,
        axisLabel: "<?= $saving_months[0]->year ?>"
      }
    })
    //Initialize tooltip on hover
    $('<div class="tooltip-inner" id="line-chart-tooltip"></div>').css({
      position: 'absolute',
      display : 'none',
      opacity : 0.8
    }).appendTo('body')
    $('#line-chart').bind('plothover', function (event, pos, item) {

      if (item) {
        const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        var x = item.datapoint[0].toFixed(2),
            y = item.datapoint[1].toFixed(2)
        
        $('#line-chart-tooltip').html(item.series.label + ' ' + months[parseInt(x)-1] + ' = ' + y)
          .css({
            top : item.pageY + 5,
            left: item.pageX + 5
          })
          .fadeIn(200)
      } else {
        $('#line-chart-tooltip').hide()
      }

    })


    var donutData        = {
      labels: [
          'Belum Membayar', 
          'Membayar',
      ],
      datasets: [
        {
          data: [<?= $student_count - $student_payment ?>, <?= $student_payment ?>],
          backgroundColor : ['#f56954', '#00a65a'],
        }
      ]
    }
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = donutData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions      
    })
  </script>