<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            //
            'fullname' => $row[0],
            'email' => $row[1],
            'phone' => $row[2],
            'birthdate' => $row[3],
            'gender' => $row[4],
            'address' => $row[5],
            'photo' => $row[6],
            'password' => bcrypt($row[7]),

        ]);
    }
}
