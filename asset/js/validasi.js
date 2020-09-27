$(document).ready(function() {
    $('#submit_daftar').click(function() {

        var error = false;

        $("#nama_lengkap").keyup(function() {
            $(".nama_lengkap_invalid").hide();
        });

        if ($("#nama_lengkap").val() === "") {
            $(".nama_lengkap_invalid").text("Kolom isian Nama Lengkap tidak boleh kosong");
            error = true;
        }

        $("input[name=jk]").on("click", function() {
            $(".jk_invalid").hide();
        });


        if ($('input[name=jk]:checked').length <= 0) {
            $(".jk_invalid").text("Pilihan Jenis Kelamin tidak boleh kosong");
            error = true;
        }

        $("#alamat").keyup(function() {
            $(".alamat_invalid").hide();
        });

        if ($("#alamat").val() === "") {
            $(".alamat_invalid").text("Kolom isian Alamat Rumah tidak boleh kosong");
            error = true;
        }

        $("#tempat_lahir").keyup(function() {
            $(".tempat_lahir_invalid").hide();
        });

        if ($("#tempat_lahir").val() === "") {
            $(".tempat_lahir_invalid").text("Kolom isian Tempat Lahir tidak boleh kosong");
            error = true;
        }

        $("#tanggal_lahir").change(function() {
            $(".tanggal_lahir_invalid").hide();
        });

        if ($("#tanggal_lahir").val() === "") {
            $(".tanggal_lahir_invalid").text("Kolom isian Tanggal Lahir Lengkap tidak boleh kosong");
            error = true;
        }

        $("select[name=sekolah]").on("click", function() {
            $(".kec_sekolah_invalid").hide();
        });

        if ($("select[name=kecamatan]").val() === null && $("select[name=sekolah]").val() === null) {
            $(".kec_sekolah_invalid").text("Pilihan Kecamatan dan Sekolah tidak boleh kosong");
            error = true;
        }

        $("select[name=agama]").on("click", function() {
            $(".agama_invalid").hide();
        });

        if ($("select[name=agama]").val() === null) {
            $(".agama_invalid").text("Pilihan Agama tidak boleh kosong");
            error = true;
        }

        $("#nama_ortu").keyup(function() {
            $(".nama_ortu_invalid").hide();
        });

        if ($("#nama_ortu").val() === "") {
            $(".nama_ortu_invalid").text("Kolom isian Nama Orang Tua/Wali tidak boleh kosong");
            error = true;
        }

        $("#nem").keypress(function(e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $(".number_only").html("Kolom isian hanya berupa angka").show();
                error = true;
            }
        });

        if ($("#nem").val() === "") {
            $(".nem_invalid").text("Kolom isian NEM tidak boleh kosong");
            error = true;
        }


        return !error;

    });
});