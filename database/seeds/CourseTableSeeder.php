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
                'question'=>'Buatlah program untuk mencetak "Hello PHP Intelligent Tutor" kedalam sebuah VARIABEL bertipe data STRING, kemudian cetak variabelnya!',
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
                'question'=>'Buatlah 2 variable $a dan $b yang berisi berturut-turut : "Pendidikan Teknik", dan "Informatika dan Komputer". Setelah itu cetak keduanya menjadi "Pendidikan Teknik Informatika dan Komputer"',
                'answer'=>'Pendidikan Teknik Informatika dan Komputer',
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
                'question'=>'Buatlah program dengan ketentuan sebagai berikut: Diketahui jari-jari lingkaran dalam variabel $r adalah 25 dan phi dalam variabel $phi adalah 3.14. Hitung luas lingkarannya, dan cetak luas lingkarannya',
                'answer' => '1962.5',
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
                'question'=>'Buatlah program dengan ketentuan sebagai berikut: Diketahui jari-jari lingkaran dalam variabel $r adalah 18 dan phi dalam variabel $phi adalah 3.14. Hitung dan cetak luas lingkaran serta lakukan pembulatan dengan fungsi Math ROUND pada php!',
                'answer'=>1017,
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
                'question'=>'Buatlah sebuah variabel String $sample yang berisi "Happy learning with PHP Intelligent Tutor". Kemudian hitung dan cetak berapakah jumlah karakter pada variabel $sample menggunakan fungsi method String PHP!',
                'answer'=>41,
                'answer_errorstatus'=>'0',
                'answer_outputstatus'=>'1'
            ],[
                'id_unit'=>4,
                'description'=>'Operators Part 1',
                'tipe_soal'=>1,
                'question'=>'Berdasarkan video yang diputar, operator matematika yang digunakan untuk increment (bertambah satu) suatu variable adalah...',
                'answer'=>'++',
                'embed_url'=>'ljz90HYEPyM'
            ], [
                'id_unit'=>4,
                'description'=>'Operators Part 2 (Operasi Variable pada PHP)',
                'tipe_soal'=>2,
                'question'=>'Diketahui variabel $a memiliki nilai samadengan 4 dan variabel $b memiliki nilai 8. HITUNG dan CETAK variabel $a yang ditambah dengan variabel (nilai TETAP DALAM VARIABEL $a, ikuti cara dalam video "Operator Part 1")',
                'answer' => 12,
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
                'description'=>'Arrays Part 2 (Metode Array)',
                'tipe_soal'=>1,
                'question'=>'Berdasarkan video yang diputar, metode array yang digunakan untuk mengurutkan nilai element array dari yang terkecil hingga terbesar adalah...',
                'answer'=>'sort',
                'embed_url'=>'leog-wPnyZU'
            ],[
                'id_unit'=>5,
                'description'=>'Arrays Part 3 (Asssociative Array)',
                'tipe_soal'=>1,
                'question'=>'Berdasarkan video yang diputar, perbedaan array dan associative array adalah dengan menggunakan ... sebagai pengganti nomor index pada array',
                'answer'=>'key',
                'embed_url'=>'6RxYyPl3z-A'
            ],[
                'id_unit'=>5,
                'description'=>'Arrays Part 4 (Multidimensional Array)',
                'tipe_soal'=>1,
                'question'=>'Berdasarkan video yang diputar, Pembuatan bentuk matriks bisa menggunakan konsep seperti pada ... array',
                'answer'=>'multidimensional',
                'embed_url'=>'LmYTFNM0HA4'
            ],[
                'id_unit'=>5,
                'description'=>'Arrays Part 5 (Implementasi Array)',
                'tipe_soal'=>2,
                'question'=>'(Lihat kembali course part 3 pada unit ini) Seekor ikan memiliki kelas pisces, dan berhabitat di air, selain itu seekor ikan memiliki alat gerak berupa sirip. Buatlah array assosiative dari ikan, yang memiliki kelas, habitat, dan alat_gerak sebagai KEY, serta isikan value sesuai dengan penjelasan sebelumnya. Setelah itu cetaklah nilai(value) habitat dari array ikan!',
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
                'question'=>'Berdasarkan video yang diputar, untuk membuat suatu logika dengan if yang bercabang, dapat ditempatkan di dalam .... (if/else if/else/semua benar) yang memenuhi syarat sebelumnya(pilih jawaban)',
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
                'question'=>'Nilai ujian Matematika ditentukan dengan aturan berikut: Jika nilai kurang dari 50 bernilai E, untuk mendapat nilai A harus menempuh angka minimal 90, dibawah itu mendapat nilai B sampai pada angka 75, sedangkan nilai C diperoleh dari angka 70 sampai 74, Dan nilai D berada diantara jarak nilai C dan E. Jika Tony mendapat nilai 64 dalam ujian (dinyatakan sebagai variabel $score). Berapakah nilai Tony? Buatlah program untuk mencetak nilai Tony!',
                'answer' => 'D',
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
                'question'=>'Berdasarkan video yang diputar,dapat dirangkum sebagai berikut 1) do..while, 2) while..do.. diantara keduanya, yang memungkinkan pengeksekusian minimal 1x sebelum pengecekan syarat adalah....(1/2)(pilih jawaban)',
                'answer'=>'1',
                'embed_url'=>'ewSN2S-jnaM'
            ],[
                'id_unit'=>7,
                'description'=>'Looping Part 4 (Latihan Soal)',
                'tipe_soal'=>2,
                'question'=>'Diberikan array sebagai berikut :
$arr = array(\'biru\',\'kuning\',\'merah\',\'hijau\',\'ungu\');
Tuliskan kode program untuk menampilkan output seperti dibawah ini:',
                'answer'=>'biru<br>kuning<br>merah<br>hijau<br>ungu<br>',
                'answer_errorstatus'=>'0',
                'answer_outputstatus'=>'1'
            ],[
                'id_unit'=>8,
                'description'=>'Superglobals Part 1 ($GLOBALS)',
                'tipe_soal'=>3,
                'question'=>'Output kode yang diberikan adalah..',
                'answer'=>35,
                'embed_url'=>'33_soal.png',

            ],[
                'id_unit'=>8,
                'description'=>'Superglobals Part 2 ($_SERVER)',
                'tipe_soal'=>3,
                'question'=>'index "X" yang tepat dengan output yang diinginkan adalah...',
                'answer'=>'HTTP_USER_AGENT',
                'embed_url'=>'34_soal.png',
            ],[
                'id_unit'=>8,
                'description'=>'Superglobals Part 3 ($_REQUEST)',
                'tipe_soal'=>3,
                'question'=>'Disedikan kode  <?php echo $_REQUEST["x"] ?> namun yang terjadi adalah ERROR. Untuk mengambil  nilai dari tag input agar tidak error, "x" harus diganti dengan..',
                'answer'=>'warna',
                'embed_url'=>'35_soal.png',
            ],[
                'id_unit'=>8,
                'description'=>'Superglobals Part 4 ($_POST&$_GET)',
                'tipe_soal'=>3,
                'question'=>'Apakah Kode diatas error> pilih:(ya/tidak)',
                'answer'=>'ya',
                'embed_url'=>'36_soal.png',
            ]
        ];


        foreach ($courses as $course){
            Course::create($course);
        }


        $coursedetail = [
            [
                'id_course' =>33,
                'materi' =>'$GLOBALS adalah superglobal variabel PHP yang digunakan untuk mengakses variabel global dari mana saja pada script PHP (dari dalam maupun luar fungsi pula)',
                'question' =>'PHP menyimpan semua variabel global kedalam sebuah array yang disebut $GLOBALS[index] dimana "index" ini adalah nama variabel itu sendiri.

Contoh di bawah menunjukkan cara menggunakan variabel superglobal $GLOBALS:',
                'answer' => '33.png',
            ],
            [
                'id_course' =>34,
                'materi' =>'$_SERVER adalah variabel super global PHP yang menyimpan informasi tentang header, path, dan lokasi script PHP.',
                'question' =>'Contoh di bawah ini menunjukkan cara menggunakan beberapa elemen di $_SERVER:',
                'answer' => '34.png',
            ],
            [
                'id_course' =>35,
                'materi' =>'PHP $_REQUEST adalah variabel super global PHP yang digunakan untuk mengumpulkan data setelah mengirimkan form HTML. Contoh di bawah ini menunjukkan form dengan input dan tombol submit. Saat pengguna mengirimkan data dengan mengklik "Kirim", data formulir dikirim ke file yang ditentukan dalam atribut action dari tag form',
                'question' =>'Dalam contoh ini, kami arahkan ke file ini sendiri untuk memproses data formulir. Jika Anda ingin menggunakan file PHP lain untuk memproses data formulir, gantilah dengan nama file pilihan Anda. Lalu, kita bisa menggunakan variabel super global $_REQUEST untuk mengumpulkan nilai dari tag input:
',
                'answer' => '35.png',
            ],
            [
                'id_course' =>36,
                'materi' =>'PHP $_POST adalah variabel super global PHP yang digunakan untuk mengumpulkan data formulir setelah mengirimkan formulir HTML dengan metode = "post". $_POST juga banyak digunakan untuk mengirimkan variabel.',
                'question' =>'PHP $_GET adalah variabel super global PHP yang digunakan untuk mengumpulkan data formulir setelah mengirimkan formulir HTML dengan metode = "get". $ _GET juga dapat mengumpulkan data yang dikirim dalam URL',
                'answer' => '36.png',
            ],
        ];
        foreach ($coursedetail as $cd){
            CourseDetail::create($cd);
        }
    }
}
