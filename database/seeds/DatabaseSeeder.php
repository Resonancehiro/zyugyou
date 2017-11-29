<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::insert("insert into items (name,price) value (?,?)",[
            "サンプル商品", 200
        ]);
        DB::insert("insert into items (name,price) value (?,?)",[
            "サンプル商品", 150
        ]);
        DB::insert("insert into items (name,price) value (?,?)",[
            "サンプル商品", 10
        ]);
    }
}
