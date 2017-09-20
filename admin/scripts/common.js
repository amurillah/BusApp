$(document).ready(function() {
    if ($('.datatable-1').length > 0) {
        $('.datatable-1').dataTable();
        $('.dataTables_paginate').addClass('btn-group datatable-pagination');
        $('.dataTables_paginate > a').wrapInner('<span />');
        $('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
        $('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
    }
    
    $("#addbus").validate({
        onfocusout: false,
        focusInvalid: false,
        rules: {
            newcity: {
                required: true
            }
        },
        messages: {
            newcity: {
                required: "Please Enter CityName"               
            }
        }        
    });
    
    $("#admin-login").validate({
        onfocusout: false,
        focusInvalid: false,
        rules: {
            username: {
                required: true
            },
            password:{
                required:true
            }
        }        
    });
    
       
    $("#addnewbus").validate({
       onfocusout:false,
       focusInvalid:false,
       rules:{
           fromcity:{
               required:true
           },
           tocity:{
               required:true
           },
           bustype:{
               required:true
           },
           busroute:{
               required:true
           },
           pickuptime:{
               required:true
           },
           droptime:{
               required:true
           },
           fare:{
               required:true
           },
           totalseat:{
               required:true
           }
       }
    });
});
