<?php

namespace App\Console\Commands;

use App\Imports\ProductsImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportProductsFromExcel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:products {--path=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Products from excel sheet in storage/imports folder';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $importFilePath = $this->option('path');

        if(is_null($importFilePath)) {
            $importFilePath = 'app/imports/product_import_sheet_latest.xlsx';
        }

        $import = new ProductsImport();
        $import->onlySheets('Sheet1');

        Excel::import($import, storage_path($importFilePath));
    }
}
