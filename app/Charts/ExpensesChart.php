<?php

namespace App\Charts;

use App\Models\Order;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class ExpensesChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($year): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $result = $this->getInvoiceStatistics($year);
        $count = $this->getInvoiceStatisticsCount($year);
        $total = $this->getInvoiceStatisticsTotal($year);
    
        $chart = $this->chart->barChart(); // Initialize the chart
    
        if ($result && $count && $total) {
            $chart->setTitle('Thống kê hóa đơn ' . $year . ' |' . ' Số lượng hóa đơn: ' . $count . ' ' . 'đơn ' . '|' . ' Tổng giá trị: ' . number_format($total->total) . ' VND')
                ->setSubtitle('Hóa đơn tháng ');
    
            $data = [];
            $xAxisLabels = [];
    
            foreach ($result as $row) {
                $data[] = $row->total_invoices;
                $xAxisLabels[] = 'Tháng ' . $row->month;
            }
    
            $chart->addData('Hóa đơn', $data)
                ->setXAxis($xAxisLabels);
        }
    
        return $chart; // Always return the chart instance
    }
    

    protected function getInvoiceStatistics($year)
    {
        return Order::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as total_invoices')
            ->whereRaw('paymentstatus = 1 and orderstatus = 1')
            ->whereYear('created_at', $year)
            ->groupByRaw('YEAR(created_at), MONTH(created_at)')
            ->get();
    }
    protected function getInvoiceStatisticsCount($year)
    {
        return Order::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as total_invoices')
            ->whereRaw('paymentstatus = 1 and orderstatus = 1')
            ->whereYear('created_at', $year)
            ->groupByRaw('YEAR(created_at)')
            ->count();
    }
    protected function getInvoiceStatisticsTotal($year)
{
    return Order::selectRaw('SUM(totalall) as total')
        ->where('paymentstatus', 1)
        ->where('orderstatus', 1)
        ->whereYear('created_at', $year)
        ->groupByRaw('YEAR(created_at)')
        ->first();
}

}

