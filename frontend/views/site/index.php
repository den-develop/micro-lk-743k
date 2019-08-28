<?php

/* @var $this yii\web\View */
/* @var array $chart_data */

use dosamigos\chartjs\ChartJs;

$this->title = 'Micro LK #743k';
?>
<div class="site-index">
    <div class="body-content">
        <div style="width: 700px; height: 700px; margin-left: auto; margin-right: auto ">
            <?= ChartJs::widget([
                'type' => 'line',
                'options' => [
                    'height' => 200,
                    'width' => 200
                ],
                'data' => [
                    'labels' => array_column($chart_data, 'date'),
                    'datasets' => [
                        [
                            'label' => "Seat Time",
                            'backgroundColor' => "rgba(179,181,198,0.2)",
                            'borderColor' => "rgba(179,181,198,1)",
                            'pointBackgroundColor' => "rgba(179,181,198,1)",
                            'pointBorderColor' => "#fff",
                            'pointHoverBackgroundColor' => "#fff",
                            'pointHoverBorderColor' => "rgba(179,181,198,1)",
                            'data' => array_column($chart_data, 'seat_time')
                        ],
                    ]
                ]
            ]);
            ?>
        </div>
    </div>
</div>
