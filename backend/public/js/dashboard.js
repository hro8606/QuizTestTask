$(document).ready(function () {

    // // $("#modalForAddQuestions form").submit(function (event) {
    //
    //
    //     var formData = {
    //         name: $("#name").val(),
    //         email: $("#email").val(),
    //         superheroAlias: $("#superheroAlias").val(),
    //     };
    //
    //
    //     console.log(333333333333333);
    //     // $.ajax({
    //     //     type: "POST",
    //     //     url: "process.php",
    //     //     data: formData,
    //     //     dataType: "json",
    //     //     encode: true,
    //     // }).done(function (data) {
    //     //     console.log(data);
    //     // });
    //
    //     event.preventDefault();
    // });

    // @todo delete data for other type
    $('input[type=radio][name=questionType]').change(function() {
        if (this.value === '0') {
            $(".answerTypeMultiple input,.answerTypeMultiple select").attr('disabled','disabled');
            $(".answerTypeBinary input,.answerTypeBinary select").removeAttr('disabled');
            $(".answerTypeMultiple").hide();
            $(".answerTypeBinary").show();
        }
        else if (this.value === '1') {
            $(".answerTypeBinary input,.answerTypeBinary select").attr('disabled','disabled');
            $(".answerTypeMultiple input,.answerTypeMultiple select").removeAttr('disabled');
            $(".answerTypeBinary").hide();
            $(".answerTypeMultiple").show();
        }
    });
});

// function addQuestion(el){
//
//     //check The question type
//     if (checkQuestionType()){
//         $(".answerType2").hide();
//         $(".answerType1").show();
//     }else{
//         $(".answerType1").hide();
//         $(".answerType2").show();
//     }
//
//     $('#modalForAddQuestions').modal('show');
//
// }
//
// function checkQuestionType(){
//     return  $('input[name=radioType1]:checked').val();
// }
//
