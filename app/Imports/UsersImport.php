<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */


    public function collection(Collection $rows)
    {
        // return response()->json(['test' => 'jalan']);
        $validator = Validator::make($rows->toArray(), [
            '*.name' => 'required|max:255',
            '*.password' => 'required',
            '*.username' => 'required|unique:users|max:255',
            '*.email' => 'required|unique:users|email:dns',
            '*.phone' => 'required|unique:users',
            '*.role' => 'required'
        ]);
        if($validator->fails()){
            // return back()->with('error','Error! User not been Added')->withInput()->withErrors($validator);
            return back()->with('error_code', 'add-user-excel')->withErrors($validator);
        }
        foreach ($rows as $row) {
            User::create([
                'name' => $row['name'],
                'email' => $row['email'],
                'phone' => $row['phone'],
                'username' => $row['username'],
                'password' => Hash::make($row['password']),
                'role_id' => match ($row['role']){
                    'CEO' => 2,
                    'Manager' => 3,
                    'Advertiser' => 4,
                    'CS' => 5,
                    'DGM' => 6,
                    'CWM' => 7,
                    'IT' => 8,
                    'Budgeting' => 9,
                    'Inputer' => 10,
                    'HR' => 11,
                    'JA' => 12
                },
                'admin_id' => auth()->user()->admin_id,
                'paket_id' => auth()->user()->paket_id,
                'exp' => auth()->user()->exp,
                'expired_at' => auth()->user()->expired_at


            ]);
        }
    }
}
