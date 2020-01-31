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
                'description'=>'Introduction Part 1',
                'tipe_soal'=>'1',
                'question'=>'Berdasarkan video sebelumnya, PHP adalah bahasa program yang digunakan pada sisi ...?',
                'answer'=>'server',
                'embed_url'=>'https://youtu.be/JEvlT5du2Ec'
            ], [
                'id_unit'=>1,
                'description'=>'Introduction Part 2',
                'tipe_soal'=>'1',
                'question'=>'Apakah nama root folder yang digunakan untuk menyimpan folder atau file yang akan dijalankan pada server lokal?',
                'answer'=>'htdocs',
                'embed_url'=>'https://youtu.be/cOJ8fwR-BSA'
            ], [
                'id_unit'=>1,
                'description'=>'Introduction Part 3 (Mencetak Hello World)',
                'tipe_soal'=>'2',
                'question'=>'Buatlah program sesuai dengan instruksi',
                'answer_errorstatus'=>'0',
                'answer_outputstatus'=>'1'
            ], [
                'id_unit'=>2,
                'description'=>'Variable Part 1',
                'tipe_soal'=>'1',
                'question'=>'Cara prgrammer memberikan informasi pribadi tentang kode program yang ditulis adalah dengan menggunakan ...',
                'answer'=>'komentar',
                'embed_url'=>'https://youtu.be/m8viqR-PuI4'
            ], [
                'id_unit'=>2,
                'description'=>'Variable Part 2',
                'tipe_soal'=>'1',
                'question'=>'Berdasarkan video yang diputar, nama variable tidak boleh diawali dengan ..',
                'answer'=>'angka',
                'embed_url'=>'https://youtu.be/m8viqR-PuI4'
            ], [
                'id_unit'=>2,
                'description'=>'Variable Part 3 (Membuat dan Mencetak Variable)',
                'tipe_soal'=>'2',
                'question'=>'Buatlah program sesuai dengan instruksi',
                'answer_errorstatus'=>'0',
                'answer_outputstatus'=>'1'
            ], [
                'id_unit'=>3,
                'description'=>'Data Types Part 1',
                'tipe_soal'=>'1',
                'question'=>'Berdasarkan video yang diputar, untuk membuat variable String, dapat langsung ditulis isinya menggunakan tanda baca ..',
                'answer'=>'quotes petik',
                'embed_url'=>'https://youtu.be/PBiQd6aVa74'
            ], [
                'id_unit'=>3,
                'description'=>'Data Types Part 2 (Mencetak Variable String)',
                'tipe_soal'=>'2',
                'question'=>'Buatlah program sesuai dengan instruksi',
                'answer_errorstatus'=>'0',
                'answer_outputstatus'=>'1'
            ],[
                'id_unit'=>3,
                'description'=>'Data Types Part 3',
                'tipe_soal'=>'1',
                'question'=>'Berdasarkan video yang diputar, untuk membuat variable Integer, dapat ditulis langsung ... sebagai isinya',
                'answer'=>'angka',
                'embed_url'=>'https://youtu.be/_Al0A4IXTpQ'
            ], [
                'id_unit'=>3,
                'description'=>'Data Types Part 4 (Mencetak Variable Numbering)',
                'tipe_soal'=>'2',
                'question'=>'Buatlah program sesuai dengan instruksi',
                'answer_errorstatus'=>'0',
                'answer_outputstatus'=>'1'
            ],[
                'id_unit'=>3,
                'description'=>'Data Types Part 5 (Math Method)',
                'tipe_soal'=>'1',
                'question'=>'Berdasarkan video yang diputar, method yang digunakan untuk menentukan angka random dari suatu range angka adalah...',
                'answer'=>'rand()',
                'embed_url'=>'https://youtu.be/wIc3mlUqHQA'
            ], [
                'id_unit'=>3,
                'description'=>'Data Types Part 6 (Operasi method Math pada PHP)',
                'tipe_soal'=>'2',
                'question'=>'Buatlah program sesuai dengan instruksi',
                'answer_errorstatus'=>'0',
                'answer_outputstatus'=>'1'
            ],[
                'id_unit'=>3,
                'description'=>'Data Types Part 7 (String Method)',
                'tipe_soal'=>'1',
                'question'=>'Berdasarkan video yang diputar, method yang digunakan untuk mengganti suatu kata dengan kata lain adalah...',
                'answer'=>'str_replace()',
                'embed_url'=>'https://youtu.be/zE8uCShBZW0'
            ],[
                'id_unit'=>3,
                'description'=>'Data Types Part 8 (Boolean)',
                'tipe_soal'=>'1',
                'question'=>'Berdasarkan video yang diputar, dalam menuliskan nilai variable boolean tidak boleh munggunakan tanda baca ...',
                'answer'=>'kutip',
                'embed_url'=>'https://youtu.be/zE8uCShBZW0'
            ], [
                'id_unit'=>3,
                'description'=>'Data Types Part 9 (Operasi method String pada PHP)',
                'tipe_soal'=>'2',
                'question'=>'Buatlah program sesuai dengan instruksi',
                'answer_errorstatus'=>'0',
                'answer_outputstatus'=>'1'
            ],[
                'id_unit'=>4,
                'description'=>'Operators Part 1',
                'tipe_soal'=>'1',
                'question'=>'Berdasarkan video yang diputar, operator yang digunakan untuk increment bertambah suatu variable adalah...',
                'answer'=>'++',
                'embed_url'=>'https://youtu.be/ljz90HYEPyM'
            ], [
                'id_unit'=>4,
                'description'=>'Operators Part 2 (Operasi Variable pada PHP)',
                'tipe_soal'=>'2',
                'question'=>'Buatlah program sesuai dengan instruksi',
                'answer_errorstatus'=>'0',
                'answer_outputstatus'=>'1'
            ],[
                'id_unit'=>5,
                'description'=>'Arrays Part 1',
                'tipe_soal'=>'1',
                'question'=>'Berdasarkan video yang diputar, method array yang digunakan untuk mencetak keseluruhan body suatu array adalah...',
                'answer'=>'print_r()',
                'embed_url'=>'https://youtu.be/vWsO7QbgcOA'
            ],[
                'id_unit'=>5,
                'description'=>'Arrays Part 2(Metode Array)',
                'tipe_soal'=>'1',
                'question'=>'Berdasarkan video yang diputar, metode array yang digunakan untuk mengurutkan nilai element array dari yang terkecil hingga terbesar adalah...',
                'answer'=>'sort()',
                'embed_url'=>'https://youtu.be/leog-wPnyZU'
            ],[
                'id_unit'=>5,
                'description'=>'Arrays Part 3(Asssociative Array)',
                'tipe_soal'=>'1',
                'question'=>'Berdasarkan video yang diputar, perbedaan array dan associative array adalah dengan menggunakan ... sebgai pengganti nomor index pada array',
                'answer'=>'key',
                'embed_url'=>'https://youtu.be/6RxYyPl3z-A'
            ],[
                'id_unit'=>5,
                'description'=>'Arrays Part 4(Multidimensional Array)',
                'tipe_soal'=>'1',
                'question'=>'Berdasarkan video yang diputar, Pembuatan bentuk matriks bisa menggunakan konsep seperti pada ... array',
                'answer'=>'multidimensional',
                'embed_url'=>'https://youtu.be/LmYTFNM0HA4'
            ],[
                'id_unit'=>6,
                'description'=>'Conditionals Part 1 (if dan else)',
                'tipe_soal'=>'1',
                'question'=>'Berdasarkan video yang diputar, Contoh masalah apakah yang digunakan dalam mengimplementasikan if dan else?',
                'answer'=>'login',
                'embed_url'=>'https://youtu.be/lD7Jw3uppH8'
            ],[
                'id_unit'=>6,
                'description'=>'Conditionals Part 2 (Operator logika)',
                'tipe_soal'=>'1',
                'question'=>'Berdasarkan video yang diputar, operator logika apakah yang digunakan untuk menguji kecocokan tipe data sekaligus nilai variablenya?',
                'answer'=>'===',
                'embed_url'=>'https://youtu.be/AYxN25oFXqw'
            ]

        ];
        foreach ($courses as $course){
            Course::create($course);
        }
    }
}
