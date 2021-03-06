<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Auth;

class UserController extends Controller
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
        //$users = User::all();
        $users = User::paginate(8);
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd("Form Create");
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //dd($request->all());
        $user = new User;
        $user->fullname  = $request->fullname;
        $user->email     = $request->email;
        $user->phone     = $request->phone;
        $user->birthdate = $request->birthdate;
        $user->gender    = $request->gender;
        $user->address   = $request->address;
        if ($request->hasFile('photo')) {
            $file = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('imgs'), $file);
            $user->photo = 'imgs/'.$file;
        }
        $user->password  = bcrypt($request->password);

        if ($user->save()) {
            return redirect('users')->with('message', 'El Usuario: '.$user->fullname.' fue Adicionado con Exito!');
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
        $user = User::find($id);
        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        //dd($request->all());

        $user = User::find($id);
        $user->fullname  = $request->fullname;
        $user->email     = $request->email;
        $user->phone     = $request->phone;
        $user->birthdate = $request->birthdate;
        $user->gender    = $request->gender;
        $user->address   = $request->address;
        if ($request->hasFile('photo')) {
            $file = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('imgs'), $file);
            $user->photo = 'imgs/'.$file;
        }
        if ($user->save()) {
            return redirect('users')->with('message', 'El Usuario: '.$user->fullname.' fue Modificado con Exito!');
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
        //User::destroy($id);
        $user = User::find($id);
        if($user->delete()){
            return redirect('users')->with('message', 'El Usuario: '.$user->fullname.' fue eliminado con Exito!');
        }
    }

    public function pdf(){
        //dd('PDF');
        $users = User::all();
        $pdf = \PDF::loadView('users.pdf', compact('users'));
        return $pdf->download('users.pdf');
    }

    public function excel(){
        // $users= user::all();
        return \Excel::download(new UsersExport, 'users.xlsx');
        
    }


    public function importExcel(Request $request) 
    {
        $file= $request->file('file');
        \Excel::import(new UsersImport, $file);   //importar lo que contengas la variable file
        return redirect('users')->with('message', 'Importación de usuarios con éxito');
      
    }

    public function mydata(){
        $id = Auth::user()-> id;
        $user = User::findOrFail($id);

        return view('users.mydata')->with('user', $user);
    }

    public function updMyData(UserRequest $request, $id){
        // dd($id);

        $user = User::find($id);
        $user->fullname  = $request->fullname;
        $user->email     = $request->email;
        $user->phone     = $request->phone;
        $user->birthdate = $request->birthdate;
        $user->gender    = $request->gender;
        $user->address   = $request->address;
        if ($request->hasFile('photo')) {
            $file = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('imgs'), $file);
            $user->photo = 'imgs/'.$file;
        }
        if ($user->save()) {
            return redirect('home')->with('message', 'Sus datos fueron modificados con éxito!');
        }
    }

    public function search(Request $request) {
        $users = User::names($request->q)->orderBy('id', 'ASC')->paginate(10);
        return view('users.search')->with('users', $users);
    }

}
