
Survey
    .StylesManager
    .applyTheme("default");

var json = {
    title: "Pre-Test Unit 7",
    showProgressBar: "bottom",
    showTimerPanel: "top",
    firstPageIsStarted: true,
    startSurveyText: "Start",
    pages: [
        {
            questions: [
                {
                    type: "html",
                    html: "Congratulation! <br/>You've passed the sixth unit before<br/>" +
                        "You have 30 - 120 seconds for every question. <br/>" +
                        "Please, click 'Start' button below when you are ready."
                }
            ]
        }, {
            maxTimeToFinish: 60,
            questions: [
                {
                    type: "radiogroup",
                    name: "one",
                    title: "Apa yang dimaksud Array dalam PHP?",
                    choicesOrder: "random",
                    choices: [
                        "variabel khusus yang dapat menampung lebih dari satu nilai di waktu yang sama", "variabel khusus yang dapat menampung satu nilai di saat yang sama", "variabel khusus yang dapat menampung dua nilai di waktu yang sama", "class yang dapat menampung lebih dari satu nilai di waktu yang sama"
                    ],
                    correctAnswer: "variabel khusus yang dapat menampung lebih dari satu nilai di waktu yang sama"
                }
            ]
        },{
            maxTimeToFinish: 90,
            questions: [
                {
                    type: "radiogroup",
                    name: "two",
                    title: "Diberikan kode <?php $cars = array(\"Volvo\", \"BMW\", \"Toyota\");?> bagaimana cara mencetak element \"BMW\" ?",
                    choicesOrder: "random",
                    choices: [
                        "echo $cars[1]", "echo $cars[2]", "echo $cars[3]", "echo \"$cars[2]\""
                    ],
                    correctAnswer: "echo $cars[1]"
                }
            ]
        },{
            maxTimeToFinish: 120,
            questions: [
                {
                    type: "radiogroup",
                    name: "three",
                    title: "<?php \n" +
                        "$cars = array(\"Volvo\", \"BMW\", \"Toyota\");\n" +
                        "$arrlength = count($cars);\n" +
                        "for($x = 0; $x < $arrlength; $x++) {\n" +
                        "    echo $cars[$x];\n" +
                        "}\n" +
                        "?> Apa output kodenya?",
                    choicesOrder: "random",
                    choices: [
                        "Volvo BMW Toyota", "Volvo Toyota BMW", "VolvoBMWToyota", "BMWToyotaVolvo"
                    ],
                    correctAnswer: "VolvoBMWToyota"
                }
            ]
        },{
            maxTimeToFinish: 60,
            questions: [
                {
                    type: "radiogroup",
                    name: "four",
                    title: "<?php $age = array(\"raqael\"=>\"20\", \"diena\"=>\"19\", \"maryam\"=>\"20\", \"jarwodo\"=>\"24\"); ?> apakah tipe array disamping?",
                    choicesOrder: "random",
                    choices: [
                        "indexed array", "multidimensional array", "associative array" ,"sorting array"
                    ],
                    correctAnswer: "associative array"
                }
            ]
        },{
            maxTimeToFinish: 30,
            questions: [
                {
                    type: "radiogroup",
                    name: "five",
                    title: "Bagaimana cara mengurutkan associative array secara ascending berdasarkan key?",
                    choicesOrder: "random",
                    choices: [
                        "rsort()", "ksort()", "arsort()" ,"krsort()"
                    ],
                    correctAnswer: "ksort()"
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
        var unitID = 7;
        // var statuspretest = document.getElementById('statuspretest').getAttribute('value');

        document.getElementById('form').style.display = "block";
        document.getElementById('scorepretest').value = result.getCorrectedAnswerCount();
        document.getElementById('uidnew').value = uid;
        document.getElementById('unitID').value = unitID;
    })

$("#surveyElement").Survey({model: survey});
