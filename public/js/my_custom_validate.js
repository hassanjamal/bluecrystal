$(document).ready(function() {
    $('#ajax-contact-form').bootstrapValidator({
        live: 'enabled',
        message: 'This value is not valid',
        submitButtons: 'button[type="submit"]',
        feedbackIcons: {
            pvalid: 'fa fa-check',
            invalid: 'fa fa-times',
            validating: 'fa fa-refresh'
        },
        fields: {
            name: {
                message: 'The Person name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Person name is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The Person name must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z ]*$/,
                        message: 'The Person name can only consist of alphabetical, dot and underscore'
                    },
                }
            },
            email: {
                validators: {
                    notEmpty:{
                        message:'Email is required and cannot be empty'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    },
                },
            },

            phone_number:{
                validators:{
                    notEmpty:{
                        message: 'Phone Number is required and connot be empty'
                    },
                    digits:{
                        message: 'Phone number contains digits only'
                    }
                }
            },
            message: {
                validators: {
                    notEmpty: {
                        message: 'Message is required and cannot be empty'
                    },
                    stringLength:{
                        min:50,
                        max:500,
                        message:'The message must be more than 50 and less than 500 characters long'
                    }
                }
            },
        }
    });

    $('#resetBtn').click(function() {
        $('#ajax-contact-form').data('bootstrapValidator').resetForm(true);
    });
});
