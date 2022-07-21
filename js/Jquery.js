
$( "#submit" ).click(function() {
jQuery('#frm').validate({
    rules:{
        user_id:"required",
        pwd:"required"

    }, messages :{
        user_id:"Please Enter your User Id",
        pwd:"Please Enter your Password"
    }


});

})