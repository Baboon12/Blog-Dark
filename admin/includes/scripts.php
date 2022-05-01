<!-- Bootstrap core JavaScript-->
<script src="js/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Summernote JS - CDN Link -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script src="js/datatables.min.js"></script>

<script>
    $(document).ready(function() {
        // $("#summernote").summernote();
        $('#summernote').summernote({
            placeholder: 'Type Description Here',
            height: 100
        });
        $('.dropdown-toggle').dropdown();
    });
</script>
<!-- //Summernote JS - CDN Link -->

<script>
    $(document).ready(function() {
        $('#myDataTable').DataTable();
    });
</script>
</body>

</html>