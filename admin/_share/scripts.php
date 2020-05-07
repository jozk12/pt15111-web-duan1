<!-- jQuery -->
<script src="<?= ADMIN_ASSET_URL ?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= ADMIN_ASSET_URL ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= ADMIN_ASSET_URL ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= ADMIN_ASSET_URL ?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= ADMIN_ASSET_URL ?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= ADMIN_ASSET_URL ?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= ADMIN_ASSET_URL ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= ADMIN_ASSET_URL ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= ADMIN_ASSET_URL ?>plugins/moment/moment.min.js"></script>
<script src="<?= ADMIN_ASSET_URL ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= ADMIN_ASSET_URL ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= ADMIN_ASSET_URL ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= ADMIN_ASSET_URL ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>4
<!-- validate -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/additional-methods.min.js"></script>
<!-- sweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!-- AdminLTE App -->
<script src="<?= ADMIN_ASSET_URL ?>dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= ADMIN_ASSET_URL ?>dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= ADMIN_ASSET_URL ?>dist/js/demo.js"></script>
<script src="<?= ADMIN_ASSET_URL ?>plugins/select2/js/select2.full.min.js"></script>
<!-- DataTables -->
<script src="<?= ADMIN_ASSET_URL ?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= ADMIN_ASSET_URL ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="<?= ADMIN_ASSET_URL ?>dist/js/adminlte.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?= ADMIN_ASSET_URL ?>plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<script src="<?= ADMIN_ASSET_URL ?>plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- bootstrap color picker -->
<script src="<?= ADMIN_ASSET_URL ?>plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?= ADMIN_ASSET_URL ?>plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- ChartJS -->
<script src="<?= ADMIN_ASSET_URL ?>plugins/chart.js/Chart.min.js"></script>
<!-- tiny mce -->
<script src="https://cdn.tiny.cloud/1/606codtj0v7s9isbar04s6qhfnrn3min48c9lyu3v9dhcpa5/tinymce/5/tinymce.min.js" referrerpolicy="origin"/></script>
<script>
   tinymce.init({
      selector: '.content_mce'
    });
</script>
<!-- Page script -->
<script>
    $(document).ready(function() {
        <?php if (isset($_GET['msg'])) : ?>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: "<?= $_GET['msg']; ?>",
                showConfirmButton: false,
                timer: 1500
            });
        <?php endif; ?>
    });
</script>
<script>
  $(function() {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', {
      'placeholder': 'dd/mm/yyyy'
    })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', {
      'placeholder': 'mm/dd/yyyy'
    })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker({
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate: moment()
      },
      function(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function() {
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>