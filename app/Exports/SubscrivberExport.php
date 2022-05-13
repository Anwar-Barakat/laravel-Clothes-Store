<?php

namespace App\Exports;

use App\Models\NewslatterSubsciber;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SubscrivberExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $subscribers = NewslatterSubsciber::select('id', 'email', 'created_at')
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->get();

        return $subscribers;
    }

    public function headings(): array
    {
        return ['id', 'email', 'subscriber on'];
    }
}