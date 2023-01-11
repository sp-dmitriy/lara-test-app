<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Category;
use Carbon\Carbon;
use DateTime;

class CategoryImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $i = 0;
       foreach($collection as $item) {

            if ((isset($item['stext']) && $item['stext'] != ''))
            {
                $i = $i + 1;
                Category::firstOrCreate(
                [   
                    'id' => $item['objid'],
                    'begda' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($item['begda']),
                    'endda' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($item['endda']),
                    'stext' =>$item['stext'],
                        
                ]);
                print_r($i . ' ');
            }    
        }
    }
}
