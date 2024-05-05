<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Models\statistic_revenues_byDate;
class MonthExport implements FromCollection,WithHeadings
{
    private $transactions;
    public function __construct($transactions)
    {
        $this->transactions = $transactions;
    }
    

    public function collection()
    {
        $transactions = $this->transactions;
        $formatTransactions = [];

        foreach ($transactions as $key => $item) {
            $formatTransactions[] = [
                'id'      => $item->id,
                'revenue'   => number_format($item->sumRevenues,0,',','.'),
                'date'    => $item->date,
            ];
        }

        return collect($formatTransactions);
    }

    public function headings(): array
    {
        return [
            '#',
            'Revenue',
            "Date"
        ];
    }

}
