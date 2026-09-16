<?php

namespace App\Exports;

use App\Models\PackageInquiry;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PackageInquiryExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return PackageInquiry::select(
            'name',
            'address',
            'whatsapp',
            'email',
            'query',
            // 'created_at'
        )->orderBy('id', 'desc')->get();
    }

    public function headings(): array
    {
        return [
            'Name',
            'Address',
            'Mobile',
            'Email',
            'Message',
            // 'Date'
        ];
    }
}
