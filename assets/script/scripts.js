
jQuery(document).ready( ($) => {

    // search on keyup
        $('#search').on('keyup', (e) => {
            $.each( $('table').find('.search-data'), ( i, el ) => {
                if( $(el).text().toLowerCase().indexOf( $(e.currentTarget).val().toLowerCase() ) === -1 ){ // hide row, if no result
                    $(el).parent().hide()
                } else{ // show row, if result exist
                    $(el).parent().show()
                }
            })
        })
    
   // open modal
        $('.modal-open').click( (e) => {
            $.ui.dialog.prototype._focusTabbable = () => {}
            const id = $(e.currentTarget).data('id')
            const action = $(e.currentTarget).data('action')

            $.ajax({
                url: '/pages/modal-user-form.php',
                type: 'post',
                cache: false,
                data: { id, action },
                success: (result) => {
                    $.getScript('/assets/script/modal.js')
                    $('.modal').show()
                    $('.dialog').html(result)

                    // open modal
                        $('.dialog').dialog({
                            closeText: 'X',
                            modal: true,
                            resizable: false,
                            draggable: false,
                        })

                    // close modal
                        $('.close-modal, .close-modal-btn').click( (e) => {
                            $('.dialog').dialog('close').html('')
                            $('.modal').hide()
                        })
                }
            })
        })

    // close notification
        $('.close-note').click( (e) => {
            $(e.currentTarget).parent().fadeOut()
        })

    // hide notification after 3 second
        if( $('.note-cont').length ){
            setTimeout( (e) => {
                $('.note-cont').fadeOut()
            }, 3000);
        }

})