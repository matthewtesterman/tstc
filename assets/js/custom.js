function custom_main() {
   make_nav_bar_active(); 
}

//Changes a tab to be active to reflect the current page.
function make_nav_bar_active() {
    $('li > a > .menuText').each(function() {
        
        if ($(this).html() === $('title').html())
        {
            console.log($('title').html());
            $(this).parents('.mainMenuItem').addClass('active');
        }    
    });
}

function open_window(did) {
    alert(did);
  
}