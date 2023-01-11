<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CategoryImport;
use App\Models\Category;

class ImportCategoryCommand extends Command
{

    protected $signature = 'import:category';
    protected $description = 'Import category from Excel';


    public function handle()
    {
       ini_set('memory_limit', '-1');
       Excel::import(new CategoryImport(), public_path('excel/object.xls'));
       dd('finish');
    }
}
