/**
 * Function to hide the kaya_welcome_notice once it is dismissed
 */
jQuery(document).on( 'click', '.kaya-welcome-notice-dismiss .notice-dismiss', function() {

    jQuery.ajax({
        url: ajaxurl,
        data: {
            action: 'kaya_welcome_notice_dismiss',
            type: type,
        }
    })

})