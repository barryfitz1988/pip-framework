 <?php
    foreach ($srnumbers as $count => $sr){

        if ($sr['ELIGIBLE_FOR_AD'] == 'APPROVED'){
            $x[] = $sr['ELIGIBLE_FOR_AD'];
        }else{
            $y[] = $sr['ELIGIBLE_FOR_AD'];
        };
    }
    ?>
    <div id="container" style="width:100%; height:400px;"></div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let x = '<?php echo count($x) ?>';
            let y = '<?php echo count($y) ?>';
            var myChart = Highcharts.chart('container', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'Amount Eligible For Auto-Disptach'
                },
                xAxis: {
                    categories: ['Dispatches']
                },
                yAxis: {
                    title: {
                        text: 'Amount'
                    }
                },
                series: [{
                    name: 'Yes',
                    data: [parseInt(x)]
                }, {
                    name: 'No',
                    data: [parseInt(y)]
                }]
            });
        });

    </script>
