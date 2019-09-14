var buttonsUpdate = document.getElementsByName("update_user");
Array.from(buttonsUpdate).forEach(button=>{
    button.addEventListener('click',(ev)=>{
        id = button.getAttribute('id').split('_')[0];
        form = document.getElementById('form_for_update').setAttribute('action',window.location.origin+'/users/'+id);
        url= window.location.origin+"/api/getuser/"+id;
        $.ajax({
            method:'GET',
            url: url,
        }).done(function(e){
            document.getElementById('name_updated').value = e.name;
            document.getElementById('email_updated').value = e.email;
            document.getElementById('role_id_updated').value = e.role_id;
        }).fail(function(e){
        });
    })
})


var buttonsDestroy = document.getElementsByName("destroy_user");
Array.from(buttonsDestroy).forEach(button=>{
    button.addEventListener('click',(ev)=>{
        id = button.getAttribute('id').split('_')[0];
        form = document.getElementById('form_for_delete').setAttribute('action',window.location.origin+'/users/'+id);
        url= window.location.origin+"/api/getuser/"+id;
        $.ajax({
            method:'GET',
            url: url,
        }).done(function(e){
            document.getElementById('delete-message').innerHTML = '¿Esta seguro de eliminar a <b>'+e.name+'</b> del sistema?';
        })
    })
})

var changeState = (user_id)=>{
    url= window.location.origin+"/api/changestate/";
    $.ajax({
        method:'POST',
        url: url,
        data: {
            authUser : user,
            id_to_change: user_id
        },
    }).done(function(e){
        alert('cambiado con exito')
        console.log(this)
    }).fail(function(e){

    });
}

