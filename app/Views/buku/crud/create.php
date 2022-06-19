<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Tambah Data Buku</h2>

            <form action="/crud/simpan" method="POST" enctype="multipart/form-data">
                <!-- CSRF (Cross Site Request Forgery) merupakan salah satu teknik penetrasi pada celah keamanan website. -->
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul" autofocus value="<?= old('judul'); ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('judul'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="penulis" name="penulis" value="<?= old('penulis'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= old('penerbit'); ?>">
                    </div>
                </div>
                <!-- Cara Upload File Pada Codeigniter 4 #12 -->
                <div class="row mb-3">
                    <label for="cover" class="col-sm-2 col-form-label">Cover</label>
                    <div class="col-sm-10">
                        <input class="form-control <?= ($validation->hasError('cover')) ? 'is-invalid' : ''; ?>" type="file" id="cover" name="cover">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('cover'); ?>
                        </div>
                    </div>
                </div>
                <!-- End -->

                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>


        </div>
    </div>
</div>