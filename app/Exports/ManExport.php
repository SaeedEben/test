<?php

namespace App\Exports;

use App\Man;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;

class ManExport implements FromCollection , WithMapping
{
    /**
    * @return Collection
    */
    public function collection()
    {
        return Man::all();
    }

    /**
     * @inheritDoc
     */
    public function map($man) :array
    {
        return  [
            $man->name
        ];
    }
}
