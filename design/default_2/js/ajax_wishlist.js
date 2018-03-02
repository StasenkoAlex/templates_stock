// Аяксовый список избранного
$(document).ready( function(){ 

    $('.js-wishlist').click(function(){
        var button = $(this),
            action = $(this).hasClass('is-selected') ? 'delete' : '';
        $.ajax({ 
            url: "ajax/wishlist.php", 
            data: {id: $(this).attr('rel'), action: action },
            success: function(data){
                $('#wishlist').html(data);
                (action == '') ? button.addClass('is-selected') : button.removeClass('is-selected');
                if(button.attr('data-result-text')) {
                    text = button.html();
                    button.html(button.attr('data-result-text'));
                    button.attr('data-result-text', text);
                }   
            }
        });
    
        return false;
        
    }); 
}); 