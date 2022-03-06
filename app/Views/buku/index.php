<div class="container">
    <div class="row">
        <div class="col">
            <h1>Data Buku</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Cover</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Penulis</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($buku as $b) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><img src="/img/<?= $b['cover']; ?>" alt="" class="sampul"></td>
                            <td><?= $b['judul']; ?></td>
                            <td><?= $b['penulis']; ?></td>
                            <td><?= $b['penerbit']; ?></td>
                            <td>
                                <a href="/buku/<?= $b['slug']; ?>" class="btn btn-success">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>