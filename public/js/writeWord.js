$(".write-js").on("click", function (e) {
    showInput();

    checkWord();
});

var writtenWord = document.getElementById('usr');

function useValue() {
    var nameValue = writtenWord.value;
}
writtenWord.onchange = useValue;

$(".comeback-js").on("click", function (e) {
    showWord();
})

function checkWord() {
    $(".ok-js").on("click", function (e) {
        showWord();

        var presentTime = document.getElementById('timer').innerHTML;

        localStorage.setItem("time", presentTime);
        if(word !== writtenWord.value) {
            showWord();
        }
    })
}

function showWord() {
    $(".block-write-word-js").hide();
    $(".block-word-js").show();
    $(".write").show();
}

function showInput() {
    $(".block-word-js").hide();
    $(".block-write-word-js").show();
}