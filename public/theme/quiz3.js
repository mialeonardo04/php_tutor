
Survey
    .StylesManager
    .applyTheme("default");

var json = {
    title: "Pre-Test Unit 3",
    showProgressBar: "bottom",
    showTimerPanel: "top",
    firstPageIsStarted: true,
    startSurveyText: "Start",
    pages: [
        {
            questions: [
                {
                    type: "html",
                    html: "Congratulation! <br/>You've passed the second unit of this Pre-Test<br/>" +
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
                    title: "Berikut merupakan tipe data yang tidak support dalam bahasa PHP v5 adalah",
                    choicesOrder: "random",
                    choices: [
                        "String", "Integer", "Real", "NULL"
                    ],
                    correctAnswer: "Real"
                }
            ]
        },{
            maxTimeToFinish: 30,
            questions: [
                {
                    type: "radiogroup",
                    name: "two",
                    title: "Tipe data yang tepat untuk menyimpan konstanta Π (phi) dalam bahasa PHP adalah",
                    choicesOrder: "random",
                    choices: [
                        "Integer", "Real", "Float", "Array"
                    ],
                    correctAnswer: "Float"
                }
            ]
        },{
            maxTimeToFinish: 30,
            questions: [
                {
                    type: "radiogroup",
                    name: "three",
                    title: "Tipe data yang hanya memiliki kemungkinan 2 nilai untuk disimpan, merupakan tipe data..",
                    choicesOrder: "random",
                    choices: [
                        "Integer", "Boolean", "Character", "Float"
                    ],
                    correctAnswer: "Boolean"
                }
            ]
        },{
            maxTimeToFinish: 60,
            questions: [
                {
                    type: "radiogroup",
                    name: "four",
                    title: "Fungsi dalam PHP yang digunakan untuk menghitung jumlah karakter pada sebuah String dalam PHP adalah",
                    choicesOrder: "random",
                    choices: [
                        "strlen()", "str_word_count()", "strrev()" ,"str_rev()"
                    ],
                    correctAnswer: "strlen()"
                }
            ]
        },{
            maxTimeToFinish: 60,
            questions: [
                {
                    type: "radiogroup",
                    name: "five",
                    title: "Untuk menghitung jumlah kata yang ada pada kalimat, digunakan fungsi?",
                    choicesOrder: "random",
                    choices: [
                        "strlen()", "str_word_count()", "strrev()" ,"str_rev()"
                    ],
                    correctAnswer: "str_word_count()"
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
        var unitID = 3;
        // var statuspretest = document.getElementById('statuspretest').getAttribute('value');

        document.getElementById('form').style.display = "block";
        document.getElementById('scorepretest').value = result.getCorrectedAnswerCount();
        document.getElementById('uidnew').value = uid;
        document.getElementById('unitID').value = unitID;
    })

$("#surveyElement").Survey({model: survey});
