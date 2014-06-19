$(document).ready(function() {
    $('#form-user').bootstrapValidator({
        live: 'enabled',
        message: 'This value is not valid',
        submitButtons: 'button[type="submit"]',
        feedbackIcons: {
            valid: 'fa fa-check',
            invalid: 'fa fa-times',
            validating: 'fa fa-refresh'
        },
        fields: {
            first_name: {
                message: 'The Person first name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Person first name is required '
                    },
                    regexp: {
                        regexp: /^[a-zA-Z]*$/,
                        message: 'The Person first name can only consist of alphabetical'
                    },
                }
            },
            last_name: {
                message: 'The Person last name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Person last name is required '
                    },
                    regexp: {
                        regexp: /^[a-zA-Z]*$/,
                        message: 'The Person last name can only consist of alphabetical'
                    },
                }
            },
            email:{
                message: 'The Email Address is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Email Address is required '
                    },
                    emailAddress: {
                        message: 'The value is not a valid email address'
                    },
                }
            },
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


