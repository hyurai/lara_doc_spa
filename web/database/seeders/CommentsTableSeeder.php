<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 


class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->truncate();

        $comments = [
            [ 'user_id' => 1,
              'entertainer_id' => 1,
              'text' => 'かわいい'],
            [ 'user_id' => 1,
              'entertainer_id' => 1,
              'text' => 'スーパーかわいい'],
            [ 'user_id' => 1,
              'entertainer_id' => 1,
              'text' => 'ハイパー可愛い'],
        ];
        foreach($comments as $comment){
            \App\Models\Comment::create($comment);
        }
    }
}
