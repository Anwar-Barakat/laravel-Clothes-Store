<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $users  = DB::table('users')
            ->join('countries', 'users.country_id', '=', 'countries.id')
            ->select(
                'users.id',
                'users.name as username',
                'users.address',
                'users.city',
                'users.state',
                'countries.name as country',
                'users.email',
                'users.mobile',
                'users.pincode',
                'users.created_at',
            )
            ->orderBy('id', 'desc')
            ->get();

        return $users;
    }

    public function headings(): array
    {
        return ['id', 'name', 'address', 'city', 'state', 'country ', 'email', 'mobile', 'pincode', 'registered at'];
    }
}
