<div class="container">
    <div class="row">
        <div class="col">
            <h1>Detail Buku</h1>

            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/img/<?= $buku['cover']; ?>" class="img-fluid rounded-start" alt="<?= $buku['slug']; ?>">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $buku['judul']; ?></h5>
                            <p class="card-text"><b>Penulis : </b> <?= $buku['penulis']; ?></p>
                            <p class="card-text"><small class="text-muted"><b>Penerbit : </b> <?= $buku['penerbit']; ?></small></p>
                            <a href="/crud/edit/<?= $buku['slug']; ?>" class="btn btn-warning">Edit</a>
                            <a href="/crud/delete/<?= $buku['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?');">Hapus</a>
                            <br>
                            <br>
                            <a href="/buku" class="">Kembali ke daftar buku</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>