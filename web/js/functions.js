function recoverDB () {
    var btn = $('#recoverButton');
    btn.attr('disabled','disabled');
    $.get( "/recover.php", function( data ) {
        if (data.search('successfully')) {
            btn.removeClass('btn-default')
                .addClass('btn-success')
                .html('Successfully');
        }
    }).fail(function () {
         alert( "Failed =(" );
        btn.removeAttr('disabled');
    });
}
function setBlur(element, blurSize) {
    $(element).
        css('-webkit-filter', 'blur('+ blurSize +'px)').
        css('-moz-filter', 'blur('+ blurSize +'px)').
        css('-o-filter', 'blur('+ blurSize +'px)').
        css('-ms-filter', 'blur('+ blurSize +'px)').
        css('filter', 'blur('+ blurSize +'px)')
}
$(document).ready(function () {
    if ($(".bookcase").length) {
        setBlur($(".bookcase").css('height', window.innerHeight), window.innerHeight / 200);
        $(window).resize(function () {
            setBlur($(".bookcase").css('height', window.innerHeight), window.innerHeight / 200);
        });
    }
});