
Survey
    .StylesManager
    .applyTheme("default");

var json = {
    title: "Pre-Test PHP Intelligent Tutor",
    showProgressBar: "bottom",
    showTimerPanel: "top",
    maxTimeToFinishPage: 90,
    maxTimeToFinish: 900,
    firstPageIsStarted: true,
    startSurveyText: "Start",
    pages: [
        {
            questions: [
                {
                    type: "html",
                    html: "Welcome! <br/>This Pre-Test will use Indonesian.<br/>" +
                        "You have 1 minute 30 seconds for every question. <br/>" +
                        "And have 15 minutes for the whole Pre-Test of 10 questions.<br/>" +
                        "Please, click 'Start' button below when you are ready."
                }
            ]
        }, {
            maxTimeToFinish: 90,
            questions: [
                {
                    type: "radiogroup",
                    name: "syntax",
                    title: "Sintaks dalam bahasa PHP menggunakan awalan ... dan akhiran ...",
                    choicesOrder: "random",
                    choices: [
                        "{ dan }", "<?? dan ??>", "<?php dan ?>", "<? dan ?php>"
                    ],
                    correctAnswer: "<?php dan ?>"
                }
            ]
        },{
            maxTimeToFinish: 90,
            questions: [
                {
                    type: "radiogroup",
                    name: "print",
                    title: "Bagaimana cara mencetak tulisan 'Hello World' (tanpa tanda petik) ke dalam sebuah browser menggunakan bahasa PHP?",
                    choicesOrder: "random",
                    choices: [
                        "echo 'Hello World';", "print 'Hello World';", "System.out.print('Hello World');", "alert('Hello World');"
                    ],
                    correctAnswer: "echo 'Hello World';"
                }
            ]
        },{
            maxTimeToFinish: 90,
            questions: [
                {
                    type: "radiogroup",
                    name: "variables",
                    title: "Manakah penulisan variable dengan tipe data String yang tepat dalam bahasa PHP?",
                    choicesOrder: "random",
                    choices: [
                        "$txt = \"123\"", "txt = \"123\"", "String txt = \"123\"", "$txt = 123"
                    ],
                    correctAnswer: "$txt = \"123\""
                }
            ]
        },{
            maxTimeToFinish: 90,
            questions: [
                {
                    type: "radiogroup",
                    name: "constants",
                    title: "Diberikan kode <?php define(\"PHPTUTOR\", \"Belajar dengan PHP I Tutor\", true); ?> apakah kode yang digunakan untuk mencetak bagian \"Belajar dengan PHP I Tutor\" dengan fitur constants dari PHP?",
                    choicesOrder: "random",
                    choices: [
                        "echo phptutor;", "echo \"PHPTUTOR\";", "echo \"Belajar dengan PHP I Tutor\";", "echo $PHPTUTOR;"
                    ],
                    correctAnswer: "echo phptutor;"
                }
            ]
        },{
            maxTimeToFinish: 90,
            questions: [
                {
                    type: "radiogroup",
                    name: "operators",
                    title: "Yang bukan merupakan contoh dari operator pembanding kondisional yang digunakan pada bahasa PHP adalah",
                    choicesOrder: "random",
                    choices: [
                        "!==", "!=", "==", ">=="
                    ],
                    correctAnswer: ">=="
                }
            ]
        },{
            maxTimeToFinish: 90,
            questions: [
                {
                    type: "radiogroup",
                    name: "looping",
                    title: "Diberikan array $colors = array(\"red\", \"green\", \"blue\", \"yellow\");  . Manakah fungsi yang tidak tepat untuk menampilkan seluruh element $colors ?",
                    choicesOrder: "random",
                    choices: [
                        "for ($x = 0; $x <= $colors.length; $x++) { echo \"$colors[$x] <br>\"; }", "for ($x = 0; $x <= count($colors); $x++) { echo \"$colors[$x] <br>\"; }", "for ($x = 0; $x < count($colors); $x++) { echo \"$colors[$x] <br>\"; }", "foreach ($colors as $value) { echo \"$value <br>\"; }"
                    ],
                    correctAnswer: "for ($x = 0; $x <= $colors.length; $x++) { echo \"$colors[$x] <br>\"; }"
                }
            ]
        },{
            maxTimeToFinish: 90,
            questions: [
                {
                    type: "radiogroup",
                    name: "conditional",
                    title: "Diketahui nilai variable $a adalah sebuah bilangan ril, dan nilai variable $b bergantung pada nilai variable $a, jika nilai variable $a 50 kebawah, maka variable $b bernilai \"S\" , jika lebih dari itu variable $b bernilai \"SR\". Bagaimana penulisan kode yang tepat untuk menentukan nilai variable $b?",
                    choicesOrder: "random",
                    choices: [
                        "$b = $a <= 50 ? \"S\" : \"SR\";", "$b = $a >= 50 ? \"S\" : \"SR\";", "$b = $a < 50 ? \"S\" : \"SR\";", "$a = $b <= 50 ? \"S\" : \"SR\";"
                    ],
                    correctAnswer: "$b = $a <= 50 ? \"S\" : \"SR\";"
                }
            ]
        },{
            maxTimeToFinish: 90,
            questions: [
                {
                    type: "radiogroup",
                    name: "array",
                    title: "Diberikan array $colors = array(\"red\", \"green\", \"blue\", \"yellow\"); Bagaimana cara mencetak item ketiga dari array $colors tersebut?",
                    choicesOrder: "random",
                    choices: [
                        "echo \'$colors[2]\'", "echo \"$colors[2]\"", "echo $colors[3]", "echo $colors[1]"
                    ],
                    correctAnswer: "echo \"$colors[2]\""
                }
            ]
        },{
            maxTimeToFinish: 90,
            questions: [
                {
                    type: "radiogroup",
                    name: "strings",
                    title: "Fungsi apakah yang digunakan untuk menghitung panjang karakter dari suatu String?",
                    choicesOrder: "random",
                    choices: [
                        "str_len()", "strrev()", "str_rev()", "strlen()"
                    ],
                    correctAnswer: "strlen()"
                }
            ]
        },{
            maxTimeToFinish: 90,
            questions: [
                {
                    type: "radiogroup",
                    name: "date and time",
                    title: "Apakah perintah yang digunakan untuk menampilkan waktu dengan format jam:menit:detik(00:00:00)?",
                    choicesOrder: "random",
                    choices: [
                        "echo date(\"H:i:s\")", "echo date(\"Y:m:d\")", "echo date(\"Y-m-d H:i:s\")", "echo date(\"H-m-s\")"
                    ],
                    correctAnswer: "echo date(\"H:i:s\")"
                }
            ]
        }
    ]
    // correctedAnswer: "<b>{correctedAnswers}</b>"
    // completedHtml: "<h4>You have answered correctly <b>{correctedAnswers}</b> questions from <b>{questionCount}</b>.</h4>"

};

window.survey = new Survey.Model(json);

survey
    .onComplete
    .add(function (result) {
        var uid = document.getElementById('uid').getAttribute('value');
        var statuspretest = document.getElementById('statuspretest').getAttribute('value');

        document.getElementById('form').style.display = "block";
        document.getElementById('scorepretest').value = result.getCorrectedAnswerCount();
        document.getElementById('uidnew').value = uid;

    });

$("#surveyElement").Survey({model: survey});
