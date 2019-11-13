// $("input.tr_clone_add").live('click', function() {
$('.phone-table').on('click', '.tr_clone_add', function() {
        var $tr    = $(this).closest('.tr_clone');
        var $clone = $tr.clone();
        $clone.find(':text').val('');
        $clone.find('input').attr('value','');//extra.
        $tr.after($clone);
        // $("#table-1 tr:last").clone().find('input').val('').end().insertAfter("#table-1 tr:last");
});

$('.email-table').on('click', '.tr_clone_add', function() {
    var $tr    = $(this).closest('.tr_clone');
    var $clone = $tr.clone();
    $clone.find(':text').val('');
    $clone.find('input').attr('value','');//extra.
    $tr.after($clone);
    // $("#table-1 tr:last").clone().find('input').val('').end().insertAfter("#table-1 tr:last");
});

$('.phone-table').on('click', '.tr_remove', function() {
    $(this).closest('tr').remove();
});

$('.email-table').on('click', '.tr_remove', function() {
    $(this).closest('tr').remove();
});