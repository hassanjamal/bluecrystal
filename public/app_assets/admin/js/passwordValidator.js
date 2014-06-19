$(document).ready(function() {
    $('#form-password').bootstrapValidator({
        live: 'enabled',
        message: 'This value is not valid',
        submitButtons: 'button[type="submit"]',
        feedbackIcons: {
            valid: 'fa fa-check',
            invalid: 'fa fa-times',
            validating: 'fa fa-refresh'
        },
        fields: {
            password: {
                validators: {
                    notEmpty: {
                        message: 'The Password is required '
                    },
                }
            },
            password_confirmation: {
                validators: {
                    notEmpty: {
                        message: 'The Password Confirmmation is required '
                    },
                    identical: {
                        field: 'password',
                        message: 'The Password and its confirm are not the same'
                    }
                }
            }
        }
    });

    // $('#resetBtn').click(function() {
    //     $('#policy').data('bootstrapValidator').resetForm(true);
    // });
});


