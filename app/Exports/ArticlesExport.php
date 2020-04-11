<?php

namespace App\Exports;

use App\Article;
use Maatwebsite\Excel\Concerns\FromCollection;

class ArticlesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Article::all();
    }
}
