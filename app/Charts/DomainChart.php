<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class DomainChart
{
    protected $chart;

    public function __construct()
    {
        $this->chart = new LarapexChart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        return $this->chart->pieChart()
            ->setTitle('Localidades:')
            ->addData([4, 9, 10, 3, 1, 2 ])
            ->setLabels(['Sul Americano', 'Americano', 'Brasileiro', 'Europeu', 'Asiatico', "Oceiania"]);
    }
}
