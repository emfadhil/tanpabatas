<?php

namespace App\Exports;

use App\Member;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MemberExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Member::all();
        $ar_member = DB::table('users')
        ->select('users.name','users.email','users.alamat','users.telp','users.role','users.status')
        ->get();
        return $ar_member;
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Email',
            'Alamat',
            'Telepon',
            'Hak Akses',
            'Status Akun',
        ];
    }
}
