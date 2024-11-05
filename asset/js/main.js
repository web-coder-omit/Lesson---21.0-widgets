// (function($) {
 
//         $('#upload_img_btn').on('click', function(e) {
//             e.preventDefault();
//             console.log('clicked');
//         });
// })(jQuery);
(function($) {

        // $('#upload_img_btn').on('click', function(e) {
        //     // e.preventDefault();
        //     console.log('clicked');
        //     alert('working');
        // });


        var custom_uploader;

    $('#upload_img_btn').click(function(e) {
        e.preventDefault();

        var $upload_button = $(this);

        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });

        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function() {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            $upload_button.siblings('input[type="text"]').val(attachment.url);
        });

        //Open the uploader dialog
        custom_uploader.open();

    });

})(jQuery);
