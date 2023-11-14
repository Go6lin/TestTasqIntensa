$(document).ready(function () {
    $("#form").on("submit", function (e) {
        e.preventDefault();
        $.post('/result.php', $('#form').serialize(), function(data){
            $("#message").html(data);
        });
        $("#message").html('Идет загрузка');
    });
});
let ref = document.querySelector('.reference-input');
let btn = document.querySelector('.submit-button');
btn.setAttribute('disabled', true);
ref.oninput = function(){
    let refCheck = document.querySelector('.reference-input').value;
    if (!validateRef(refCheck)){
        btn.setAttribute('disabled', true);
    }else{
        btn.removeAttribute('disabled');
    }
}
function validateRef(str){
    var regex = /(.$)/;
    return regex.test(str);
}