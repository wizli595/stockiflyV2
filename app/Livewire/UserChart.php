<?php

namespace App\Livewire;

use Asantibanez\LivewireCharts\Models\LineChartModel;
use Livewire\Component;

class UserChart extends Component
{
    public function render()
    {
        $lineChartModel = (new LineChartModel())
        ->setTitle('Expenses by Day')
        ->setAnimated(true)
        ->addPoint(1, 100, ['id' => 'point1'])
        ->addPoint(2, 200, ['id' => 'point2'])
        ->addPoint(3, 300, ['id' => 'point3']);

        return view('livewire.user-chart', compact('lineChartModel'));
    }
}
