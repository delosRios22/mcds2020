<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\User;
use App\Category;
use Auth;
use App\Exports\ArticlesExport;


class ArticleController extends Controller
{
    public function __construct() {
        return $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $articles = Article::paginate(8);
        return view('articles.index')->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user= Auth::user();
        $cats= Category::all();
        return view('articles.create')->with('user', $user)->with('cats', $cats);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $article = new Article;
        $article->name  = $request->name;
        $article->category_id= $request->category_id;
        $article->user_id= Auth::user()->id;
        $article->description     = $request->description;
        if($request->hasFile('image')){
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('imgs'),$file);
            $article->image = 'imgs/'.$file;
        }
        if ($article->save()) {
            return redirect('articles')->with('message', 'El Articulo: '.$article->name.' fue Adicionado con Exito!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $article = Article::find($id);
        $user= Auth::user();
        $cat= Category::find($article->category_id);
        return view('articles.show')->with('article', $article)->with('user', $user)->with('cat', $cat);;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $article = Article::find($id);
        $user= Auth::user();
        $cats= Category::all();
        return view('articles.edit')->with('article', $article)->with('user', $user)->with('cats', $cats);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $article = Article::find($id);
        $article->name  = $request->name;
        if ($request->hasFile('image')) {
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('imgs'), $file);
            $article->image = 'imgs/'.$file;
        }
        $article->user_id       = Auth::user()->id;
        $article->category_id   = $request->category;
        $article->description     = $request->description;
        if ($article->save()) {
            return redirect('articles')->with('message', 'El Articulo: '.$article->name.' fue Modificado con Exito!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $article = Article::find($id);
        if($article->delete()){
            return redirect('articles')->with('message', 'El Articulo: '.$article->name.' fue eliminado con Exito!');
        }
    }
    
    public function pdf(){
        $pdf= \PDF::loadView('articles.pdf', [
            'usrs'=> User::all(),
            'cats'=> Category::all(),
            'articles'=> Article::all(),
        ]);
        return $pdf->download('articles.pdf');
     }

     public function excel(){
        return \Excel::download(new ArticlesExport, 'articles.xlsx');
    }


}
