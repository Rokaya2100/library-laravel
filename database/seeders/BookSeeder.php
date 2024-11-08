<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Database\Seeders\CategorySeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
/*         Book::truncate();
 */        $book1 = Book::create([
            'title'      => 'The Secret',
            'description'=> 'this book about the human',
            'author_id'  => 4,
        ]);

        $book2 = Book::create([
            'title'      => 'Frankenstein',
            'description'=> 'the book about the math',
            'author_id'  => 2,
        ]);

        $book3 = Book::create([
            'title'      => 'The Man and Cat',
            'description'=> 'about langauge english',
            'author_id'  => 3,
        ]);

        $book4 = Book::create([
            'title'      => 'Sea and Moon',
            'description'=> 'this book about sport',
            'author_id'  => 2,
        ]);

        $book5 = Book::create([
            'title'      => 'the school',
            'description'=> 'about maths',
            'author_id'  => 1,
        ]);

        $category1 = Category::where('name','maths')->first();
        $category2 = Category::where('name','sport')->first();
        $category3 = Category::where('name','langauges')->first();

        $book1->categories()->sync([$category2->id,$category3->id]);
        $book2->categories()->sync([$category1->id]);
        $book3->categories()->sync([$category1->id,$category3->id]);
        $book4->categories()->sync([$category1->id,$category2->id,$category3->id]);
        $book5->categories()->sync([$category1->id]);

    }
}
