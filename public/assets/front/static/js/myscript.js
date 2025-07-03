$("body").on('submit','#formreg',function(e){
    e.preventDefault();
    const formData = new FormData(e.target);
    $.ajax({
        method:"POST",
        url:$(this).prop('action'),
        data:formData,
        cache: false,
        processData: false,
        contentType: false,
        success:function(data){
            if(data.msg){
                toastr["success"](data.msg);
                setTimeout(() => {  location.reload(); }, 500);
            }else{
                toastr["error"](errMessage(data));
            }
        },
        error:function(erroe){
            alert("Something is wrong");
        }
    });
});

$("body").on('submit','#formforget',function(e){
    e.preventDefault();
    const formData = new FormData(e.target);
    $.ajax({
        method:"POST",
        url:$(this).prop('action'),
        data:formData,
        cache: false,
        processData: false,
        contentType: false,
        success:function(data){
                toastr["success"](data.msg);
        },
        error:function(erroe){
            alert("Something is wrong");
        }
    });
});

$("body").on('submit','#formlogin',function(e){
    e.preventDefault();
    const formData = new FormData(e.target);
    $.ajax({
        method:"POST",
        url:$(this).prop('action'),
        data:formData,
        cache: false,
        processData: false,
        contentType: false,
        success:function(data){
            if(data.url){
                toastr["success"](data?.welcome);
                location.reload();
            }else if(data.Msg){
                toastr["error"](data.Msg);
            }
            else{
                toastr["error"](data.errors);
            }
        },
        error:function(erroe){
            alert("Something is wrong");
        }
    });
});

$("body").on('submit','#Subscribe',function(e){
    e.preventDefault();
    const formData = new FormData(e.target);
    $.ajax({
        method:"POST",
        url:$(this).prop('action'),
        data:formData,
        cache: false,
        processData: false,
        contentType: false,
        success:function(data){
            if(data.error){
                toastr["error"](data.error);
                e.target.reset();
            }else{
             toastr["success"](data.msg);
                e.target.reset();
            }
        },
        error:function(erroe){
            alert("Something is wrong");
        }
    });
});


function errMessage(data){
    var Ptag = "";
    for(var error in data.errors){ Ptag +=data.errors[error]+'<br>'; }
    return Ptag;
}
function msg(data){
    var Ptag = "";
    for(var error in data.msg){ Ptag +=data.msg[error]+'<br>'; }
    return Ptag;
}

$('body').on('click','.quantity-plus',function(){
    var q = parseInt($(this).parent().find('.quantity').val())+parseInt($(this).parent().find('.quantity').attr('min-Quantity'));
    var max = parseInt($(this).parent().find('.quantity').attr('max'));
    if( q < max || $(this).parent().find('.quantity').attr('max') == "unlimited"){
        $(this).parent().find('.quantity').val(q);
    }
});
$('body').on('click','.quantity-minus',function(){
    var q = parseInt($(this).parent().find('.quantity').val())-parseInt($(this).parent().find('.quantity').attr('min-Quantity'));
    var min = parseInt($(this).parent().find('.quantity').attr('min')-1);
    if(q > min || $(this).parent().find('.quantity').attr('max') == "unlimited"){
        $(this).parent().find('.quantity').val(q);
    }
});

