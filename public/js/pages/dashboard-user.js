$(function () {
    $('.edit-available-income').click(function () {
        let uid = $(this).attr('uid');
        let balance = $(this).attr('balance');

        $('#userBalance').val(balance);
        $('input[name=uid]').val(uid);

        $('#creditModal').modal('show');
    })
})