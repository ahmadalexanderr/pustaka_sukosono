<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title.' '.$user['name']; ?></h1>
    

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
                        <th scope="col">Status</th>
                        <th scope="col">Aksi/Denda</th>
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
                        <td><?= $r['confirm']; ?></td> 
                        <td>
                        <?php if($r['return'] == 0 && $r['status_id'] == 1){ ?>
                            <a href="<?= base_url('user/return_book/'.$r['id']) ?>" class="badge badge-success">Kembalikan Buku</a>
                        <?php } elseif ($r['penalty'] == 0){ ?>
                          Sedang Memproses
                        <?php } else {?>
                            <?= "Rp ".number_format($r['penalty'],0,',','.'); ?>,-
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
