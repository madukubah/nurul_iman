<?php
    for( $i = count( $data_sets[0]->values ) -1 ; $i >=1 ; $i-- )
    {
        if( $data_sets[0]->values[$i] == $data_sets[0]->values[$i - 1] )
            unset( $data_sets[0]->values[$i] );
        else 
        {
            unset( $data_sets[0]->values[$i] );
            break;
        }
    }
    // unset( $data_sets[0]->values[ count( $data_sets[0]->values ) -1 ] );

?>
<div class="card p-2" style="background-color : rgba(255, 255, 255, 0.6) !important">
    <h5 class="justify-content-center text-center" ><?= $title?></h5>
    <div class="chart">
        <canvas id="<?= $chart_id?>" style="height:250px; min-height:250px"></canvas>
    </div>
</div>
<script>
    var ticksStyle = {
        fontColor: '#495057',
        fontStyle: 'bold'
    }
    var mode      = 'index'
    var intersect = true
    var $visitorsChart = $( '#<?= $chart_id?>' )
    var visitorsChart  = new Chart($visitorsChart, {
        data   : {
        labels  : [ "Januari",'Februari', 'Maret', 'April', 'Mei','Juni', 'Juli',  'Agustus','September', 'Oktober','November','Desember' ],
        datasets: [
                {
                        type                : 'line',
                        data                : <?php echo json_encode( $data_sets[0]->values) ?>,
                        backgroundColor     : 'transparent',
                        borderColor         : <?= $data_sets[0]->color ?> ,
                        pointBorderColor    : <?= $data_sets[0]->color ?> ,
                        pointBackgroundColor: <?= $data_sets[0]->color ?> ,
                        fill                : false
                        // pointHoverBackgroundColor: '#007bff',
                        // pointHoverBorderColor    : '#007bff'
                }
            ]
        },
        options: {
        maintainAspectRatio: false,
        tooltips           : {
            mode     : mode,
            intersect: intersect
        },
        hover              : {
            mode     : mode,
            intersect: intersect
        },
        legend             : {
            display: false
        },
        scales             : {
            yAxes: [{
            // display: false,
            gridLines: {
                display      : true,
                lineWidth    : '4px',
                color        : 'rgba(0, 0, 0, .2)',
                zeroLineColor: 'transparent'
            },
            ticks    : $.extend({
                beginAtZero : true,
                suggestedMax: 100
            }, ticksStyle)
            }],
            xAxes: [{
            display  : true,
            gridLines: {
                display: false
            },
            ticks    : ticksStyle
            }]
        }
        }
    })
</script>