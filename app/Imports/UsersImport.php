<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;

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
            '*.email' => 'required|unique:users|email',
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
                'role_id' => match (Str::lower($row['role'])){
                    'ceo' => 2,
                    'manager' => 3,
                    'adv' => 4,
                    'cs' => 5,
                    'dgm' => 6,
                    'cwm' => 7,
                    'it' => 8,
                    'budgeting' => 9,
                    'inputer' => 10,
                    'hr' => 11,
                    'ja' => 12
                },
                'admin_id' => auth()->user()->admin_id,
                'paket_id' => auth()->user()->paket_id,
                'exp' => auth()->user()->exp,
                'expired_at' => auth()->user()->expired_at
            ]);
        }
    }
}
