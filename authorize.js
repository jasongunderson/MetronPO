
$(document).ready(function(){
alert ("JavaScript is working");

//----------------------------------------------------------------------------------------------------------
//---------------------------------------- Submit New PO Request--------------------------------------------
//----------------------------------------------------------------------------------------------------------

    $("#submit_button").click(function(){
    	alert ("button click works");
    	event.preventDefault();

        var facility = $("#facility").val();
        var vendor = $("#vendor").val();
        var item = $("#item").val();
        var quantity = $("#quantity").val();
        var reason = $("#reason").val();

        alert (facility." ".vendor." ".item." ".quantity." ".reason);

    //     $.ajax({
    //         url: 'http://10.1.25.9/inventory/listmodel.php',
    //         type: 'post',
    //         data: {type:menuType},
    //         dataType: 'json',
    //         success:function(response){
            	
    //             var len = response.length;
                

    //             $("#computer_model").empty();
    //             for( var i = 0; i<len; i++){
    //                 var model = response[i];
                    
    //                 $("#computer_model").append("<option value='"+model+"'>"+model+"</option>");

    //             }
    //         }
    //     });
    });



}); // end of on load function