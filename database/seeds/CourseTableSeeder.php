<?php

use Illuminate\Database\Seeder;
use App\Course;
use App\Unit;
use App\CourseDetail;

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
                'tipe_soal'=>1,
                'question'=>'Berdasarkan video yang diputar, PHP adalah bahasa scripting/program yang dijalankan/diproses oleh ...?',
                'answer'=>'server',
                'embed_url'=>'JEvlT5du2Ec'
            ], [
                'id_unit'=>1,
                'description'=>'Introduction Part 2',
                'tipe_soal'=>1,
                'question'=>'Berdasarkan video yang diputar, Apakah nama root folder yang digunakan untuk menyimpan folder atau file yang akan dijalankan pada server lokal?',
                'answer'=>'htdocs',
                'embed_url'=>'cOJ8fwR-BSA'
            ], [
                'id_unit'=>1,
                'description'=>'Introduction Part 3 (Mencetak Hello World)',
                'tipe_soal'=>2,
                'question'=>'Buatlah program PHP pertama anda dan cetaklah "Hello World" menggunakan fungsi php echo',
                'answer'=>'Hello World',
                'answer_errorstatus'=>'0',
                'answer_outputstatus'=>'1'
            ], [
                'id_unit'=>2,
                'description'=>'Variable & Comment Part 1',
                'tipe_soal'=>1,
                'question'=>'Berdasarkan video yang diputar, Cara programmer memberikan informasi pribadi tentang kode program yang ditulis adalah dengan menggunakan ...',
                'answer'=>'komentar',
                'embed_url'=>'m8viqR-PuI4'
            ], [
                'id_unit'=>2,
                'description'=>'Variable & Comment Part 2',
                'tipe_soal'=>1,
                'question'=>'Berdasarkan video yang diputar, nama variable tidak boleh diawali dengan ..',
                'answer'=>'angka',
                'embed_url'=>'m8viqR-PuI4'
            ], [
                'id_unit'=>2,
                'description'=>'Variable & Comment Part 3 (Membuat dan Mencetak Variable)',
                'tipe_soal'=>2,
                'question'=>'Buatlah program untuk mencetak "Hello PHP Intelligent Tutor" kedalam sebuah VARIABEL STRING',
                'answer' => "Hello PHP Intelligent Tutor",
                'answer_errorstatus'=>'0',
                'answer_outputstatus'=>'1'
            ], [
                'id_unit'=>3,
                'description'=>'Data Types Part 1',
                'tipe_soal'=>1,
                'question'=>'Berdasarkan video yang diputar, Tipe data apakah yang sedang dijelaskan..?',
                'answer'=>'String',
                'embed_url'=>'PBiQd6aVa74'
            ], [
                'id_unit'=>3,
                'description'=>'Data Types Part 2 (Mencetak Variable String)',
                'tipe_soal'=>2,
                'question'=>'Buatlah program sesuai dengan instruksi',
                'answer_errorstatus'=>'0',
                'answer_outputstatus'=>'1'
            ],[
                'id_unit'=>3,
                'description'=>'Data Types Part 3',
                'tipe_soal'=>1,
                'question'=>'Berdasarkan video yang diputar, Tipe data apakah yang sedang dijelaskan..?(isikan keduanya)',
                'answer'=>'integer-float',
                'correct_count'=>2,
                'embed_url'=>'_Al0A4IXTpQ'
            ], [
                'id_unit'=>3,
                'description'=>'Data Types Part 4 (Mencetak Variable Numbering)',
                'tipe_soal'=>2,
                'question'=>'Buatlah program sesuai dengan instruksi',
                'answer_errorstatus'=>'0',
                'answer_outputstatus'=>'1'
            ],[
                'id_unit'=>3,
                'description'=>'Data Types Part 5 (Math Method)',
                'tipe_soal'=>1,
                'question'=>'Berdasarkan video yang diputar, method yang digunakan untuk menentukan angka random dari suatu range angka adalah...',
                'answer'=>'rand',
                'embed_url'=>'wIc3mlUqHQA'
            ], [
                'id_unit'=>3,
                'description'=>'Data Types Part 6 (Operasi method Math pada PHP)',
                'tipe_soal'=>2,
                'question'=>'Buatlah program sesuai dengan instruksi',
                'answer_errorstatus'=>'0',
                'answer_outputstatus'=>'1'
            ],[
                'id_unit'=>3,
                'description'=>'Data Types Part 7 (String Method)',
                'tipe_soal'=>1,
                'question'=>'Berdasarkan video yang diputar, method yang digunakan untuk mengganti suatu kata dengan kata lain adalah...',
                'answer'=>'str_replace',
                'embed_url'=>'zE8uCShBZW0'
            ],[
                'id_unit'=>3,
                'description'=>'Data Types Part 8 (Boolean)',
                'tipe_soal'=>1,
                'question'=>'Berdasarkan video yang diputar, dalam menuliskan nilai variable boolean tidak boleh munggunakan tanda baca ...',
                'answer'=>'kutip',
                'embed_url'=>'nIbRLSiNRnk'
            ], [
                'id_unit'=>3,
                'description'=>'Data Types Part 9 (Operasi method String pada PHP)',
                'tipe_soal'=>2,
                'question'=>'Buatlah program sesuai dengan instruksi',
                'answer_errorstatus'=>'0',
                'answer_outputstatus'=>'1'
            ],[
                'id_unit'=>4,
                'description'=>'Operators Part 1',
                'tipe_soal'=>1,
                'question'=>'Berdasarkan video yang diputar, operator yang digunakan untuk increment bertambah suatu variable adalah...',
                'answer'=>'++',
                'embed_url'=>'ljz90HYEPyM'
            ], [
                'id_unit'=>4,
                'description'=>'Operators Part 2 (Operasi Variable pada PHP)',
                'tipe_soal'=>2,
                'question'=>'Buatlah program sesuai dengan instruksi',
                'answer_errorstatus'=>'0',
                'answer_outputstatus'=>'1'
            ],[
                'id_unit'=>5,
                'description'=>'Arrays Part 1',
                'tipe_soal'=>1,
                'question'=>'Berdasarkan video yang diputar, method array yang digunakan untuk mencetak keseluruhan body suatu array adalah...',
                'answer'=>'print_r',
                'embed_url'=>'vWsO7QbgcOA'
            ],[
                'id_unit'=>5,
                'description'=>'Arrays Part 2(Metode Array)',
                'tipe_soal'=>1,
                'question'=>'Berdasarkan video yang diputar, metode array yang digunakan untuk mengurutkan nilai element array dari yang terkecil hingga terbesar adalah...',
                'answer'=>'sort',
                'embed_url'=>'leog-wPnyZU'
            ],[
                'id_unit'=>5,
                'description'=>'Arrays Part 3(Asssociative Array)',
                'tipe_soal'=>1,
                'question'=>'Berdasarkan video yang diputar, perbedaan array dan associative array adalah dengan menggunakan ... sebgai pengganti nomor index pada array',
                'answer'=>'key',
                'embed_url'=>'6RxYyPl3z-A'
            ],[
                'id_unit'=>5,
                'description'=>'Arrays Part 4(Multidimensional Array)',
                'tipe_soal'=>1,
                'question'=>'Berdasarkan video yang diputar, Pembuatan bentuk matriks bisa menggunakan konsep seperti pada ... array',
                'answer'=>'multidimensional',
                'embed_url'=>'LmYTFNM0HA4'
            ],[
                'id_unit'=>5,
                'description'=>'Arrays Part 5 (Implementasi Array)',
                'tipe_soal'=>2,
                'question'=>'Buatlah program sesuai dengan instruksi',
                'answer_errorstatus'=>'0',
                'answer_outputstatus'=>'1'
            ],[
                'id_unit'=>6,
                'description'=>'Conditionals Part 1 (if dan else)',
                'tipe_soal'=>1,
                'question'=>'Berdasarkan video yang diputar, Contoh masalah apakah yang digunakan dalam mengimplementasikan if dan else?',
                'answer'=>'login',
                'embed_url'=>'lD7Jw3uppH8'
            ],[
                'id_unit'=>6,
                'description'=>'Conditionals Part 2 (Operator logika)',
                'tipe_soal'=>1,
                'question'=>'Berdasarkan video yang diputar, operator logika apakah yang digunakan untuk menguji kecocokan tipe data sekaligus nilai variablenya?',
                'answer'=>'===',
                'embed_url'=>'AYxN25oFXqw'
            ],[
                'id_unit'=>6,
                'description'=>'Conditionals Part 3 (Multiple kondisi)',
                'tipe_soal'=>1,
                'question'=>'Berdasarkan video yang diputar, untuk menulis suatu kondisi bisa menggunakan kondisi dengan if, else, dan ...',
                'answer'=>'else if',
                'embed_url'=>'mbZalZ9clzk'
            ],[
                'id_unit'=>6,
                'description'=>'Conditionals Part 4 (If Bercabang)',
                'tipe_soal'=>1,
                'question'=>'Berdasarkan video yang diputar, untuk membuat suatu logika dengan if yang bercabang, dapat ditempatkan di dalam .... (if/else if/else/semua benar) yang memenuhi syarat sebelumnya',
                'answer'=>'semua benar',
                'embed_url'=>'X_DcaCIs4-s'
            ],[
                'id_unit'=>6,
                'description'=>'Conditionals Part 5 (Switch Case)',
                'tipe_soal'=>1,
                'question'=>'Berdasarkan video yang diputar, setelah memenuhi syarat, eksekusi dalam switch case diakhiri dengan ....',
                'answer'=>'break',
                'embed_url'=>'vXbiQsd3sc8'
            ],[
                'id_unit'=>6,
                'description'=>'Conditionals Part 6 (Latihan Soal)',
                'tipe_soal'=>2,
                'question'=>'Buatlah program sesuai dengan instruksi',
                'answer_errorstatus'=>'0',
                'answer_outputstatus'=>'1'
            ],[
                'id_unit'=>7,
                'description'=>'Looping Part 1 (for Loop)',
                'tipe_soal'=>1,
                'question'=>'diberikan kode sebagai berikut for(x ; y; z). Berdasarkan video yang diputar, yang merupakan tempat sebuah variabel melakukan increment(perubahan) ada dibagian ....',
                'answer'=>'z',
                'embed_url'=>'0dlEeOfSOJQ'
            ],[
                'id_unit'=>7,
                'description'=>'Looping Part 2 (foreach Loop)',
                'tipe_soal'=>1,
                'question'=>'Berdasarkan video yang diputar, di dalam foreach tidak membutuhkan insiasi variable, batasan perulangan, dan increment, tetapi hanya menggunakan 1 kata kunci, yaitu ....',
                'answer'=>'as',
                'embed_url'=>'pmn7OGy4xao'
            ],[
                'id_unit'=>7,
                'description'=>'Looping Part 3 (while..do.. dan do..while..)',
                'tipe_soal'=>1,
                'question'=>'Berdasarkan video yang diputar,dapat dirangkum sebagai berikut 1) do..while, 2) while..do.. diantara keduanya, yang memungkinkan pengeksekusian minimal 1x sebelum pengecekan syarat adalah....(1/2)',
                'answer'=>'1',
                'embed_url'=>'ewSN2S-jnaM'
            ],[
                'id_unit'=>7,
                'description'=>'Looping Part 4 (Latihan Soal)',
                'tipe_soal'=>2,
                'question'=>'Buatlah program sesuai dengan instruksi',
                'answer_errorstatus'=>'0',
                'answer_outputstatus'=>'1'
            ],[
                'id_unit'=>8,
                'description'=>'Superglobals Part 1 ($GLOBALS)',
                'tipe_soal'=>3,
            ],[
                'id_unit'=>8,
                'description'=>'Superglobals Part 2 ($_SERVER)',
                'tipe_soal'=>3,
            ],[
                'id_unit'=>8,
                'description'=>'Superglobals Part 1 ($_REQUEST)',
                'tipe_soal'=>3,
            ],[
                'id_unit'=>8,
                'description'=>'Superglobals Part 1 ($_POST dan $_GET)',
                'tipe_soal'=>3,
            ]
        ];


        foreach ($courses as $course){
            Course::create($course);
        }


        $coursedetail = [
            [
                'id_course' =>33,
                'materi' =>'$GLOBALS adalah..',
                'question' =>'Bagaimanakah blablablabla?',
                'answer' => 'blablabla',
            ],
            [
                'id_course' =>34,
                'materi' =>'$_SERVER adalah..',
                'question' =>'Bagaimanakah blablablabla?',
                'answer' => 'blablabla',
            ],
            [
                'id_course' =>35,
                'materi' =>'$_REQUEST adalah..',
                'question' =>'Bagaimanakah blablablabla?',
                'answer' => 'blablabla',
            ],
            [
                'id_course' =>36,
                'materi' =>'$_GET adalah.. dan $_POST adalah',
                'question' =>'Bagaimanakah blablablabla?',
                'answer' => 'blablabla',
            ],
        ];
        foreach ($coursedetail as $cd){
            CourseDetail::create($cd);
        }
    }
}
