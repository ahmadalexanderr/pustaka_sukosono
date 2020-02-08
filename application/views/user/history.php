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

                   <?= form_open("user/searchhistory"); ?>
                <select class="form-control form-control-user" name="search">
                    <option value="">Cari Berdasarkan</option>
                    <option value="title">Judul Buku</option>
                    <option value="taken">Tanggal Peminjaman</option>
                    <option value="due">Jatuh Tempo</option>
                    <option value="confirm">Status</option>
                </select>
                <input type="text" name="found" class="form-control form-control-user">
                <input type="submit" value="Search" class="btn btn-primary btn-user btn-block">
            <?= form_close(); ?>

            <?php
                if(isset($total)){
                    if($search == ""){
                        echo "Jumlah pencarian : " . $found . " : " . $total;
                    } else {
                        echo "Jumlah pencarian : " . $search . " = " . $found . " : " . $total;
                    }
                }
            ?>

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
