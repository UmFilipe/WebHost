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

    public function build($valores): \ArielMejiaDev\LarapexCharts\PieChart
    {
        return $this->chart->pieChart()
            ->setTitle('Serviços Utilizados:')
            ->addData($valores)
            ->setColors(['#E3342F', '#FFED4A', '#38C172'])
            ->setLabels(['Dominios', 'Hospedagens', 'Servidores'])
            ->setFontFamily('sans-serif')
            ->setFontColor('#000');
    }
}
