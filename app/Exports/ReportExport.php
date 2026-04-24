<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;


class ReportExport implements FromCollection, WithHeadings
{
    protected $data;
    protected $headings;

    public function __construct($data, $headings)
    {
        // Defensive programming: Ensure it's never null
        $this->data = $data ?? collect(); 
        $this->headings = $headings ?? [];
    }

    public function collection(): Collection
    {
        return collect($this->data);
    }

    public function headings(): array
    {
        return $this->headings;
    }
}