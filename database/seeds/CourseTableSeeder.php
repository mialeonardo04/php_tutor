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
            ['name'=>'PHP Introductions'],
            ['name'=>'PHP Variables'],
            ['name'=>'PHP Data Types'],
            ['name'=>'PHP Operators'],
            ['name'=>'PHP Arrays'],
            ['name'=>'PHP Conditionals'],
            ['name'=>'PHP Looping'],
            ['name'=>'PHP Superglobals'],
        ];
        foreach ($units as $unit){
            Unit::create($unit);
        }
        $courses =[
            [
                'id_unit'=>1,
                'description'=>'Introduction 1',
                'tipe_soal'=>'1',
                'question'=>'Berdasarkan video sebelumnya, PHP adalah bahasa program yang digunakan pada sisi ...?',
                'answer'=>'server',
                'embed_url'=>'https://youtu.be/JEvlT5du2Ec?list=PLCZlgfAG0GXADD_i0xL_Dkv4zT_vFmdnS'
            ], [
                'id_unit'=>1,
                'description'=>'Introduction 2',
                'tipe_soal'=>'1',
                'question'=>'Apakah nama root folder yang digunakan untuk menyimpan folder atau file yang akan dijalankan pada server lokal?',
                'answer'=>'htdocs',
                'embed_url'=>'https://youtu.be/cOJ8fwR-BSA?list=PLCZlgfAG0GXADD_i0xL_Dkv4zT_vFmdnS'
            ], [
                'id_unit'=>1,
                'description'=>'Introduction 3 (membuat Hello World)',
                'tipe_soal'=>'2',
                'question'=>'Buatlah program sesuai dengan instruksi',
                'answer_errorstatus'=>'0',
                'answer_outputstatus'=>'1'
            ], [
                'id_unit'=>2,
                'description'=>'Variable 1',
                'tipe_soal'=>'1',
                'question'=>'Cara prgrammer memberikan informasi pribadi tentang kode program yang ditulis adalah dengan menggunakan ...',
                'answer'=>'komentar',
                'embed_url'=>'https://youtu.be/m8viqR-PuI4?list=PLCZlgfAG0GXADD_i0xL_Dkv4zT_vFmdnS'
            ], [
                'id_unit'=>2,
                'description'=>'Variable 2',
                'tipe_soal'=>'1',
                'question'=>'Berdasarkan video yang diputar, nama variable tidak boleh diawali dengan ..',
                'answer'=>'angka',
                'embed_url'=>'https://youtu.be/m8viqR-PuI4?list=PLCZlgfAG0GXADD_i0xL_Dkv4zT_vFmdnS'
            ], [
                'id_unit'=>2,
                'description'=>'Variable 3 (Membuat dan Mencetak Variable)',
                'tipe_soal'=>'2',
                'question'=>'Buatlah program sesuai dengan instruksi',
                'answer_errorstatus'=>'0',
                'answer_outputstatus'=>'1'
            ], [
                'id_unit'=>3,
                'description'=>'Data Types 1',
                'tipe_soal'=>'1',
                'question'=>'Berdasarkan video yang diputar, untuk membuat variable String, dapat langsung ditulis isinya menggunakan tanda baca ..',
                'answer'=>'quotes petik',
                'embed_url'=>'https://youtu.be/PBiQd6aVa74?list=PLCZlgfAG0GXADD_i0xL_Dkv4zT_vFmdnS'
            ], [
                'id_unit'=>3,
                'description'=>'Data Types 2(Mencetak Variable String)',
                'tipe_soal'=>'2',
                'question'=>'Buatlah program sesuai dengan instruksi',
                'answer_errorstatus'=>'0',
                'answer_outputstatus'=>'1'
            ],[
                'id_unit'=>3,
                'description'=>'Data Types 3',
                'tipe_soal'=>'1',
                'question'=>'Berdasarkan video yang diputar, untuk membuat variable Integer, dapat ditulis langsung ... sebagai isinya',
                'answer'=>'angka',
                'embed_url'=>'https://youtu.be/_Al0A4IXTpQ?list=PLCZlgfAG0GXADD_i0xL_Dkv4zT_vFmdnS'
            ], [
                'id_unit'=>3,
                'description'=>'Data Types 4(Mencetak Variable Numbering)',
                'tipe_soal'=>'2',
                'question'=>'Buatlah program sesuai dengan instruksi',
                'answer_errorstatus'=>'0',
                'answer_outputstatus'=>'1'
            ],[
                'id_unit'=>4,
                'description'=>'Opertators 1',
                'tipe_soal'=>'1',
                'question'=>'Berdasarkan video yang diputar, operator yang digunakan untuk increment bertambah suatu variable adalah...',
                'answer'=>'++',
                'embed_url'=>'https://youtu.be/ljz90HYEPyM?list=PLCZlgfAG0GXADD_i0xL_Dkv4zT_vFmdnS'
            ], [
                'id_unit'=>4,
                'description'=>'Operators 2(Operasi Variable pada PHP)',
                'tipe_soal'=>'2',
                'question'=>'Buatlah program sesuai dengan instruksi',
                'answer_errorstatus'=>'0',
                'answer_outputstatus'=>'1'
            ]
        ];
        foreach ($courses as $course){
            Course::create($course);
        }
    }
}
