<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\About;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::create([
            'title' =>'The adverb about, when used with a quantity',
            'description' => 'The adverb about, when used with a quantity, means approximately or roughly. If a teenager wants to have a couple of friends over, his mom might ask about how many "a couple" is — in his mind it may be about 50',
        ]);
    }
}
