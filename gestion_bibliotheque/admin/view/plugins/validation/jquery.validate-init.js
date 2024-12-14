jQuery(".form-valide").validate( {
    ignore:[], errorClass:"invalid-feedback animated fadeInDown", errorElement:"div", errorPlacement:function(e, a) {
        jQuery(a).parents(".form-group > div").append(e)
    }
    , highlight:function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
    }
    , success:function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
    }
    , rules: {
        "val-date": {
            required: !0
        }
        , "val-email": {
            required: !0, email: !0
        }
        , "val-password": {
            required: !0, minlength: 5
        }
        , "val-confirm-password": {
            required: !0, equalTo: "#val-password"
        }
        , "val-select2": {
            required: !0
        }
        , "val-select2-multiple": {
            required: !0, minlength: 2
        }
        , "val-suggestions": {
            required: !0, minlength: 5
        }
        , "val-skill": {
            required: !0
        }
        , "val-currency": {
            required: !0, currency: ["$", !0]
        }
        , "val-website": {
            required: !0
        }
        , "val-remark": {
            required: !0
        }
        , "leave-type": {
            required: !0
        }
        , "leave-cat": {
            required:  function (element) {
        if ($("#leave-cat").val() == 'Full Day') {
            $("#leave-date").removeAttr('required',true);
            $("#time-period").removeAttr('required',true);
            
            $("#start-date").prop('required',true);
            $("#end-date").prop('required',true);
           
            return false;
        }
         else if ($("#leave-cat").val() == 'Half Day') {
             $("#start-date").removeAttr('required',true);
            $("#end-date").removeAttr('required',true);
            $("#leave-date").prop('required',true);
            $("#time-period").prop('required',true);
            
            return false;
        }
        else{
             
            return true;
        }
                    
            }
        }, 
         "tour-cat": {
            required:  function (element) {
        if ($("#tour-cat").val() == 'Full Day') {
             $("#leave-date").removeAttr('required',true);
            $("#time-period").removeAttr('required',true);
            $("#start-date").prop('required',true);
            $("#end-date").prop('required',true);
            return false;
        }
         else if ($("#tour-cat").val() == 'Half Day') {
             $("#start-date").removeAttr('required',true);
            $("#end-date").removeAttr('required',true);
            $("#leave-date").prop('required',true);
            $("#time-period").prop('required',true);
            return false;
        }
        else{
             
            return true;
        }
                    
            }
        }, 
       
        "remarks": {
            required: !0
        }
        , "val-phoneus": {
            required: !0, phoneUS: !0
        }
        , "val-digits": {
            required: !0, digits: !0
        }
        , "val-number": {
            required: !0, number: !0
        }
        , "val-range": {
            required: !0, range: [1, 5]
        }
        , "val-terms": {
            required: !0
        }
        , "firstname": {
            required: !0
        }
        , "lastname": {
            required: !0
        }
        , "emailid": {
            required: !0
        }
        , "pwd": {
            required: !0
        }
        , "department": {
            required: !0
        }
    }
    , messages: {
        "val-date": {
            required: "Please select a date"
        }
        , "val-email":"Please enter a valid email address", "val-password": {
            required: "Please provide a password", minlength: "Your password must be at least 5 characters long"
        }
        , "val-confirm-password": {
            required: "Please provide a password", minlength: "Your password must be at least 5 characters long", equalTo: "Please enter the same password as above"
        }
        , "val-select2":"Please select a value!", "val-select2-multiple":"Please select at least 2 values!", "val-suggestions":"What can we do to become better?", "val-skill":"Please select office location", "val-currency":"Please enter a price!", "val-website":"Please select office location", "val-remark":"Please enter remark", "leave-type":"Please select leave type", "leave-cat":"Please select leave category", "start-date":"Please select start date", "end-date":"Please select end date", "leave-date":"Please select date", "time-period":"Please select time period", "remarks":"Please enter remark", "tour-cat":"Please select tour category", "val-phoneus":"Please enter a US phone!", "val-digits":"Please enter only digits!", "val-number":"Please enter a number!", "val-range":"Please enter a number between 1 and 5!", "val-terms":"You must agree to the service terms!"
    }
}

);