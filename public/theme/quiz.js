
Survey
    .StylesManager
    .applyTheme("default");

var json = {
    title: "Pre-Test Unit 1",
    showProgressBar: "bottom",
    showTimerPanel: "top",
    firstPageIsStarted: true,
    startSurveyText: "Start",
    pages: [
        {
            questions: [
                {
                    type: "html",
                    html: "Welcome! <br/>This Pre-Test will use Indonesian.<br/>" +
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
                    title: "Sintaks dalam bahasa PHP menggunakan awalan ... dan akhiran ...",
                    choicesOrder: "random",
                    choices: [
                        "{ dan }", "<?? dan ??>", "<?php dan ?>", "<? dan ?php>"
                    ],
                    correctAnswer: "<?php dan ?>"
                }
            ]
        },{
            maxTimeToFinish: 30,
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
            maxTimeToFinish: 30,
            questions: [
                {
                    type: "radiogroup",
                    name: "three",
                    title: "Bentuk manakah yang memiliki sifat case-sensitive dalam PHP?",
                    choicesOrder: "random",
                    choices: [
                        "$txt", "if", "switch", "echo"
                    ],
                    correctAnswer: "$txt"
                }
            ]
        },{
            maxTimeToFinish: 30,
            questions: [
                {
                    type: "radiogroup",
                    name: "four",
                    title: "Manakah yang bukan merupakan cara untuk memberi comment dalam bahasa PHP?",
                    choicesOrder: "random",
                    choices: [
                        "\'\'", "/*...*/", "//", "///"
                    ],
                    correctAnswer: "\'\'"
                }
            ]
        },{
            maxTimeToFinish: 30,
            questions: [
                {
                    type: "radiogroup",
                    name: "five",
                    title: "Apakah Kepanjangan dari PHP?",
                    choicesOrder: "random",
                    choices: [
                        "Programming Hypertext Preprocessor", "PHP: Hypertext Preprocessor", "Preprocessor Hypertext Programming", "PHP: Hypertext Programming"
                    ],
                    correctAnswer: "PHP: Hypertext Preprocessor"
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
        var unitID = 1;
        // var statuspretest = document.getElementById('statuspretest').getAttribute('value');

        document.getElementById('form').style.display = "block";
        document.getElementById('scorepretest').value = result.getCorrectedAnswerCount();
        document.getElementById('uidnew').value = uid;
        document.getElementById('unitID').value = unitID;
    })

$("#surveyElement").Survey({model: survey});
