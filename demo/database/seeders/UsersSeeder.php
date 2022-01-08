<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Users;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /* It is used to insert one
        DB::table('users')->insert([
            'name' => Str::random(10),
            'address' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'created_on' => Carbon::today()->subDays(rand(0, 365)),
            'updated_on' => Carbon::today()->subDays(rand(0, 100))
        ]); */

        Users::factory()
            ->count(30)
            ->create();
    }
}
