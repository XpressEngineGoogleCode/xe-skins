jQuery(function($){

    // Global Navigation Bar
    var gMenu = $('#header>div.gnb');
    var gItem = gMenu.find('>ul>li');
	var gItem_ul = gMenu.find('>ul');
    var ggItem = gMenu.find('>ul>li>ul>li');
    var lastEvent = null;
    gItem.find('>ul').hide();
	gItem.filter(':first').addClass('first');
    function gMenuToggle(){
        var t = $(this);
        if (t.next('ul').is(':hidden') || t.next('ul').length == 0) {
            gItem.find('>ul').slideUp(200);
            gItem.find('a').removeClass('hover');
            t.next('ul').slideDown(200);
            t.addClass('hover');            
        };
		if(t.next('ul').width()){
			if(t.next('ul').width()< t.parent().width()){
				t.next('ul').width(t.parent().width());
			}
		}
    };
    function gMenuOut(){
        gItem.find('ul').slideUp(200);
        gItem.find('a').removeClass('hover');
    };
    gItem.find('>a').mouseover(gMenuToggle).focus(gMenuToggle);
    gItem_ul.mouseleave(gMenuOut);

});