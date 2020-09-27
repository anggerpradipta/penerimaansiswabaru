(function($) {
    $(function() {

        $('#kecamatan').change(function() {
            var id_kecamatan = $(this).val();
            if (id_kecamatan != "") {
                $.ajax({
                    url: 'query_sekolah.php',
                    data: { id_kec: id_kecamatan },
                    type: 'POST',
                    success: function(res) {
                        var respon = $.trim(res);
                        $('#sekolah').html(respon);
                    }
                });
            } else {
                $('#sekolah').html('<option value="">Pilih Sekolah</option>')
            }
        });
        $('.button-collapse').sideNav({
            menuWidth: 250, // Default is 300
            closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
            draggable: true, // Choose whether you can drag to open on touch screens,  
        });

        $('.material_select').material_select();
        $('.slider').slider({
            indicators: false
        });

        $('.datepicker').pickadate({
            monthsFull: [
                'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            ],
            weekdaysShort: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15, // Creates a dropdown of 15 years to control year,
            today: 'Hari Ini',
            clear: 'Bersihkan',
            format: 'yyyy-mm-dd',
            close: 'Ok',
            closeOnSelect: false, // Close upon selecting a date,
            container: undefined, // ex. 'body' will append picker to body
        });

    }); // end of document ready
})(jQuery); // end of jQuery name space