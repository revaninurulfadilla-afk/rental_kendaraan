<!-- jQuery -->
<script src="<?= base_url('assets/customer/js/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/customer/js/jquery-migrate-3.0.1.min.js') ?>"></script>
<script src="<?= base_url('assets/customer/js/popper.min.js') ?>"></script>
<script src="<?= base_url('assets/customer/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/customer/js/jquery.easing.1.3.js') ?>"></script>
<script src="<?= base_url('assets/customer/js/jquery.waypoints.min.js') ?>"></script>
<script src="<?= base_url('assets/customer/js/jquery.stellar.min.js') ?>"></script>
<script src="<?= base_url('assets/customer/js/owl.carousel.min.js') ?>"></script>
<script src="<?= base_url('assets/customer/js/jquery.magnific-popup.min.js') ?>"></script>
<script src="<?= base_url('assets/customer/js/aos.js') ?>"></script>
<script src="<?= base_url('assets/customer/js/jquery.animateNumber.min.js') ?>"></script>
<script src="<?= base_url('assets/customer/js/bootstrap-datepicker.js') ?>"></script>
<script src="<?= base_url('assets/customer/js/jquery.timepicker.min.js') ?>"></script>
<script src="<?= base_url('assets/customer/js/scrollax.min.js') ?>"></script>
<script src="<?= base_url('assets/customer/js/google-map.js') ?>"></script>
<script src="<?= base_url('assets/customer/js/main.js') ?>"></script>

<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/customer/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>">
</script>

<!-- AdminLTE App -->
<script src="<?= base_url('assets/customer/dist/js/adminlte.min.js'); ?>">
</script>

<!-- DataTables -->
<script src="<?= base_url('assets/customer/plugins/datatables/jquery.dataTables.min.js'); ?>">
</script>

<script src="<?= base_url('assets/customer/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>">
</script>

<script>
$(document).ready(function(){

    $('#dataTable').DataTable({

         language: {

            search: "Cari:",

            lengthMenu: "Tampilkan _MENU_ data",

            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",

            paginate: {

                previous: "Sebelumnya",

                next: "Berikutnya"

            }

        }

    });

});
</script>

</body>
</html>