jQuery(document).ready( ($) => {

    // add \ change \ delete user in cookie
        $('.user-action-btn').click( (e) => {

            const form_data = $('#client-form').serialize();
            const action = $(e.currentTarget).data('action')

            $.ajax({
                url: '/assets/ajax/cookie-user.php',
                type: 'post',
                cache: false,
                data: { form_data, action },
                success: (result) => {
                    console.log(result)
                }
            })
        })

})