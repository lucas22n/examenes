<!-- Bootstrap core JavaScript-->
    <script src="../../Assets/Admin/vendor/jquery/jquery.min.js"></script>
    <script src="../../Assets/Admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../Assets/Admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../Assets/Admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../Assets/Admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../Assets/Admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../Assets/Admin/js/demo/datatables-demo.js"></script>

    <script type="text/javascript">


        $(document).ready(function() {
          var last_valid_selection = null;
          $('#questions').change(function(event) {
            var radioValue = $("input[name='countQuestionRadio']:checked").val();
            if ($(this).val().length > radioValue ) {

              $(this).val(last_valid_selection);
            } else {
              last_valid_selection = $(this).val();
            }
          });
        });
        </script>

    <script src="../../Assets/js/overhang.min.js"></script>
    <script src="../../Assets/js/app.js"></script>
</body>

</html>