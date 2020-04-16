$("document").ready(function () {
    $('#indexContent td a[name]').click(function(){
        $('#indexContent').load('/site/getPage',{pageLabel:$(this).attr('name')});
        return false;
    });
});