@extends('layout.masterdocs')
@section('content')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="title">
                        <h4>Documentation</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Documentation</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="blog-wrap">
            <div class="container pd-0">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <div class="blog-detail mb-30">
                            <div class="blog-img">
                                <img src="{{asset('theme/src/images/dashboard.png')}}" alt="">
                            </div>
                            <div class="blog-caption">
                                <h4 class="mb-10">Getting Started</h4>
                                <p>Dokumentasi ini dibuat untuk dijadikan pedoman penggunaan bagi peserta didik untuk menggunakan aplikasi pendukung pembelajaran adaptif pemrograman web PHP Intelligent Tutor</p>
                                <h5 class="mb-10" id="pretest"><strong>Pretest</strong></h5>
                                <p>Setelah mendaftar, peserta didik akan langsung diberikan rekomendasi untuk mengerjakan <i>pre-test</i>.
                                    Hal ini bertujuan agar aplikasi mengetahui sejauh mana peserta didik memahami bahasa pemrograman PHP</p>
                                <img src="{{asset('theme/src/images/pretes1.png')}}" alt="">
                                <p><i>Pre-test</i> yang diujikan adalah sejumlah 8 unit/chapter/bab yang dipilih dari topik bahasa <i>PHP basic programming</i>.
                                    Dengan tiap unitnya memiliki 5 butir soal dengan tipe soal pilihan ganda</p>
                                <img src="{{asset('theme/src/images/pretes2.png')}}" alt="">
                                <p>Setelah mengerjakan <i>pre-test</i> akan langsung diarahkan ke dashboard dan tampaklah nilai rata-rata <i>pre-test</i> peserta didik</p>
                                <img src="{{asset('theme/src/images/pretes3.png')}}" alt="">


                                <h5 class="mb-10" id="course"><strong>Courses</strong></h5>
                                <p>Setelah mengerjakan <i>pre-test</i>, peserta didik diharapkan akan mengambil course/pelajaran yang sesuai dengan tingkat kemampuannya,
                                halaman course bisa diakses dengan menggunakan beberapa langkah dibawah:</p>
                                <ul>
                                    <li><p>Melalui Halaman Dashboard:</p>
                                        <img src="{{asset('theme/src/images/course1.png')}}" alt=""></li>
                                    <li><p>Melalui Sidebar:</p>
                                        <img src="{{asset('theme/src/images/course2.png')}}" alt=""></li>
                                </ul>
                                <p>Ini adalah tampilan halaman course peserta didik, tujuan akhir dari aplikasi ini adalah <strong> Final Exam</strong>. Jadi dibutuhkan syarat utama agar bisa mengikutin Final Exam,
                                    yaitu menyelesaikan rekomendasi unit/bab/materi belajar pada aplikasi sejumlah progres(<span class="text-primary">lihar garis biru pada gambar dibawah</span>) atau status unit yang terbilang
                                    "<strong>Not Finished</strong>(<span class="text-danger">lihar garis merah pada gambar dibawah</span>)" yang sudah ditentukan berdasarkan <i>pre-test</i> sebelumnya.</p>
                                <img src="{{asset('theme/src/images/course3.png')}}" alt="">
                                <p>Untuk unit lain bisa diambil peserta didik jika peserta didik ingin mempelajari hal lain dalam pemrograman PHP.</p>
                                <p>Selanjutnya, peserta didik akan memasuki halaman course tiap unit yang terlihat seperti gambar dibawah:</p>
                                <img src="{{asset('theme/src/images/course4.png')}}" alt="">
                                <p>Dengan penjelasan sebagai berikut</p>
                                <ol>
                                    <li>Learning outcome merupakan target yang diharapkan tercipta dari peserta didik setelah menyelesaikan course ini</li>
                                    <li>Progress Stage merupakan tracker dari apa yang telah peserta didik kerjakan dalam unit ini</li>
                                    <li>Navigation Course merupakan daftar course yang tersedia dalam suatu unit/bab/materi</li>
                                    <li>Choose Course digunakan untuk kembali ke halaman "<strong>Take Course</strong>" sebelumnya</li>
                                </ol>
                                <p>Berikut adalah beberapa tipe course yang akan peserta didik temui dalam PHP Intelligent Tutor:</p>
                                <ol>
                                    <li><p>Video Course</p>
                                        <img src="{{asset('theme/src/images/course5.png')}}" alt="">
                                        <p>Pada jenis course ini, peserta didik akan diberikan video untuk dipelajari dan menjawab soal isian singkat</p>
                                        <img src="{{asset('theme/src/images/course6.png')}}" alt="">
                                    </li>
                                    <li><p>Theory Course</p>
                                        <img src="{{asset('theme/src/images/course7.png')}}" alt="">
                                        <p>Pada jenis course ini, peserta didik akan diberikan beberapa teori dan contoh soal untuk dipelajari dan menjawab soal isian singkat</p>
                                        <img src="{{asset('theme/src/images/course6.png')}}" alt="">
                                    </li>
                                    <li><p><i>Live-coding</i> Course</p>
                                        <img src="{{asset('theme/src/images/course8.png')}}" alt="">
                                        <p>Pada jenis course ini, peserta didik akan diberikan soal yang simpel namun beberapa merupakan soal pemecahan masalah yang akan dijawab dengan menuliskan sintaks PHP.
                                        Course ini mempunyai beberapa kriteria penilaian sebagai berikut:</p>
                                        <ul>
                                            <li><p>Syntax Error</p>
                                                <img src="{{asset('theme/src/images/course9.png')}}" alt="">
                                            </li>
                                            <li><p>Algorithm Error</p>
                                                <img src="{{asset('theme/src/images/course9a.png')}}" alt="">
                                            </li>
                                            <li><p>Correct Answer</p>
                                                <img src="{{asset('theme/src/images/course9b.png')}}" alt="">
                                            </li>
                                        </ul>
                                    </li>
                                </ol>
                                <p>Peserta didik diharapkan untuk menyelesaikan course wajib agar bisa mengambil Final Test seperti pada gambar di bawah</p>
                                <img src="{{asset('theme/src/images/course10.png')}}" alt="">

                                <h5 class="mb-10" id="finaltest"><strong>Final Test</strong></h5>
                                <p>Final Test dibagi menjadi 2 bagian, yaitu:</p>
                                <ol>
                                    <li><h6>Multiple Choices Test</h6>
                                        <p>Section 1 ini berisi 20 soal pilihan ganda dengan waktu perbutir soalnya berkisar 60 sampai 120 detik</p>
                                        <img src="{{asset('theme/src/images/finaltes1.png')}}" alt="">
                                    </li>
                                    <li><h5>Live Code Test</h5>
                                        <p>Section 2 ini berisi 1 soal pemecahan masalah dengan waktu 20 menit terhitung setelah menekan tombol start seperti pada gambar dibawah.</p>
                                        <img src="{{asset('theme/src/images/finaltes2.png')}}" alt="">
                                        <p>Setelah selesai mengerjakan Final Test, peserta didik akan diarahkan pada halaman achievements seperti pada gambar dibawah,
                                        dan pembelajaran peserta didik pemrograman web menggunakan PHP Intelligent Tutor telah <strong>Selesai</strong></p>
                                        <img src="{{asset('theme/src/images/finaltes3.png')}}" alt="">
                                    </li>
                                </ol>
                                <h5 class="mb-10" id="setting"><strong>Profile Setting</strong></h5>
                                <p>Digunakan untuk mengubah nama lengkap dan foto profil(avatar) user seperti pada gambar dibawah</p>
                                <ol>
                                    <li><p>Buka navbar dipojok kanan atas->pilih settings</p>
                                        <img src="{{asset('theme/src/images/setting1.png')}}" alt="">
                                    </li>
                                    <li><p>Ubah Data dan klik "update" </p>
                                        <img src="{{asset('theme/src/images/setting2.png')}}" alt="">
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">

                        <div class="bg-white border-radius-4 box-shadow mb-30">
                            <h5 class="pd-20"><strong>Documentation Navigator</strong></h5>
                            <div class="latest-post">
                                <ul>
                                    <li>
                                        <h4><a href="#pretest">How to take your Pretest</a></h4>
                                        <span></span>
                                    </li>
                                    <li>
                                        <h4><a href="#course">How to take your Course</a></h4>
                                        <span></span>
                                    </li>
                                    <li>
                                        <h4><a href="#finaltest">How to take your Final Test</a></h4>
                                        <span></span>
                                    </li>
                                    <li>
                                        <h4><a href="#setting">How to customize you profile in Setting</a></h4>
                                        <span></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
