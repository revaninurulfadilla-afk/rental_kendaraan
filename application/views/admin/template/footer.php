        </div>
    </div>

    <script src="<?= base_url('assets/admin/vendor/jquery/jquery.min.js'); ?>"></script>

    <script src="<?= base_url('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

    <script src="<?= base_url('assets/admin/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

    <script src="<?= base_url('assets/admin/vendor/datatables/jquery.dataTables.min.js'); ?>"></script>

    <script src="<?= base_url('assets/admin/vendor/datatables/dataTables.bootstrap4.min.js'); ?>"></script>

    <script src="<?= base_url('assets/admin/vendor/chart.js/Chart.min.js'); ?>"></script>

    <script src="<?= base_url('assets/admin/js/sb-admin-2.min.js'); ?>"></script>

    <script>
        $(document).ready(function(){

            $('#dataTable').DataTable({

                "language": {

                    "search": "Cari:",

                    "lengthMenu": "Tampilkan _MENU_ data",

                    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",

                    "paginate": {

                        "previous": "Sebelumnya",

                        "next": "Berikutnya"

                    }

                }

            });

        });
    </script>

</body>
</html>