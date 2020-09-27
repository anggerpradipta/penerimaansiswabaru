    </div>
    <script src="../asset/js/jquery-3.2.1.min.js"></script>
    <script src="../asset/js/materialize.min.js"></script>
    <script>
       $(document).ready(function() {

                $('.button-collapse').sideNav({
                    menuWidth: 250, // Default is 300
                    closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
                    draggable: true, // Choose whether you can drag to open on touch screens,  
                });

                $('ul.tabs').tabs();

                $('select').material_select();

                $('.tooltipped').tooltip({
                    delay: 50
                });

                // validasi
                $('.hapus').click(function() {
                    var konfirmasi = confirm("Apakah anda ingin menghapus data ini?");
                    if (konfirmasi) {
                        return true;
                    } else {
                        return false;
                    }
                });

                $('#submit_sekolah').click(function() {

                    var error = false;

                    var nama_sekolah = $("#nama_sekolah").val();
                    var kecamatan = $("select[name=id_kecamatan]").val();
                    var alamat_sekolah = $("#alamat_sekolah").val();

                    $("#nama_sekolah").on("keyup", function() {
                        $(".nama_sekolah_invalid").hide();
                    });

                    if (nama_sekolah === "") {
                        $(".nama_sekolah_invalid").text("Kolom isian Nama Sekolah tidak boleh kosong");
                        error = true;
                    }

                    $("select[name=id_kecamatan]").on("change", function() {
                        $(".kecamatan_invalid").hide();
                    });

                    if (kecamatan === null) {
                        $(".kecamatan_invalid").text("Pilihan Kecamatan tidak boleh kosong");
                        error = true;
                    }

                    $("#alamat_sekolah").keyup(function() {
                        $(".alamat_sekolah_invalid").hide();
                    });

                    if (kecamatan === null) {
                        $(".alamat_sekolah_invalid").text("Kolom isian Alamat Sekolah tidak boleh kosong");
                        error = true;
                    }

                    return !error;

                });

                $('#submit_kecamatan').click(function() {
                    var error = false;

                    if ($("#nama_kecamatan").val() === "") {
                        alert("Kolom isian Nama kecamatan tidak boleh kosong!!!")
                        error = true;
                    }

                    return !error;

                });
            });
    </script>
</body>

</html>