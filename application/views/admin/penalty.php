<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    

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
                        <th scope="col">Name</th>
                        <th scope="col">Judul Buku</th> 
                        <th scope="col">Jumlah Denda</th>
                        <th scope="col">Terhitung Tanggal</th> 
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($record as $u) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $u['name']; ?></td>
                        <td><?= $u['title']; ?></td>
                        <td><?= "Rp ".number_format($u['fee'],0,',','.'); ?>,-</td>
                        <td><?= date('d F Y', $u['return']); ?></td>
                        <td><?= $u['confirm'] ?></td>
                        <?php if ($u['confirm_id'] == 2){ ?>
                        <td><a href="<?= base_url('admin/confirm_fee/'.$u['id']) ?>" class="badge badge-success">Konfirmasi Pelunasan</a></td>
                        <?php } else { ?>
                        <td>Lunas</td>
                        <?php } ?>
                        <td>
 
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
