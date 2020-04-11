<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return User::select('id', 'fullname', 'email', 'phone', 'birthdate', 'gender', 'address')->get();
        return User::all();
    }
}
