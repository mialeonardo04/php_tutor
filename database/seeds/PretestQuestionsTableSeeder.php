<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Quiz;
use App\Question;
use App\Choice;
use App\Answer;

class PretestQuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name'=>'pretest'],
            ['name'=>'posttest']
        ];
        foreach ($categories as $category) {
            Category::create($category);
        }

        $quizzes=[
            ['id_category'=>1, 'name'=>'Pretest1'],
            ['id_category'=>2, 'name'=>'Posttest1'],
        ];

        foreach ($quizzes as $quiz){
            Quiz::create($quiz);
        }

        $questions = [
            ['id_unit'=>1,'id_quiz'=>1,'text'=>'Ekstensi untuk file PHP adalah..'],
            ['id_unit'=>1,'id_quiz'=>1,'text'=>'Dalam membuat baris kode PHP diakhiri dengan tanda baca apa?'],
            ['id_unit'=>1,'id_quiz'=>1,'text'=>'Manakah diantara keyword dibawah yang memiliki sifat case-sensitive dalam PHP?'],
            ['id_unit'=>1,'id_quiz'=>1,'text'=>'Manakah yang bukan merupakan cara untuk memberi comment pada baris kode PHP?'],
            ['id_unit'=>1,'id_quiz'=>1,'text'=>'Apakah Kepanjangan dari PHP?'],
            ['id_unit'=>2,'id_quiz'=>1,'text'=>'Penulisan nama variabel dalam PHP diawali dengan tanda baca apa?'],
            ['id_unit'=>2,'id_quiz'=>1,'text'=>'Manakah penulisan nama variabel dalam PHP yang benar?'],
            ['id_unit'=>2,'id_quiz'=>1,'text'=>'Diantara contoh berikut, manakah contoh cara mencetak variabel yang salah dalam PHP?'],
            ['id_unit'=>2,'id_quiz'=>1,'text'=>'Manakah penulisan nama variable dalam PHP yang salah?'],
            ['id_unit'=>2,'id_quiz'=>1,'text'=>'Dalam membuat variabel pada PHP, tidak perlu mendeklarasikan..'],
            ['id_unit'=>3,'id_quiz'=>1,'text'=>'Berikut yang merupakan tipe data yang tidak support dalam bahasa PHP v5 adalah'],
            ['id_unit'=>3,'id_quiz'=>1,'text'=>'Tipe data yang tepat untuk menyimpan konstanta Π (phi) dalam bahasa PHP adalah'],
            ['id_unit'=>3,'id_quiz'=>1,'text'=>'Tipe data yang hanya memiliki kemungkinan 2 nilai untuk disimpan, merupakan tipe data..'],
            ['id_unit'=>3,'id_quiz'=>1,'text'=>'Fungsi dalam PHP yang digunakan untuk menghitung jumlah karakter pada sebuah String dalam PHP adalah'],
            ['id_unit'=>3,'id_quiz'=>1,'text'=>'Untuk menghitung jumlah kata yang ada pada kalimat, digunakan fungsi.'],
            ['id_unit'=>4,'id_quiz'=>1,'text'=>'Yang termasuk operator aritmatika dalam bahasa PHP adalah'],
            ['id_unit'=>4,'id_quiz'=>1,'text'=>'Yang termasuk Comparison Operator dalam bahasa PHP adalah'],
            ['id_unit'=>4,'id_quiz'=>1,'text'=>'Diberikan kode <?php define("PHPTUTOR", "Belajar dengan PHP I Tutor", true); ?> apakah kode yang digunakan untuk mencetak bagian "Belajar dengan PHP I Tutor" dengan fitur constants dari PHP?'],
            ['id_unit'=>4,'id_quiz'=>1,'text'=>'Diberikan kode <?php $x = "10"; $y = 6; echo "$x"+"$y";?> Hasil dari operasi hitung diatas adalah.'],
            ['id_unit'=>4,'id_quiz'=>1,'text'=>'Diberikan kode <?php $x = 3;  $y = 2; echo $x ** $y;?> Hasilnya adalah..'],
            ['id_unit'=>5,'id_quiz'=>1,'text'=>'Diketahui nilai variable $a adalah sebuah bilangan ril, dan nilai variable $b bergantung pada nilai variable $a, jika nilai variable $a 50 kebawah, maka variable $b bernilai "S" , jika lebih dari itu variable $b bernilai "SR". Bagaimana penulisan kode yang tepat untuk menentukan nilai variable $b?'],
            ['id_unit'=>5,'id_quiz'=>1,'text'=>'<?php $y = "1"; $x = $y > 1 ? "1" : "2"; echo $x+$y; ?> Apa output kodenya?'],
            ['id_unit'=>5,'id_quiz'=>1,'text'=>'<?php $y = 2; $x = $y >= 2 ? "1" : "2"; echo $x*$y; ?> Apa output kodenya?'],
            ['id_unit'=>5,'id_quiz'=>1,'text'=>'<?php $y = 13; $x = $y < 10 ? 4 : 3;  ?> Jika kode akan diubah menjadi bentuk switch dan case, bagaimanakah penulisannya?'],
            ['id_unit'=>5,'id_quiz'=>1,'text'=>'"else" dalam fungsi kondisional if bernilai sama dengan ... dalam kondisional pada switch dan case'],
            ['id_unit'=>6,'id_quiz'=>1,'text'=>'ekstensi untuk file PHP adalah'],
            ['id_unit'=>6,'id_quiz'=>1,'text'=>'ekstensi untuk file PHP adalah'],
            ['id_unit'=>6,'id_quiz'=>1,'text'=>'ekstensi untuk file PHP adalah'],
            ['id_unit'=>6,'id_quiz'=>1,'text'=>'ekstensi untuk file PHP adalah'],
            ['id_unit'=>6,'id_quiz'=>1,'text'=>'ekstensi untuk file PHP adalah'],
            ['id_unit'=>7,'id_quiz'=>1,'text'=>'ekstensi untuk file PHP adalah'],
            ['id_unit'=>7,'id_quiz'=>1,'text'=>'ekstensi untuk file PHP adalah'],
            ['id_unit'=>7,'id_quiz'=>1,'text'=>'ekstensi untuk file PHP adalah'],
            ['id_unit'=>7,'id_quiz'=>1,'text'=>'ekstensi untuk file PHP adalah'],
            ['id_unit'=>7,'id_quiz'=>1,'text'=>'ekstensi untuk file PHP adalah'],
            ['id_unit'=>8,'id_quiz'=>1,'text'=>'ekstensi untuk file PHP adalah'],
            ['id_unit'=>8,'id_quiz'=>1,'text'=>'ekstensi untuk file PHP adalah'],
            ['id_unit'=>8,'id_quiz'=>1,'text'=>'ekstensi untuk file PHP adalah'],
            ['id_unit'=>8,'id_quiz'=>1,'text'=>'ekstensi untuk file PHP adalah'],
            ['id_unit'=>8,'id_quiz'=>1,'text'=>'ekstensi untuk file PHP adalah'],
        ];

        foreach ($questions as $question){
            Question::create($question);
        }


    }
}
