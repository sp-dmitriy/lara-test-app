<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Category;

class RelationImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $i = 0;
       foreach($collection as $item) {
          $i = $i + 1;
          $category = Category::where('id',(int)$item['objid'])->firstOr(function () {
            print_r(' not found ' );
          });
          if($category) {
            $found = Category::find((int)$item['parent_objid']);
            if($found) {
              $category['category_id'] = $item['parent_objid'];
              $category->save();
            }
          }



          print_r($i . ' ');
        }
    }
}
