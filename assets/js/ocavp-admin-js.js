jQuery(document).ready(function(){
    //slider setting options by tabbing
    jQuery('.ocavp-inner-block ul.tabs li').click(function(){
        var tab_id = jQuery(this).attr('data-tab');
        jQuery('.ocavp-inner-block ul.tabs li').removeClass('current');
        jQuery('.ocavp-inner-block .tab-content').removeClass('current');
        jQuery(this).addClass('current');
        jQuery("#"+tab_id).addClass('current');
    })

    jQuery('.ocavp_all_images ul li').click(function(){
        jQuery('.ocavp_all_images ul li').removeClass('ocavp-active');
        jQuery('input:radio[name="ocavp_aveliable_background"]').removeAttr('checked');
        jQuery(this).addClass('ocavp-active');
        jQuery(this).find('input:radio[name="ocavp_aveliable_background"]').attr('checked', 'checked');
        return false;
    })
})


jQuery(function($){
    
    var ocavpoptionval = jQuery('select.ocavp_restrict').val(); 
    if(ocavpoptionval == 'selectedcontent'){
        jQuery('.ocavp_selecteddata').show();
    } else {
        jQuery('.ocavp_selecteddata').hide();
    }

    $('body').on('change', 'select.ocavp_restrict', function(){
        var ocavpoptionval = jQuery('select.ocavp_restrict').val(); 
        if(ocavpoptionval == 'selectedcontent'){
            jQuery('.ocavp_selecteddata').show();
        } else {
            jQuery('.ocavp_selecteddata').hide();
        }
    });

    $('body').on('click', '.ocavp_upload_image_button', function(e){
        e.preventDefault();
            var button = $(this),
                custom_uploader = wp.media({
            title: 'Insert image',
            library : {
                type : 'image'
            },
            button: {
                text: 'Use this image' // button label text
            },
            multiple: false // for multiple image selection set to true
        }).on('select', function() { // it also has "open" and "close" events 
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            $(button).removeClass('button').html('<img class="true_pre_image" src="' + attachment.url + '" style="max-width:100px;height:100px;" />').next().val(attachment.id).next().show();
           jQuery(".ocavp_hidden_img").val(attachment.url);
        })
        .open();
    });

    /*
     * Remove image event
     */

    $('body').on('click', 'a.ocavp_remove_image_button', function(){
        $(this).parent().hide();
        $(this).parent().find("input[name$='ocavp_backgroundimage']").val('');
        return false;
    });

    $('body').on('click', '.ocavp_upload_limage_button', function(e){
        e.preventDefault();
            var button = $(this),
                custom_uploader = wp.media({
            title: 'Insert image',
            library : {
                type : 'image'
            },
            button: {
                text: 'Use this image' // button label text
            },
            multiple: false // for multiple image selection set to true
        }).on('select', function() { // it also has "open" and "close" events 
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            $(button).removeClass('button').html('<img class="true_pre_image" src="' + attachment.url + '" style="max-width:100px;height:100px;" />').next().val(attachment.id).next().show();
           jQuery(".ocavp_hidden_logoimg").val(attachment.url);
        })
        .open();
    });

    /*
     * Remove image event
     */
    $('body').on('click', '.ocavp_remove_limage_button', function(){
        $(this).parent().hide();
        $(this).parent().find("input[name$='ocavp_logoimage']").val('');
        return false;
    });
 
});