function resetFormModal(action){
    console.log(action);
    $('.invalid-feedback').remove();
    $('form').each(function(index, form){
        form.reset();
        form.action = action;
    });
    $('.message-error').hide();
}
