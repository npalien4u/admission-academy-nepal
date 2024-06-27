// Class definition

var KTFormWidgets = function() {
    // Private functions
    var validator;
    var validater2;
    var validator3;



    var initValidation = function() {
        validator = $("#kt_form_1").validate({
            // define validation rules
            rules: {

                first_name: { required: true },
                last_name: { required: true },

                dob_year_bs: { required: true },
                dob_month_bs: { required: true },
                dob_date_bs: { required: true },

                gender: { required: true },
                admission_grade: { required: true },
                admission_type: { required: true },

                admission_session: { required: true },

                p_state: { required: true },
                p_district: { required: true },
                p_city_vdc: { required: true },

                previous_school_name: { required: true },
                admission_faculty: { required: true },

                mobile_number: { required: true },
                username: {
                    required: true,
                    remote: {
                        url: $("#kt_form_1").attr("data-validate-user"),
                        type: "post"
                    }
                },
                password: { required: true },
                confirm_password: {
                    required: true,
                    equalTo: "#password"
                },
                consent_signed: { required: true },
            },

            messages: {


                username: {
                    remote: "Username is already taken"
                },
                consent_signed: {
                    required: "Consent must be accepted"
                },
                confirm_password: {
                    equalTo: "Password mismatch"
                },


            },

            //display error alert on form submit  
            invalidHandler: function(event, validator) {
                var alert = $('#kt_form_1_msg');
                alert.removeClass('kt--hide').show();
                KTUtil.scrollTo('m_form_1_msg', -200);
            },

            submitHandler: function(form) {
                form[0].submit(); // submit the form
            }
        });


        validator2 = $("#kt_form_settings").validate({
            // define validation rules
            rules: {
                name: {
                    required: true,

                },



                phone: {
                    required: true,
                },

                email: {
                    required: true,
                    email: true
                },
                username: {
                    required: true,
                    remote: {
                        url: $("#kt_form_1").attr("data-validate-user"),
                        type: "post"

                    }
                }
            },

            messages: {
                name: {
                    required: "Name is required"
                },

                email: {
                    required: "Email is required",
                    email: "Email must be valid address"
                }
            },

            //display error alert on form submit  
            invalidHandler: function(event, validator2) {
                var alert = $('#kt_form_settings_msg');
                alert.removeClass('kt--hide').show();
                KTUtil.scrollTo('m_form_1_msg', -200);
            },

            submitHandler: function(form) {
                form[0].submit(); // submit the form
            }
        });


        validator2 = $("#kt_form_password").validate({
            // define validation rules
            rules: {
                password: {
                    required: true,

                },
                confirm_password: {
                    required: true,
                    equalTo: "#password"
                },

            },

            messages: {
                password: {
                    required: "Password is required"
                },

                confirm_password: {
                    required: "Confirm Password is required",
                    equalTo: "Confirm password mismatch"
                },
            },

            //display error alert on form submit  
            invalidHandler: function(event, validator2) {
                var alert = $('#kt_form_settings_msg');
                alert.removeClass('kt--hide').show();
                KTUtil.scrollTo('m_form_1_msg', -200);
            },

            submitHandler: function(form) {
                form[0].submit(); // submit the form
            }
        });


    }

    return {
        // public functions
        init: function() {
            //initWidgets();
            initValidation();
        }
    };
}();

jQuery(document).ready(function() {
    KTFormWidgets.init();
});