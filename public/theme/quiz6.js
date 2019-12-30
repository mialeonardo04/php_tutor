
Survey
    .StylesManager
    .applyTheme("default");

var json = {
    title: "Pre-Test Unit 6",
    showProgressBar: "bottom",
    showTimerPanel: "top",
    firstPageIsStarted: true,
    startSurveyText: "Start",
    pages: [
        {
            questions: [
                {
                    type: "html",
                    html: "Congratulation! <br/>You've passed the fifth unit before<br/>" +
                        "You have 30 - 120 seconds for every question. <br/>" +
                        "Please, click 'Start' button below when you are ready."
                }
            ]
        }, {
            maxTimeToFinish: 30,
            questions: [
                {
                    type: "radiogroup",
                    name: "one",
                    title: "Yang bukan merupakan tipe perulangan dalam PHP adalah..",
                    choicesOrder: "random",
                    choices: [
                        "while", "do", "for", "foreach"
                    ],
                    correctAnswer: "do"
                }
            ]
        },{
            maxTimeToFinish: 120,
            questions: [
                {
                    type: "radiogroup",
                    name: "two",
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
            maxTimeToFinish: 120,
            questions: [
                {
                    type: "radiogroup",
                    name: "three",
                    title: "<?php \n" +
                        "$x = 7;\n" +
                        "\n" +
                        "do {\n" +
                        "    echo \"$x\";\n" +
                        "    $x++;\n" +
                        "} while ($x <= 5);\n" +
                        "?> Apa output kodenya?",
                    choicesOrder: "random",
                    choices: [
                        "7", "6", "5", "765"
                    ],
                    correctAnswer: "7"
                }
            ]
        },{
            maxTimeToFinish: 60,
            questions: [
                {
                    type: "radiogroup",
                    name: "four",
                    title: "<?php for(<a>;<b>;<c>){ <d> } ?> Bagian manakah yang disebut sebagai test counter dalam loop for?",
                    choicesOrder: "random",
                    choices: [
                        "<a>", "<b>", "<c>" ,"<d>"
                    ],
                    correctAnswer: "<b>"
                }
            ]
        },{
            maxTimeToFinish: 30,
            questions: [
                {
                    type: "radiogroup",
                    name: "five",
                    title: "Diberikan array $colors = array(\"red\", \"green\", \"blue\", \"yellow\");  . Manakah fungsi yang tidak tepat untuk menampilkan seluruh element $colors ?",
                    choicesOrder: "random",
                    choices: [
                        "foreach ($colors as $value) { echo \"$value <br>\"; }", "for ($x = 0; $x < count($colors); $x++) { echo \"$colors[$x] <br>\"; }", "for ($x = 0; $x <= count($colors); $x++) { echo \"$colors[$x] <br>\"; }" ,"for ($x = 0; $x <= $colors.length; $x++) { echo \"$colors[$x] <br>\"; }"
                    ],
                    correctAnswer: "for ($x = 0; $x <= $colors.length; $x++) { echo \"$colors[$x] <br>\"; }"
                }
            ]
        }
    ]
};

window.survey = new Survey.Model(json);

survey
    .onComplete
    .add(function (result) {
        var uid = document.getElementById('uid').getAttribute('value');
        var unitID = 6;
        // var statuspretest = document.getElementById('statuspretest').getAttribute('value');

        document.getElementById('form').style.display = "block";
        document.getElementById('scorepretest').value = result.getCorrectedAnswerCount();
        document.getElementById('uidnew').value = uid;
        document.getElementById('unitID').value = unitID;
    })

$("#surveyElement").Survey({model: survey});
