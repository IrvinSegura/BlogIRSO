<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class publication extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        date_default_timezone_set('America/Mexico_City');
        DB::table('publications')->insert([
            'title' => 'El nuevo iPhone 12',
            'slug' => 'el-nuevo-iphone-12',
            'src_img' => 'https://cdn.pixabay.com/photo/2017/09/25/13/12/apple-2785074_960_720.jpg',
            'user_id' => 4,
            'category_id' => 1,
            'status' => 'publicado',
            'content' => 'El nuevo iPhone 12 es el mejor teléfono que ha lanzado Apple hasta la fecha.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
