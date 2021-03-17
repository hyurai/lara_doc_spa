<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 


class EntertainersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('entertainers')->truncate();

        $entertainers = [
            [ 'name' => '広瀬すず',
              'image_url' => 'https://images.talent-dictionary.com/uploads/images/tldb/a06c042136e0671d51d02a31aed82904e91df765.jpg',
              'age' => 22
            ],
            ['name' => '新垣結衣',
             'image_url' => 'https://images.talent-dictionary.com/uploads/images/tldb/4bc9cc4ca539be52cd87ea83aa022e5b3f72d494.jpg',
             'age' => 32
            ],
            [ 'name' => '深田恭子',
              'image_url' => 'https://images.talent-dictionary.com/uploads/images/tldb/951078965d12a64e40e4fe24a857f637f6a2c325.jpg',
              'age' => 38
             ],
        ];
        
        foreach($entertainers as $entertainer){
            \App\Models\Entertainer::create($entertainer);
        }//
    }
}
