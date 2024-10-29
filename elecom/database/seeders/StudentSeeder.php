<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $student=collect(
            [
            [
                'name'=> 'Md fahim Hosen',
            'email'=> 'fa@gmail.com',
            ],
            [
                'name'=> 'Md raju Ahammed',
            'email'=> 'raj@gmail.com',

            ]
            ]
        );

        $student->each(function($student){
            student::insert($student);

        });

        // student::create([
        //     'name'=> 'Md Shanto Hosen',
        //     'email'=> 'San@gmail.com',
        // ]);
    }
}
