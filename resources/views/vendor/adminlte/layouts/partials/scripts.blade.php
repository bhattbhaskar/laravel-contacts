<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js -->
<!-- Laravel App -->

<!-- Datatable JS -->


    <script src="{{ url('/') . mix('/js/app.js') }}" type="text/javascript"></script>


<script type="text/javascript" src="{{ asset('/js/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>


<script type="text/javascript" src="https://uxsolutions.github.io/bootstrap-datepicker/bootstrap-datepicker/js/bootstrap-datepicker.min.js"> </script>

<script type="text/javascript" src="{{ asset('/js/contact.js') }}"></script>


<!-- Datatable JS -->
<script src="{{ asset('/js/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('/js/datatables/dataTables.bootstrap.js') }}"></script>
<script type="text/javascript">
    $(function() {
        $("#datatable1").dataTable({
            pageLength: 25,
            responsive: true
        });
    });
</script>
<!-- Datatable JS End-->




<!-- Datatable JS End-->


<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
<script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
</script>
