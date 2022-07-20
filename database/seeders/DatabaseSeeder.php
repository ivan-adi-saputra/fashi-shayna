<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Ivan Adi Saputra',
            'username' => 'ivanadisaputra',
            'email' => 'ivanadisaputra@gmail.com',
            'password' => bcrypt('grenjengan')
        ]);

        User::factory(4)->create();
        Product::factory(10)->create();
        Transaction::factory(10)->create();
        Category::create([
            'name' => 'T-shirt', 
            'slug' => 't-shirt'
        ]);
        Category::create([
            'name' => 'Towel', 
            'slug' => 'towel'
        ]);
        Category::create([
            'name' => 'Bag', 
            'slug' => 'bag'
        ]);
    }
}
