<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title?></h1>
    

    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Buku</th>
                        <th scope="col">Tanggal Peminjaman</th>
                        <th scope="col">Jatuh Tempo Pengembalian</th>
                        <th scope="col">Tanggal Pengembalian</th>
                        <th scope="col">Peminjam</th> 
                        <th scope="col">Denda</th> 
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($record as $r) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $r['title']; ?></td>
                        <td><?= date('d F Y', $r['taken']); ?></td>
                        <td><?= date('d F Y', $r['due']); ?></td>
                        <td><?= date('d F Y', $r['return']); ?></td>
                        <td><?= $r['name']; ?></td>
                        <td><?= "Rp ".number_format($r['penalty'],0,',','.'); ?>,-</td>
                        <td>
                        <?php if ($r['status_id'] != 0) { ?>
                            <a href="<?= base_url('admin/confirm/'.$r['id']) ?>" class="badge badge-success">Konfirmasi</a>
                            <a href="<?= base_url('admin/unconfirm/'.$r['id']) ?>" class="badge badge-danger">Tolak</a>
                        <?php } ?>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
