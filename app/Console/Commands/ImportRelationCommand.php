<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\RelationImport;
use App\Models\Category;

class ImportRelationCommand extends Command
{

    protected $signature = 'import:relation';
    protected $description = 'Import relation from Excel';


    public function handle()
    {
       ini_set('memory_limit', '-1');
       Excel::import(new RelationImport(), public_path('excel/relation.xls'));
       dd('finish');
    }
}
