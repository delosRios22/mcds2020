<?php

namespace App\Exports;

use App\Article;
use Auth;
use App\User;
use App\Category;
use Maatwebsite\Excel\Concerns\FromCollection;

class ArticlesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Article::all();
        if(Auth::user()->role == 'admin'){
            $articles = Article::paginate(8);
        }else if(Auth::user()->role == 'editor'){
            $articles = Article::where('user_id', '=', Auth::user()->id)->paginate(8);
        }

        return $articles;


    }
}
