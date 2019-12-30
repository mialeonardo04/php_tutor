
Survey
    .StylesManager
    .applyTheme("default");

var json = {
    title: "Pre-Test Unit 5",
    showProgressBar: "bottom",
    showTimerPanel: "top",
    firstPageIsStarted: true,
    startSurveyText: "Start",
    pages: [
        {
            questions: [
                {
                    type: "html",
                    html: "Congratulation! <br/>You've passed the fouth unit before<br/>" +
                        "You have 30 - 120 seconds for every question. <br/>" +
                        "Please, click 'Start' button below when you are ready."
                }
            ]
        }, {
            maxTimeToFinish: 120,
            questions: [
                {
                    type: "radiogroup",
                    name: "one",
                    title: "Diketahui nilai variable $a adalah sebuah bilangan numeric, dan nilai variable $b (bertipe data String) bergantung pada nilai variable $a, jika variable $a bernilai 50 atau lebih rendah, maka variable $b bernilai \"S\" , jika lebih dari itu variable $b bernilai \"SR\". Bagaimana penulisan kode yang tepat untuk menentukan nilai variable $b?",
                    choicesOrder: "random",
                    choices: [
                        "$b = $a >= 50 ? \"S\" : \"SR\";", "$b = $a < 50 ? \"S\" : \"SR\";", "$b = $a <= 50 ? \"S\" : \"SR\";", "$a = $b <= 50 ? \"S\" : \"SR\";"
                    ],
                    correctAnswer: "$b = $a <= 50 ? \"S\" : \"SR\";"
                }
            ]
        },{
            maxTimeToFinish: 90,
            questions: [
                {
                    type: "radiogroup",
                    name: "two",
                    title: "<?php $y = \"1\"; $x = $y > 1 ? \"1\" : \"2\"; echo $x+$y; ?> Apa output kodenya?",
                    choicesOrder: "random",
                    choices: [
                        "12", "11", "3", "\"11\""
                    ],
                    correctAnswer: "3"
                }
            ]
        },{
            maxTimeToFinish: 90,
            questions: [
                {
                    type: "radiogroup",
                    name: "three",
                    title: "<?php $y = 2; $x = $y >= 2 ? \"1\" : \"2\"; echo $x*$y; ?> Apa output kodenya?",
                    choicesOrder: "random",
                    choices: [
                        "1", "2", "3", "12"
                    ],
                    correctAnswer: "2"
                }
            ]
        },{
            maxTimeToFinish: 120,
            questions: [
                {
                    type: "radiogroup",
                    name: "four",
                    title: "<?php $y = 13; $x = $y < 10 ? 4 : 3; echo $x ?> Jika kode akan diubah menjadi bentuk switch dan case, bagaimanakah penulisannya?",
                    choicesOrder: "random",
                    choices: [
                        "switch(true){\n" +
                        "    \tcase ($y < 10):\n" +
                        "           $x = 4;\n" +
                        "           break;\n" +
                        "        default:\n" +
                        "           $x = 3;\n" +
                        "    }", "switch($y){\n" +
                        "    \tcase < 10:\n" +
                        "           $x = 4;\n" +
                        "           break;\n" +
                        "        default:\n" +
                        "           $x = 3;\n" +
                        "    }", "switch($y){\n" +
                        "    \tcase \"10\":\n" +
                        "           $x = 4;\n" +
                        "           break;\n" +
                        "        default:\n" +
                        "           $x = 3;\n" +
                        "    }" ,"switch($x){\n" +
                        "    \tcase \"10\":\n" +
                        "           $x = 4;\n" +
                        "           break;\n" +
                        "        default:\n" +
                        "           $x = 3;\n" +
                        "    }"
                    ],
                    correctAnswer: "switch(true){\n" +
                        "    \tcase ($y < 10):\n" +
                        "           $x = 4;\n" +
                        "           break;\n" +
                        "        default:\n" +
                        "           $x = 3;\n" +
                        "    }"
                }
            ]
        },{
            maxTimeToFinish: 30,
            questions: [
                {
                    type: "radiogroup",
                    name: "five",
                    title: "\"else\" dalam fungsi kondisional if bernilai sama dengan ... dalam kondisional pada switch dan case",
                    choicesOrder: "random",
                    choices: [
                        "case", "cast", "break" ,"default"
                    ],
                    correctAnswer: "default"
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
        var unitID = 5;
        // var statuspretest = document.getElementById('statuspretest').getAttribute('value');

        document.getElementById('form').style.display = "block";
        document.getElementById('scorepretest').value = result.getCorrectedAnswerCount();
        document.getElementById('uidnew').value = uid;
        document.getElementById('unitID').value = unitID;
    })

$("#surveyElement").Survey({model: survey});
