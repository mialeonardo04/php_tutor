
Survey
    .StylesManager
    .applyTheme("default");

var json = {
    title: "Pre-Test Unit 2",
    showProgressBar: "bottom",
    showTimerPanel: "top",
    firstPageIsStarted: true,
    startSurveyText: "Start",
    pages: [
        {
            questions: [
                {
                    type: "html",
                    html: "Congratulation! <br/>You've passed the first unit of this Pre-Test<br/>" +
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
                    title: "Penulisan nama variabel dalam PHP diawali dengan tanda baca apa?",
                    choicesOrder: "random",
                    choices: [
                        "$", "%", "^", "@"
                    ],
                    correctAnswer: "$"
                }
            ]
        },{
            maxTimeToFinish: 30,
            questions: [
                {
                    type: "radiogroup",
                    name: "two",
                    title: "Manakah penulisan nama variabel dalam PHP yang kurang tepat?",
                    choicesOrder: "random",
                    choices: [
                        "$_variable", "$v4riable", "$var^able", "$v412iabl3"
                    ],
                    correctAnswer: "$var^able"
                }
            ]
        },{
            maxTimeToFinish: 30,
            questions: [
                {
                    type: "radiogroup",
                    name: "three",
                    title: "Manakah penulisan nama variabel dalam PHP yang benar?",
                    choicesOrder: "random",
                    choices: [
                        "$@_txt", "$^txt", "$&txt", "$_txt"
                    ],
                    correctAnswer: "$_txt"
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
                    title: "Dalam membuat variabel pada PHP, tidak perlu mendeklarasikan..",
                    choicesOrder: "random",
                    choices: [
                        "nama variable", "data variable", "tipe data", "tipe variable"
                    ],
                    correctAnswer: "tipe data"
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
        var unitID = 2;
        // var statuspretest = document.getElementById('statuspretest').getAttribute('value');

        document.getElementById('form').style.display = "block";
        document.getElementById('scorepretest').value = result.getCorrectedAnswerCount();
        document.getElementById('uidnew').value = uid;
        document.getElementById('unitID').value = unitID;
    })

$("#surveyElement").Survey({model: survey});
