
Survey
    .StylesManager
    .applyTheme("default");

var json = {
    title: "Pre-Test Unit 4",
    showProgressBar: "bottom",
    showTimerPanel: "top",
    firstPageIsStarted: true,
    startSurveyText: "Start",
    pages: [
        {
            questions: [
                {
                    type: "html",
                    html: "Congratulation! <br/>You've passed the third unit before<br/>" +
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
                    title: "Yang tidak termasuk operator(simbol) aritmatika dalam bahasa PHP adalah",
                    choicesOrder: "random",
                    choices: [
                        "**", "*", "%", "^"
                    ],
                    correctAnswer: "^"
                }
            ]
        },{
            maxTimeToFinish: 30,
            questions: [
                {
                    type: "radiogroup",
                    name: "two",
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
                    name: "three",
                    title: "Diberikan kode <?php define(\"PHPTUTOR\", \"Belajar dengan PHP I Tutor\", true); ?> apakah kode yang digunakan untuk mencetak bagian \"Belajar dengan PHP I Tutor\" dengan fitur constants dari PHP?",
                    choicesOrder: "random",
                    choices: [
                        "echo phptutor;", "echo \"PHPTUTOR\";", "echo \"Belajar dengan PHP I Tutor\";", "echo $PHPTUTOR;"
                    ],
                    correctAnswer: "echo phptutor;"
                }
            ]
        },{
            maxTimeToFinish: 120,
            questions: [
                {
                    type: "radiogroup",
                    name: "four",
                    title: "Diberikan kode <?php $x = \"10\"; $y = 6; echo \"$x\"+\"$y\";?> Hasil dari operasi hitung diatas adalah.",
                    choicesOrder: "random",
                    choices: [
                        "106", "10 6", "16" ,"undefined varaible: x"
                    ],
                    correctAnswer: "16"
                }
            ]
        },{
            maxTimeToFinish: 120,
            questions: [
                {
                    type: "radiogroup",
                    name: "five",
                    title: "Diberikan kode <?php $x = 3;  $y = 2; echo $x ** $y;?> Hasilnya adalah..",
                    choicesOrder: "random",
                    choices: [
                        "6", "5", "8" ,"9"
                    ],
                    correctAnswer: "9"
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
        var unitID = 4;
        // var statuspretest = document.getElementById('statuspretest').getAttribute('value');

        document.getElementById('form').style.display = "block";
        document.getElementById('scorepretest').value = result.getCorrectedAnswerCount();
        document.getElementById('uidnew').value = uid;
        document.getElementById('unitID').value = unitID;
    })

$("#surveyElement").Survey({model: survey});
