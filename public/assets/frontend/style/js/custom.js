$(function($){
	'use strict';
	  var base_url = $('#base-url').val();


    $('body').on('blur','#check_username',function(e){
        e.preventDefault();
        var username=$(this).val();
        if (username !=="") {
            $.ajax({
                url:$(this).attr('data-url'),
                method:"POST",
                data:{username:username},
                success:function(response){
                    var data=JSON.parse(response);
                    if (data.alert=="success") {
                        $('.available_username_status').html("<span class='text-success'>"+data.message+"</span>");
                    }else{
                        $('.available_username_status').html("<span class='text-danger'>"+data.message+"</span>");
                    }
                }
            });
        }else{
            $('.available_username_status').html("");
        }
    });


    $('body').on('submit','#update_profile_form',function(e){
        e.preventDefault();
         
        let formDta = new FormData(this);
        $.ajax({
          url: $(this).attr('data-action'),
          method: "POST",
          data: formDta,
          cache: false,
          contentType: false,
          processData: false,
          success:function(response){
            let data=JSON.parse(response);
            if (data.status===200) {
              $('#alert_section').html('<div class="alert alert-success"> <i class="fas fa-check-circle"></i>'+data.message+'</div>').show();
            }else{
              $('#alert_section').html('<div class="alert alert-success"> <i class="fas fa-check-circle"></i>'+data.message+'</div>').show();
            }
            
           
           
          },
          error:function(response){
            console.log(response);

              $('#alert_section').html('<div class="alert alert-primary"> <i class="fas fa-check-circle"></i>'+response.responseJSON.errors['name'][0]+'</div>').show();
          }
        })
       
    });


});