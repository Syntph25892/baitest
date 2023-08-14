<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NhanVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $test = [];
        for ($i=0; $i < 20; $i++) { 
           $test[] = [
            'ten'=>"abc$i",
            'email'=>"abc$i@gmail.com",
            'tel'=>"124-1245-65$i",
           ];
        }
        DB::table('nhanvien')->insert($test);
    }
}
