
Survey
    .StylesManager
    .applyTheme("default");

var json = {
    title: "Final Test Section 1",
    showProgressBar: "bottom",
    showTimerPanel: "top",
    firstPageIsStarted: true,
    startSurveyText: "Start",
    pages: [
        {
            questions: [
                {
                    type: "html",
                    html: "Welcome to PHP Intelligent Tutor Final Test! <br/>" +
                        "This test used indonesian bahasa<br>" +
                        "This test consists of 20 multiple choice questions and 1 live coding task<br>"+
                        "You have 60 - 120 seconds for every question in the first section and 10 minutes in the second section. <br/>" +
                        "Please, click 'Start' button below when you are ready."
                }
            ]
        }, {
            maxTimeToFinish: 60,
            questions: [
                {
                    type: "radiogroup",
                    name: "one",
                    title: "Apakah Kepanjangan dari PHP?",
                    choicesOrder: "random",
                    choices: [
                        "Programming Hypertext Preprocessor", "PHP: Hypertext Preprocessor", "Preprocessor Hypertext Programming", "PHP: Hypertext Programming"
                    ],
                    correctAnswer: "PHP: Hypertext Preprocessor"
                }
            ]
        },{
            maxTimeToFinish: 60,
            questions: [
                {
                    type: "radiogroup",
                    name: "two",
                    title: "Ekstensi untuk file PHP adalah..",
                    choicesOrder: "random",
                    choices: [
                        ".p", ".phar", ".php", ".aspx"
                    ],
                    correctAnswer: ".php"
                }
            ]
        },{
            maxTimeToFinish: 60,
            questions: [
                {
                    type: "radiogroup",
                    name: "three",
                    title: "Manakah penulisan nama variabel dalam PHP yang tepat?",
                    choicesOrder: "random",
                    choices: [
                        "$_vari4bl3", "$v@riable", "$var^able", "$v412ia&l3"
                    ],
                    correctAnswer: "$_vari4bl3"
                }
            ]
        },{
            maxTimeToFinish: 60,
            questions: [
                {
                    type: "radiogroup",
                    name: "four",
                    title: "Diantara contoh berikut, manakah contoh cara mencetak variabel yang kurang tepat dalam PHP?",
                    choicesOrder: "random",
                    choices: [
                        "echo $variable", "echo \"$txt\"", "echo \"\".$txt.\"\"" ,"echo '$txt'"
                    ],
                    correctAnswer: "echo '$txt'"
                }
            ]
        },{
            maxTimeToFinish: 60,
            questions: [
                {
                    type: "radiogroup",
                    name: "five",
                    title: "Tipe data yang tepat untuk menyimpan konstanta Π (phi) dalam bahasa PHP adalah",
                    choicesOrder: "random",
                    choices: [
                        "Integer", "Real", "Float", "Array"
                    ],
                    correctAnswer: "Float"
                }
            ]
        },{
            maxTimeToFinish: 60,
            questions: [
                {
                    type: "radiogroup",
                    name: "six",
                    title: "Untuk menghitung jumlah kata yang ada pada kalimat, digunakan fungsi?",
                    choicesOrder: "random",
                    choices: [
                        "strlen()", "str_word_count()", "strrev()" ,"str_rev()"
                    ],
                    correctAnswer: "str_word_count()"
                }
            ]
        },{
            maxTimeToFinish: 60,
            questions: [
                {
                    type: "radiogroup",
                    name: "seven",
                    title: "Yang bukan merupakan contoh dari operator pembanding kondisional yang digunakan pada bahasa PHP adalah",
                    choicesOrder: "random",
                    choices: [
                        "!==", "!=", "==", ">=="
                    ],
                    correctAnswer: ">=="
                }
            ]
        },{
            maxTimeToFinish: 60,
            questions: [
                {
                    type: "radiogroup",
                    name: "eight",
                    title: "Simbol operator yang digunakan untuk menambahkan (increment) sebanyak 1 pada suatu variabel adalah..",
                    choicesOrder: "random",
                    choices: [
                        "==", "!=", "++", "--"
                    ],
                    correctAnswer: "++"
                }
            ]
        },{
            maxTimeToFinish: 60,
            questions: [
                {
                    type: "radiogroup",
                    name: "nine",
                    title: "Diberikan kode <?php $x = 2;  $y = 3; echo $x ** $y;?> Hasilnya adalah..",
                    choicesOrder: "random",
                    choices: [
                        "6", "5", "8" ,"9"
                    ],
                    correctAnswer: "8"
                }
            ]
        },{
            maxTimeToFinish: 60,
            questions: [
                {
                    type: "radiogroup",
                    name: "ten",
                    title: "Diberikan kode <?php $x = \"10\"; $y = 6; echo \"$x\"+\"$y\";?> Hasil dari operasi hitung diatas adalah.",
                    choicesOrder: "random",
                    choices: [
                        "106", "10 6", "16" ,"undefined varaible: x"
                    ],
                    correctAnswer: "16"
                }
            ]
        },{
            maxTimeToFinish: 60,
            questions: [
                {
                    type: "radiogroup",
                    name: "eleven",
                    title: "Diberikan kode <?php $cars = array(\"Volvo\", \"BMW\", \"Toyota\");?> bagaimana cara mencetak element \"Toyota\" ?",
                    choicesOrder: "random",
                    choices: [
                        "echo $cars[1]", "echo $cars[2]", "echo $cars[3]", "echo \'$cars[2]\'"
                    ],
                    correctAnswer: "echo $cars[2]"
                }
            ]
        },{
            maxTimeToFinish: 90,
            questions: [
                {
                    type: "radiogroup",
                    name: "twelve",
                    title: "<?php \n" +
                        "$cars = array(\"Volvo\", \"BMW\", \"Toyota\");\n" +
                        "$arrlength = count($cars);\n" +
                        "for($x = 0; $x < $arrlength; $x++) {\n" +
                        "    echo \" \".$cars[$x];\n" +
                        "}\n" +
                        "?> Apa output kodenya?",
                    choicesOrder: "random",
                    choices: [
                        "Volvo BMW Toyota", "Volvo Toyota BMW", "VolvoBMWToyota", "BMWToyotaVolvo"
                    ],
                    correctAnswer: "Volvo BMW Toyota"
                }
            ]
        },{
            maxTimeToFinish: 120,
            questions: [
                {
                    type: "radiogroup",
                    name: "thirteen",
                    title: "Diketahui nilai variable $a adalah sebuah bilangan numeric, dan nilai variable $b (bertipe data String) bergantung pada nilai variable $a, jika variable $a bernilai kurang dari 50, maka variable $b bernilai \"R\" , selain itu variable $b bernilai \"SSR\". Bagaimana penulisan kode yang tepat untuk menentukan nilai variable $b?",
                    choicesOrder: "random",
                    choices: [
                        "$b = $a >= 50 ? \"R\" : \"SSR\";", "$b = $a < 50 ? \"R\" : \"SSR\";", "$b = $a <= 50 ? \"R\" : \"SR\";", "$a = $b <= 50 ? \"R\" : \"SSR\";"
                    ],
                    correctAnswer: "$b = $a < 50 ? \"R\" : \"SSR\";"
                }
            ]
        },{
            maxTimeToFinish: 60,
            questions: [
                {
                    type: "radiogroup",
                    name: "fourteen",
                    title: "Diberikan kode <?php  \n" +
                        "$x = 1; \n" +
                        "while($x <= 5) {\n" +
                        "  echo \"$x\";\n" +
                        "}\n" +
                        "?> kode tidak berjalan, apakah yang terjadi?",
                    choicesOrder: "random",
                    choices: [
                        "variabel $x lebih kecil dari 5 sehingga program tidak berjalan", "variabel $x lebih besar dari 5 sehingga kode program tidak berjalan", "variabel $x tidak mengalami penambahan nilai sehingga program berjalan namun tak berhenti", "variabel $x tidak mengalami pengurangan nilai sehingga program berjalan namun tak berhenti"
                    ],
                    correctAnswer: "variabel $x tidak mengalami penambahan nilai sehingga program berjalan namun tak berhenti"
                }
            ]
        },{
            maxTimeToFinish: 900,
            questions: [
                {
                    type: "radiogroup",
                    name: "fifteen",
                    title: "<?php \n" +
                        "$x = 7;\n" +
                        "\n" +
                        "do {\n" +
                        "    $y = $x - 2; \n" +
                        "    echo \"$y\"; \n" +
                        "    $x++; \n" +
                        "} while ($x <= 9);\n" +
                        "?> Apa output kodenya?",
                    choicesOrder: "random",
                    choices: [
                        "7", "67", "567", "765"
                    ],
                    correctAnswer: "567"
                }
            ]
        },{
            maxTimeToFinish: 120,
            questions: [
                {
                    type: "radiogroup",
                    name: "sixteen",
                    title: "Diberikan array $colors = array(\"red\", \"green\", \"blue\", \"yellow\");  . Manakah fungsi yang tidak tepat untuk menampilkan seluruh element $colors ?",
                    choicesOrder: "random",
                    choices: [
                        "foreach ($colors as $value) { echo \"$value <br>\"; }", "for ($x = 0; $x < count($colors); $x++) { echo \"$colors[$x] <br>\"; }", "for ($x = 0; $x <= count($colors); $x++) { echo \"$colors[$x] <br>\"; }" ,"for ($x = 0; $x <= $colors.length; $x++) { echo \"$colors[$x] <br>\"; }"
                    ],
                    correctAnswer: "for ($x = 0; $x <= $colors.length; $x++) { echo \"$colors[$x] <br>\"; }"
                }
            ]
        },{
            maxTimeToFinish: 60,
            questions: [
                {
                    type: "radiogroup",
                    name: "seventeen",
                    title: "<?php\n" +
                        "function test() {\n" +
                        "    $foo = \"One\";\n" +
                        "\n" +
                        "    echo '$foo in global : ' . $GLOBALS[\"foo\"] . \"<br>\";\n" +
                        "}\n" +
                        "\n" +
                        "$foo = \"Two\";\n" +
                        "test();\n" +
                        "?> nilai $foo yang akan tercetak dari program disamping adalah..",
                    choicesOrder: "random",
                    choices: [
                        "One", "Two", "OneTwo", "One Two"
                    ],
                    correctAnswer: "Two"
                }
            ]
        },{
            maxTimeToFinish: 60,
            questions: [
                {
                    type: "radiogroup",
                    name: "eighteen",
                    title: "Bagaimana cara mengetahui nama host dari sisi client untuk melihat halaman ygn diakses saat ini?",
                    choicesOrder: "random",
                    choices: [
                        "$_SERVER['HTTP_HOST']", "$_SERVER['REMOTE_HOST']", "$_SERVER['SERVER_SIGNATURE']", "$_SERVER['SERVER_ADMIN']"
                    ],
                    correctAnswer: "$_SERVER['REMOTE_HOST']"
                }
            ]
        },{
            maxTimeToFinish: 60,
            questions: [
                {
                    type: "radiogroup",
                    name: "nineteen",
                    title: "fungsi matematika yang digunakan untuk melakukan pembulatan pada PHP adalah..",
                    choicesOrder: "random",
                    choices: [
                        "rand", "round", "min" ,"srand"
                    ],
                    correctAnswer: "round"
                }
            ]
        },{
            maxTimeToFinish: 60,
            questions: [
                {
                    type: "radiogroup",
                    name: "twenty",
                    title: "variabel superglobals manakah yang digunakan untuk mengambil data (nilai variabel) dari URL browser?",
                    choicesOrder: "random",
                    choices: [
                        "$_POST", "$_REQUEST", "$_SERVER" ,"$_GET"
                    ],
                    correctAnswer: "$_GET"
                }
            ]
        },
    ]
};

window.survey = new Survey.Model(json);

survey
    .onComplete
    .add(function (result) {
        var uid = document.getElementById('uid').getAttribute('value');
        var unitID = 1;
        // var statuspretest = document.getElementById('statuspretest').getAttribute('value');

        document.getElementById('form').style.display = "block";
        document.getElementById('scorepretest').value = window.btoa(result.getCorrectedAnswerCount());
        document.getElementById('uidnew').value = window.btoa(uid);
        document.getElementById('unitID').value = unitID;
    })

$("#surveyElement").Survey({model: survey});
