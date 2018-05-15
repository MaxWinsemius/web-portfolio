$(document).ready(function () {
    $('.article-thumbnail').on('click', function (e) {
        selectArticle($(this).attr('id').replace("article-",""));
    });

    selectArticle(1);
});

var test;

function selectArticle(id) {
    $('#article-' + id).toggleClass('hovered');

    $.ajax({
        data: { ID:id },
        method: 'GET',
        url: 'ajax.php',
        dataType: 'json',
        complete: function(json) {
            json = json.responseJSON[0];
            $('#article-title').html(json.Title);
            $('#article-info').html(json.Article);
        }
    });
}