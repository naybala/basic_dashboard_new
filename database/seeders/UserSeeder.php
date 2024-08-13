<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        foreach (range(1, 2000) as $a) {
            DB::table('users')
                ->insert([
                    [
                        'name' => 'NayBaLa' . $a,
                        'email' => 'superadmin@gmail' . $a . '.com',
                        'password' => Hash::make('adminNO' . $a),
                        'created_by' => 1,
                        'status' => 1,
                    ],
                ]);
        };
    }
}
