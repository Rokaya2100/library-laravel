<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
/*         Author::truncate();
 */        Author::create([
            'name' =>'Ahmad Esmail',
            'email'=>'ahmadesmail@gmail.com'
        ]);
        Author::create([
            'name' =>'jhon molhem',
            'email'=>'jhonmolhem11@gmail.com'
        ]);
        Author::create([
            'name' =>'Mohammad Ali',
            'email'=>'mohammad98@gmail.com'
        ]);
        Author::create([
            'name' =>'JamelahEad',
            'email'=>'JamelahEad@gmail.com'
        ]);
    }
}
