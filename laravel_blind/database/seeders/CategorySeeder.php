<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['no' => '0', 'name' => '블라블라']
            ,['no' => '1', 'name' => '주식/투자']
            ,['no' => '2', 'name' => '썸/연애']
            ,['no' => '3', 'name' => '암호화폐']
            ,['no' => '4', 'name' => '부동산']
            ,['no' => '5', 'name' => '이직/커리어']
            ,['no' => '6', 'name' => '헬스/다이어트']
            ,['no' => '7', 'name' => '여행/먹방']
            ,['no' => '8', 'name' => '자동차']
            ,['no' => '9', 'name' => '회사생활']
            ,['no' => '10', 'name' => '직장인 취미생활']
            ,['no' => '11', 'name' => '결혼생활']
            ,['no' => '12', 'name' => '지름/쇼핑']
            ,['no' => '13', 'name' => '반려동물']
            ,['no' => '14', 'name' => '스포츠']
            ,['no' => '15', 'name' => '육아']
            ,

        ]);
    }
}
