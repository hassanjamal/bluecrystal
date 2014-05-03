$(document).ready(function() {
    $('#policy').bootstrapValidator({
        live: 'enabled',
        message: 'This value is not valid',
        submitButtons: 'button[type="submit"]',
        feedbackIcons: {
            valid: 'fa fa-check',
            invalid: 'fa fa-times',
            validating: 'fa fa-refresh'
        },
        fields: {
            associate_no:{
                message: 'Associate No is not valid',
                validators:{
                    notEmpty:{
                        message: 'The Associate number is required '
                    },
                    remote:{
                        message:'This is not a valid associate',
                        url: 'add_to_associate_id',
                        name:'associate_no',
                        data: function(validator){
                            return{
                                associate_no: validator.getFieldElements('associate_no').val()
                            };
                        }
                    }
                },
            },
            // scheme_name:{
            //         message: 'Scheme name is not valid',
            //         validators:{
            //             notEmpty:{
            //                 message: 'The Scheme Name is required '
            //             },
            //             remote:{
            //                 message:'This is not a valid scheme',
            //                 url: 'add_to_fd_scheme_id',
            //                 name:'scheme_name',
            //                 data: function(validator){
            //                     return{
            //                         scheme_name: validator.getFieldElements('scheme_name').val()
            //                     };
            //                 }
            //             }
            //         },
            //     },

            name: {
                message: 'The Person name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Person name is required '
                    },
                    regexp: {
                        regexp: /^[a-zA-Z ]*$/,
                        message: 'The Person name can only consist of alphabetical and space'
                    },
                }
            },
            guardian_name:{
                message: 'The Guardian Name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Guardian Name is required '
                    },
                    regexp: {
                        regexp: /^[a-zA-Z ]*$/,
                        message: 'The Guardian Name can only consist of alphabetical and space'
                    },
                }
            },
            pan_no:{
                message: 'The PAN number is not valid',
                validators: {
                    regexp: {
                        regexp: /^[a-z|A-Z|0-9]*$/,
                        message: 'The PAN number can only consist of alphabetical and digits'
                    },
                    stringLength:{
                        min:10,
                        max:10,
                        message:'PAN number must be ten characters'
                    }
                }
            },
            mobile:{
                message: 'The Mobile number is not valid',
                validators:{
                    notEmpty:{
                        message: 'Mobile Number is required '
                    },
                    digits:{
                        message: 'Mobile number contains digits only'
                    },
                    stringLength:{
                        min:10,
                        max:10,
                        message:'Mobile number must be ten digits'
                    }
                }
            },
            address: {
                validators: {
                    notEmpty:{
                        message:'Address is required '
                    },
                    regexp: {
                        regexp: /^[a-z|A-Z|0-9|_|,| |-]*$/,
                        message: 'Address can only consist of alphabetical, digits, comma and some special character '
                    },
                },
            },

            city: {
                validators: {
                    notEmpty:{
                        message:'City is required '
                    },
                    regexp: {
                        regexp: /^[a-z|A-Z| |]*$/,
                        message: 'City can only consist of alphabetical and space'
                    },
                },
            },


            state: {
                validators: {
                    notEmpty:{
                        message:'State is required '
                    },
                    regexp: {
                        regexp: /^[a-z|A-Z| |]*$/,
                        message: 'State can only consist of alphabetical and space'
                    },
                },
            },
            pincode:{
                validators:{
                    digits:{
                        message: 'Pincode contains digits only'
                    },
                    stringLength:{
                        min:6,
                        max:6,
                        message:'Pincode must be six digits only'
                    }
                }
            },
            nominee_name:{
                validators: {
                    regexp: {
                        regexp: /^[a-zA-Z ]*$/,
                        message: 'The Nominee name can only consist of alphabetical and space'
                    },
                }
            },
            nominee_add:{
                validators: {
                    regexp: {
                        regexp: /^[a-z|A-Z|0-9|_|,| |-]*$/,
                        message: 'Address can only consist of alphabetical, digits, comma and some special character '
                    },
                },
            },
            nominee_relation:{
                validators: {
                    regexp: {
                        regexp: /^[a-zA-Z]*$/,
                        message: 'The Nominee relative can only consist of alphabetical'
                    },
                }
            },
        }
    });

    $('#resetBtn').click(function() {
        $('#policy').data('bootstrapValidator').resetForm(true);
    });
});

