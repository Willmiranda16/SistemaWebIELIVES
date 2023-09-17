<script src="{{ URL::asset('assets/bundles/lib.vendor.bundle.js')}}"></script>

<script src="{{ URL::asset('assets/bundles/counterup.bundle.js')}}"></script>
<script src="{{ URL::asset('assets/bundles/apexcharts.bundle.js')}}"></script>
<script src="{{ URL::asset('assets/bundles/summernote.bundle.js')}}"></script>

<script src="{{ URL::asset('assets/js/core.js')}}"></script>
<script src="{{ URL::asset('assets/js/page/index.js')}}"></script>
<script src="{{ URL::asset('assets/js/page/summernote.js')}}"></script>

<script src="{{ URL::asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{ URL::asset('assets/bundles/dataTables.bundle.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/sweetalert/sweetalert.min.js')}}"></script>

<script src="{{ URL::asset('assets/js/page/dialogs.js')}}"></script>
<script src="{{ URL::asset('assets/js/table/datatable.js')}}"></script>

<script src="{{ URL::asset('assets/plugins/dropify/js/dropify.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/form/dropify.js')}}"></script>

{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

<script>
    function evaluar_opciones() {
        setTimeout(() => {
            let opciones_tab = document.getElementsByClassName('opcion_tab');
            let opciones_tab2 = document.getElementsByClassName('opcion_tab2');
            for (let i = 0; i < opciones_tab.length; i++) {
                let opcion = opciones_tab[i].classList;
                let opcion2 = opciones_tab2[i].classList;
                /* setTimeout(() => { */
                    for (let i = 0; i < opcion.length; i++) {
                        if (opcion[i] == 'active') {
                            opcion.remove("active");
                            opcion2.add("active");
                        }else{
                            opcion2.remove("active");
                        }
                    }
                /* }, 250); */

            }
        }, 1);

    }
</script>

@yield('script')
