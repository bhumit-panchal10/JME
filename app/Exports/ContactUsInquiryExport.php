<?php

namespace App\Exports;

use App\Models\ContactUsInquiry;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ContactUsInquiryExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return ContactUsInquiry::select(
            'name',
            'mobile',
            'department',
            'email',
            'message',
            // 'created_at'
        )->orderBy('id', 'desc')->get();
    }

    public function headings(): array
    {
        return [
            'Name',
            'Mobile',
            'Department',
            'Email',
            'Message',
            // 'Date'
        ];
    }
}
