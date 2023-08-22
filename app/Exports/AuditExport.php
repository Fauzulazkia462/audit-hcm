<?php

namespace App\Exports;

use App\Models\Audit;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AuditExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Audit::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'No Form',
            'Audit Date',
            'Section',
            'Status',
            'Item Kriteria Audit',
            'Auditee Job Title',
            'Temuan',
            'Perbaikan',
            'Deadline',
            'Update Date',
            'Created Date',
        ];
    }
}
