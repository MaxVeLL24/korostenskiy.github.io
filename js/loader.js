var myVar;
function myFunction() {
    $("#page").css('display', 'none');
    myVar = setTimeout(showPage, 1500);
}
function showPage() {
    $("#loader").css('display', 'none');
    $("#page").css('display', 'block');
}