<?php 
    require_once 'config/koneksi.php';
    $koneksi = new Koneksi();
    $db = $koneksi->ambilKoneksi();
    $query = $db->prepare('SELECT * FROM kecamatan');
    $query->execute();
    $data = $query->fetchAll();
?>
<form action="daftar_insert.php" method="post" class="row padding-horizontal">
       
                <select id="kecamatan" name="kecamatan" class="col s12 m6">
                    <option value="" disabled selected>Pilih Kecamatan</option>
                    <?php foreach ($data as $item): ?>
                        <option value="<?php echo $item['id']; ?>"><?php echo $item['nama_kecamatan']; ?></option>
                    <?php endforeach; ?>
                </select>
                <select id="sekolah" name="sekolah" class="col s12 m6">
                    <option value="" disabled selected>Pilih Sekolah</option>
                </select>
    </form>
    <script src="asset/js/jquery-3.2.1.min.js"></script>
    <script src="asset/js/materialize.min.js"></script>
<script type="text/javascript">
        $(document).ready(function(){
            $('#kecamatan').change(function(){
                var id_kecamatan = $(this).val();
                if(id_kecamatan != ""){
                    $.ajax({
                        url:'query_sekolah.php',
                        data:{id_kec:id_kecamatan},
                        type:'POST',
                        success:function(res){
                            var respon = $.trim(res);
                            $('#sekolah').html(respon);
                        }
                    });
                }
                else{
                    $('#sekolah').html('<option value="">Pilih Sekolah</option>')
                }
            });
        });
    </script>