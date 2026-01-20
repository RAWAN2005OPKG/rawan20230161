<?php

namespace App\Exports;

use App\Models\Person;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PeopleExport implements FromCollection, WithHeadings, WithMapping
{
    protected $search;

    public function __construct($search)
    {
        $this->search = $search;
    }

    public function collection()
    {
        $query = Person::query();

        if ($this->search) {
            $search = $this->search;
            $query->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('phone', 'LIKE', "%{$search}%")
                  ->orWhere('job', 'LIKE', "%{$search}%");
        }

        return $query->get();
    }

    public function headings(): array
    {
        return ['الاسم', 'رقم الجوال', 'الوظيفة', 'الحالة'];
    }

    public function map($person): array
    {
        return [
            $person->name,
            $person->phone,
            $person->job,
            $person->status,
        ];
    }
}
