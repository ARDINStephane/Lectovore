var min = '00';
var sec = '00';
var input = '';

$(".block-failed-js").hide();
$(".finish-js").hide();


if (typeof localStorage !== 'undefined') {
    var actualTime;
    actualTime = localStorage.getItem('time');
    console.log(min + ":" + sec);
}
if (actualTime) {
    var parseTime = actualTime.split(":");
    min = parseTime[0];
    sec = parseTime[1];

    showTime();

    startTimer();

    $(".choose-time-js").hide();
    $(".block-write-word-js").hide();
    $(".block-word-js").show();

    localStorage.removeItem('time');
} else {
    chooseAndStartTimer();
}

function startTimer() {
    var presentTime = document.getElementById('timer').innerHTML;
    var timeArray = presentTime.split(/[:]+/);
    var m = timeArray[0];
    var s = checkSecond((timeArray[1] - 1));
    if(s==59){m=m-1}
    if(m<0){
        showResults();
        showTime();
        return ('timer completed')
    }

    document.getElementById('timer').innerHTML =
        m + ":" + s;
    setTimeout(startTimer, 1000);
}

function checkSecond(sec) {
    if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
    if (sec < 0) {sec = "59"};
    return sec;
}

function showTime() {
    document.getElementById('timer').innerHTML =
        min + ":" + sec;
}

function chooseAndStartTimer()
{
    $(".block-write-word-js").hide();
    $(".block-word-js").hide();

    min = $('input[name=select-time-js]:checked').val();

    showTime();

    $(".select-time-js").on("click", function (e) {
        min = $('input[name=select-time-js]:checked').val();

        showTime();
    });

    $(".go").on("click", function (e) {
        startTimer();
        $(".choose-time-js").hide();
        $(".block-word-js").show();
    });
}

function showResults()
{
    $(".block-failed-js").hide();
    $(".container").hide();
    $(".finish-js").show();
}