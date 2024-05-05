<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Models\Order;
use App\Models\statistic_revenues_byDate;
class OrderExport implements FromCollection,WithHeadings
{
    private $order;
    public function __construct($order)
    {
        $this->order = $order;
    }
    

    public function collection()
    {
        $order = $this->order;
        $formatorder = [];
       
        foreach ($order as $key => $item) {
            $statistic_date = statistic_revenues_byDate::where('date','=',$item->organizationDate)->first();
            $formatorder[] = [
                'id'      => $item->id,
                'userId'   => $item->User->fullName,
                'peopleNumber'   => $item->peopleNumber,
                'service'    => $item->Service->name,
                'organizationDate'    => $item->organizationDate,
                'revenues' => $statistic_date->sumRevenues
                
            ];
        }

        return collect($formatorder);
    }

    public function headings(): array
    {
        return [
            '#',
            'Người đặt',
            "Số lượng người",
            "Dịch vụ",
            "Ngày tổ chức",
            "Doanh thu"
        ];
    }

}
