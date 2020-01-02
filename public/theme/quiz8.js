
Survey
    .StylesManager
    .applyTheme("default");

var json = {
    title: "Pre-Test Unit 8 (Final)",
    showProgressBar: "bottom",
    showTimerPanel: "top",
    firstPageIsStarted: true,
    startSurveyText: "Start",
    pages: [
        {
            questions: [
                {
                    type: "html",
                    html: "Congratulation! <br/>You've passed the seventh unit before<br/>" +
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
                    title: "Yang bukan termasuk ke dalam PHP superglobals adalah..",
                    choicesOrder: "random",
                    choices: [
                        "$_GLOBALS", "$_REQUEST", "$_POST", "$_GET"
                    ],
                    correctAnswer: "$_GLOBALS"
                }
            ]
        },{
            maxTimeToFinish: 120,
            questions: [
                {
                    type: "radiogroup",
                    name: "two",
                    title: "<?php\n" +
                        "function test() {\n" +
                        "    $foo = \"One\";\n" +
                        "\n" +
                        "    echo '$foo in global scope: ' . $GLOBALS[\"foo\"] . \"<br>\";\n" +
                        "}\n" +
                        "\n" +
                        "$foo = \"Two\";\n" +
                        "test();\n" +
                        "?> Apakah yang akan tercetak dari program disamping?",
                    choicesOrder: "random",
                    choices: [
                        "One", "Two", "OneTwo", "One Two"
                    ],
                    correctAnswer: "Two"
                }
            ]
        },{
            maxTimeToFinish: 30,
            questions: [
                {
                    type: "radiogroup",
                    name: "three",
                    title: "Bagaimana cara mengetahui OS Server yang digunakan dalam PHP?",
                    choicesOrder: "random",
                    choices: [
                        "$_SERVER['HTTP_HOST']", "$_SERVER['HTTP_USER_AGENT']", "$_SERVER['SERVER_NAME']", "$_SERVER['SCRIPT_NAME']"
                    ],
                    correctAnswer: "$_SERVER['HTTP_USER_AGENT']"
                }
            ]
        },{
            maxTimeToFinish: 60,
            questions: [
                {
                    type: "radiogroup",
                    name: "four",
                    title: "variabel superglobal yang digunakan untuk mengetahui request method dalam PHP adalah..",
                    choicesOrder: "random",
                    choices: [
                        "$_GLOBAL['request_method']", "$_SERVER['REQUEST_METHOD']", "$_REQUEST['METHOD']" ,"$_SERVER['REQUEST']"
                    ],
                    correctAnswer: "$_SERVER['REQUEST_METHOD']"
                }
            ]
        },{
            maxTimeToFinish: 60,
            questions: [
                {
                    type: "radiogroup",
                    name: "five",
                    title: "\"phpitutor.php?one=PHP&two=Tutor\" untuk mendapat nilai dari variabel \"one\" dan variabel \"two\" di samping, dapat menggunakan variabel superglobals..",
                    choicesOrder: "random",
                    choices: [
                        "$_GET", "$_POST", "$_REQUESTS" ,"$_SERVER"
                    ],
                    correctAnswer: "$_GET"
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
        var unitID = 8;
        // var statuspretest = document.getElementById('statuspretest').getAttribute('value');

        document.getElementById('form').style.display = "block";
        document.getElementById('scorepretest').value = result.getCorrectedAnswerCount();
        document.getElementById('uidnew').value = uid;
        document.getElementById('unitID').value = unitID;
    })

$("#surveyElement").Survey({model: survey});
