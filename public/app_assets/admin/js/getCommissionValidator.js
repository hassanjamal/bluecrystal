$(document).ready(function() {
    $('#associate_commission').bootstrapValidator({
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
                        message:'This is not a valid Associate',
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
            start_date:{
                message: 'This is not valid Start date',
                validators:{
                    date:{
                        format:'DD-MM-YYYY',
                        message:'The Value is not a valid date'
                    },
                    notEmpty:{
                        message: 'Start Date is required'
                    }
                }
            },

            end_date:{
                message: 'This is not valid End date',
                validators:{
                    date:{
                        format:'DD-MM-YYYY',
                        message:'The Value is not a valid date'
                    },
                    notEmpty:{
                        message: 'End Date is required'
                    }
                }
            }
        }
    });

    $('#reset').click(function() {
        $('#associate_commission').data('bootstrapValidator').resetForm(true);
    });
});

