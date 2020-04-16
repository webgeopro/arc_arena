/*
$("document").ready(function () {
    var tempImage = '';
    $('#mainmenu ul li a').hover(
        function () {
            //tempImage = $(this).html();
            //$(this).find('img').css('src', '/images/'+this.name+'_i.png');//alert('/images/'+this.name+'_i.png');
            $(this).html('<img src="/images/'+this.name+'_i.png">');//alert('/images/'+this.name+'_i.png');
        },
        function () {
            if ( !$(this).hasClass('active') ) {
                $(this).html('<img src="/images/'+this.name+'.png">');
            } else {
                $(this).html('<img src="/images/'+this.name+'_i.png">');
            }
        }
    );
});
*/