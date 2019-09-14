var buttonFavs = document.getElementsByClassName('button-favorite');
console.log(buttonFavs);

Array.from(buttonFavs).forEach(val=>{
    val.addEventListener('click', ()=>{
        id_cat = val.getAttribute('cat_id')
        console.log('aqui esta el puerto: ')
        url_path = window.location.origin
        console.log(url_path)
        if(val.classList.contains('selected')){
            $('.toast.remove.'+id_cat).toast('show');
            url= url_path+"/api/removefavorite";
            $.ajax({
                method:'POST',
                url: url,
                data: {
                    id : user,
                    cat: val.getAttribute('cat_id')
                },
            }).done(function(e){
                $('.toast.removedone.'+id_cat).toast('show');
                val.classList.remove("selected");
            }).fail(function(e){
                console.log(e);
            });
        }else{
            $('.toast.add.'+id_cat).toast('show');
            url= url_path+"/api/addfavorite";
            $.ajax({
                method:'POST',
                url: url,
                data: {
                    id : user,
                    cat: val.getAttribute('cat_id')
                },
            }).done(function(e){
                $('.toast.adddone.'+id_cat).toast('show');
                val.classList.add("selected");
            }).fail(function(e){
            })
        }
    });
})
var buttonsUpdate = document.getElementsByName("update_category");
Array.from(buttonsUpdate).forEach(button=>{
    button.addEventListener('click',(ev)=>{
        id = button.getAttribute('id').split('_')[0];
        form = document.getElementById('form_for_cat_update').setAttribute('action',window.location.origin+'/category/'+id);
        url= window.location.origin+"/api/getcat/"+id;
        $.ajax({
            method:'GET',
            url: url,
        }).done(function(e){
            document.getElementById('cat_updated').value = e.category_name;
        }).fail(function(e){
        });
    })
})
$(document).ready(function() {
    var table = $('#table-documents').DataTable({
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrando _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    });


     $('#close-modal').click(function(e) {
            console.log(e);
            e.preventDefault();
             $('#video-embed').children('iframe').attr('src', '');
    });


    table.columns().every( function () {
        var that = this;

        $( 'input', this.header() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );
