function checkEmpty(elem) {
    if(!$.trim($(elem).val())) {
        return true;
    }
    return false;
}
function showError(elem, message) {
    var parent;
    if($(elem).parent().find('.help-block').is('span')) {
        parent = $(elem).parent();
    } else {
        parent = $(elem).parent().parent();
    }
    parent.addClass('has-error');
    parent.find('.help-block').first().html(message);
    $(elem).focus();
}
function resetError(elem) {
    var parent;
    if($(elem).parent().find('.help-block').is('span')) {
        parent = $(elem).parent();
    } else {
        parent = $(elem).parent().parent();
    }
    parent.removeClass('has-error');
    parent.find('.help-block').first().html('');
}

export { checkEmpty, showError, resetError }