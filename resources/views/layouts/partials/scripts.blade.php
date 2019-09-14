@auth
<script>
var user = {{Auth::user()-> id}};

</script>
@endauth
<script src="{{asset('js/modernizr.min.js')}}"></script>
<script src="{{asset('js/moment.min.js')}}"></script>

<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>

<script src="{{asset('js/detect.js')}}"></script>
<script src="{{asset('js/fastclick.js')}}"></script>
<script src="{{asset('js/jquery.blockUI.js')}}"></script>
<script src="{{asset('js/jquery.nicescroll.js')}}"></script>

<script src="{{asset('js/jquery.scrollTo.min.js')}}"></script>


<!--script autocomplete-->
<script src="{{asset('js/typeahead.bundle.js')}}"></script>
<!--Tag input-->
<script src="{{asset('js/bootstrap-tagsinput.min.js')}}"></script>

<script src="{{asset('plugins/waypoints/lib/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('plugins/counterup/jquery.counterup.min.js')}}"></script>
<script src="{{asset('plugins/switchery/switchery.min.js')}}"></script>
<script src="{{asset('plugins/jquery.filer/js/jquery.filer.min.js')}}"></script>

<script src="{{asset('js/pikeadmin.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('plugins/waypoints/lib/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('plugins/counterup/jquery.counterup.min.js')}}"></script>

{{-- Para carga de script segun la ruta, usar! --}}
@switch(\Route::currentRouteName())
@case('category.show')
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="https://www.pikeadmin.com/demo-pro/assets/plugins/lightbox/ekko-lightbox.min.js"></script>
<script src="{{asset('js/categories/show.js')}}"></script>

@if (count($errors) > 0 && $modal==1)
<script>
    $(document).ready(function() {
        $('#fileModal').modal('show');
    });
</script>
@elseif (count($errors) > 0 && $modal==2)
<script>
    $(document).ready(function() {
        $('#categoryModal').modal('show');
    });
</script>
@elseif(count($errors) > 0 && $modal==3)
<script>
    $(document).ready(function() {
        $('#linkModal').modal('show');
    });
</script>
@endif
@break
@case('')
<script src="{{asset('js/categories/index.js')}}"></script>
@break
@case('users.index')
<script src="{{asset('js/admin/users/index.js')}}"></script>
@break

@default
@endswitch


<script>
    $(document).ready(function() {
        $('[data-toggle="popover"]').popover();
    });
</script>
