<!--<script src="../cart_components/datatables.net/js/jquery.dataTables.min.js"></script>-->
<!--<script src="../cart_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>-->
<!---->
<!--<script>-->
<!--    $(function () {-->
<!--        $('#example1').DataTable({-->
<!--            responsive: true-->
<!--        })-->
<!--        $('#example2').DataTable({-->
<!--            'paging'      : true,-->
<!--            'lengthChange': false,-->
<!--            'searching'   : false,-->
<!--            'ordering'    : true,-->
<!--            'info'        : true,-->
<!--            'autoWidth'   : false-->
<!--        })-->
<!--    })-->
<!--</script>-->
<script src="../cart_components/moment/min/moment.min.js"></script>
<script src="../cart_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../cart_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script src="../cart_components/ckeditor/ckeditor.js"></script>
<script>
    $(function(){
        //Initialize Select2 Elements
        $('.select2').select2()

        //CK Editor
        CKEDITOR.replace('editor1')
        CKEDITOR.replace('editor2')
    });
</script>