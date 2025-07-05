$('.alert-danger> .close').on('click',function(){
    $(this).parent().hide();
});

$('.alert-success> .close').on('click',function(){
    $(this).parent().hide();
});

document.getElementById('formCreate')?.addEventListener("reset",formreset);
// document.getElementById('formEdit')?.addEventListener("reset",formreset);

function formreset(){
    
    $element = $(event.currentTarget);
    $element.find('select').each(function (i, select) {
        var $select = $(select);
    
        // Make sure that the select has Select2.
        if($select.hasClass("select2-hidden-accessible")) {
            if($select[0].options.length < 1) { return; }
            if($select[0].options[0].value !== '') {return; }
            if($select.prop('multiple')) $select.val([]).trigger('change');
            else $select.val('').trigger('change');
        }
    });
}

$(document).on('click','.action-list .delete',function(e){
    e.preventDefault();
    $confirm('Do you want to delete ?',"#3699FF").then(()=>{
        $.get($(this).attr('href'),function(){
        }).done(function(data){
            if(data.length > 250000){
                $toast("Access Denied", "#3699FF");
            }else{
                $toast(data.msg, "#3699FF");
            $('#geniustable').DataTable().ajax.reload(null, false);
            $('#kt_datatable1')?.DataTable().ajax.reload(null, false);
            }
            
        });
    });
});

$(document).on('click','.action-list.delete',function(e){
    e.preventDefault();
    $confirm('Do you want to delete ?',"#3699FF").then(()=>{
        $.get($(this).attr('href'),function(){
        }).done(function(data){
            if(data.length > 250000){
                $toast("Access Denied", "#3699FF");
            }else{
                $toast(data.msg, "#3699FF");
            $('#geniustable').DataTable().ajax.reload(null, false);
            $('#kt_datatable1')?.DataTable().ajax.reload(null, false);
            }
            
        });
    });
});


$('#formCreate').submit(function(e){
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
                $('.alert-success>div').html('<p>'+data.msg+'</p>');
                $('.alert-success').show();
                e.target.reset();
            }else{
                var Ptag = "";
                for(var error in data.errors) { Ptag +='<p>'+data.errors[error]+'</p>'; };
                $('.alert-danger>div').html('');
                $('.alert-danger>div').html(Ptag);
                $('.alert-danger').show();
            }
            console.log(data);
            window.scrollTo({top:0,behavior:'smooth'});
        },
        error:function(erroe){
            console.log(erroe);
            window.scrollTo({top:0,behavior:'smooth'});
            alert("Something is wrong");
        }
    });
});

$('#formEdit').submit(function(e){
    e.preventDefault();
    const formData = new FormData(e.target);
    $.ajax({
        method:"POST",
        url:$(this).prop('action'),
        data:new FormData(e.target),
        cache: false,
        processData: false,
        contentType: false,
        success:function(data){
            if(data.msg){
                $('.alert-success>div').html('<p>'+data.msg+'</p>');
                $('.alert-success').show();
            }else{
                var Ptag = "";
                for(var error in data.errors) { Ptag +='<p>'+data.errors[error]+'</p>'; };
                $('.alert-danger>div').html('');
                $('.alert-danger>div').html(Ptag);
                $('.alert-danger').show();
            }
            console.log(data);
            window.scrollTo({top:0,behavior:'smooth'});
        },
        error:function(erroe){
            console.log(erroe);
            window.scrollTo({top:0,behavior:'smooth'});
            alert("Something is wrong");
        }
    });
});
$('select:not([multiple])').not('.avoide').each(function( index ) {
   $(this).select2({ allowClear: true });
 });


