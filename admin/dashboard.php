<?php require_once 'header.php'; ?>
           <div class="row">
                <div class="col s12">
                    <h4 class="center-align blue-text">Selamat Datang <?php echo $_SESSION['username']; ?></h4>
                    <p class="center-align">Silahkan pilih menu dibawah untuk memulai aplikasi</p>
                    <p class="divider"></p>
                </div>
                <div class="col s12 m6 l4">
                    <a href="kecamatan_index.php">
                    <div class="card-panel hover-card">
                        <h5 class="center-align">Data Kecamatan</h5>
                        <div class="divider"></div>
                        <p class="center-align"><i class="material-icons large">assignment_turned_in</i></p>
                        </div>
                    </a>
                </div>
                <div class="col s12 m6 l8">
                    <a href="sekolah_index.php">
                    <div class="card-panel hover-card">
                        <h5 class="center-align">Data Sekolah</h5>
                        <div class="divider"></div>
                        <p class="center-align"><i class="material-icons large">school</i></p>
                        </div>
                    </a>
                </div>
                <div class="col s12 m6 l8">
                    <a href="pendaftar_index.php">
                    <div class="card-panel hover-card">
                        <h5 class="center-align">Data Pendaftar</h5>
                        <div class="divider"></div>
                        <p class="center-align"><i class="material-icons large">assignment_ind</i></p>
                        </div>
                    </a>
                </div>
                <div class="col s12 m6 l4">
                    <a href="laporan_index.php">
                    <div class="card-panel hover-card">
                        <h5 class="center-align">Laporan</h5>
                        <div class="divider"></div>
                        <p class="center-align"><i class="material-icons large">assignment</i></p>
                        </div>
                    </a>
                </div>

            </div>
        </div>
<?php require_once 'footer.php'; ?>