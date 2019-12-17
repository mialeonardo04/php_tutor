<?php

use Illuminate\Database\Seeder;
use App\Course;
use App\Unit;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $units =[
            ['name'=>'PHP Syntax'],
            ['name'=>'PHP Variables'],
            ['name'=>'PHP Data Types'],
            ['name'=>'PHP Operators'],
            ['name'=>'PHP Conditionals'],
            ['name'=>'PHP Looping'],
            ['name'=>'PHP Arrays'],
            ['name'=>'PHP Superglobals'],
        ];
        foreach ($units as $unit){
            Unit::create($unit);
        }
        $courses =[
            ['id_unit'=>1,
                'description'=>'Pengenalan',
                'question'=>'Apa yang dimaksud dengan PHP?',
                'answer'=>'bahasa script',
                'embed_url'=>'https://youtu.be/JEvlT5du2Ec?list=PLCZlgfAG0GXADD_i0xL_Dkv4zT_vFmdnS'],
            ['id_unit'=>4,
                'description'=>'Print: Echo',
                'question'=>'Apaah output yang dihasilkan?',
                'answer'=>'Hello World',
                'embed_url'=>'https://youtu.be/cOJ8fwR-BSA?list=PLCZlgfAG0GXADD_i0xL_Dkv4zT_vFmdnS']
        ];
        foreach ($courses as $course){
            Course::create($course);
        }
    }
}
