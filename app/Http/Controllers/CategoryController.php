<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
// use App\Http\Requests\Request;


class CategoryController extends Controller
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
        $cats = Category::paginate(9);
        // dd($cats);
        return view('categories.index')->with('cats', $cats);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('categories.create');
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
        $cat = new Category;
        $cat->name  = $request->name;
        if ($request->hasFile('image')) {
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('imgs'), $file);
            $cat->image = 'imgs/'.$file;
        }
        $cat->description  = $request->description;

        if ($cat->save()) {
            return redirect('categories')->with('message', 'La categoria: '.$cat->name.' fue Adicionado con Exito!');
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
        $cats = Category::find($id);
        return view('categories.show')->with('cats', $cats);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cats = Category::find($id);
        return view('categories.edit')->with('cat', $cats);
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
        $cat = new Category;
        $cat->name  = $request->name;
        if ($request->hasFile('image')) {
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('imgs'), $file);
            $cat->image = 'imgs/'.$file;
        }
        $cat->description  = $request->description;

        if ($cat->save()) {
            return redirect('categories')->with('message', 'La categoria: '.$cat->name.' fue Adicionado con Exito!');
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
        $cat = Category::find($id);
        if($cat->delete()){
            return redirect('categories')->with('message', 'La categoria: '.$cat->name.' fue eliminada con Exito!');
        }
    }

    public function pdf(){
        //dd('PDF');
        $cats = Category::all();
        $pdf = \PDF::loadView('cats.pdf', compact('cats'));
        return $pdf->download('cats.pdf');
    }
}
