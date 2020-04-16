$("document").ready(function () {
    $('#ulSubMenu a').click(function(){
        $('#indexContent').load('/site/getPage',{pageLabel:$(this).attr('name')});
        return false;
    });
    $('#logo').click(function(){
        location.href = '/';
    });
});