$(document).ready(function(){

    $.validator.addMethod("regx", function(value, element, regexpr) {
        return regexpr.test(value);
    }, "Wrong format");

    $("#js-register-form").validate({

        rules:{

            name:{
                required: true,
                regx: /^[0-9a-zа-пр-яё]+$/i,
                minlength: 4,
                maxlength: 64,
            },

            lastname:{
                required: true,
                regx: /^[0-9a-zа-пр-яё]+$/i,
                minlength: 4,
                maxlength: 64,
            },

            email:{
                required: true,
                email: true
            },

            password:{
                required: true,
                minlength: 6,
                maxlength: 64,
            },
            password_confirmation:{
                required: true,
                equalTo: "#exampleInputPassword1"
            }
        },


    });

    $("#js-feedback-form").validate({

        rules:{

            name:{
                required: true,
                regx: /^[0-9a-zа-пр-яё]+$/i,
                minlength: 4,
                maxlength: 64,
            },

            email:{
                required: true,
                email: true
            },

            text:{
                required: true,
                regx: /^[\w]+/i,
                minlength: 4,
                maxlength: 1000,
            },
        },


    });

});