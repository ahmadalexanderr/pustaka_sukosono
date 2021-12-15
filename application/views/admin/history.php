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

              <?= form_open("admin/searchreturn"); ?>
                <select class="form-control form-control-user" name="search">
                    <!-- <option value="">Cari Berdasarkan</option> -->
                    <option value="name">Cari Berdasarkan: Peminjam</option>
                    <option value="title">Cari Berdasarkan: Judul Buku</option>
                    <!-- <option value="taken">Cari Berdasarkan: Tanggal Peminjaman</option>
                    <option value="due">Cari Berdasarkan: Jatuh Tempo</option>
                    <option value="return_">Cari Berdasarkan: Tanggal Pengembalian</option> -->
                    <option value="penalty">Cari Berdasarkan: Denda</option>
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
                        <?php if ($r['taken'] != 0) { ?>
                        <td><?= date('d F Y', $r['taken']); ?></td>
                        <?php } else { ?>
                           <td><center><?=  " "; ?></center></td> 
                        <?php } ?>
                        <?php if ($r['due'] != 0) { ?>
                        <td><?= date('d F Y', $r['due']); ?></td>
                        <?php } else { ?>
                           <td><center><?=  " "; ?></center></td> 
                        <?php } ?>
                        <?php if ($r['return_'] != 0) { ?>
                        <td><?=  date('d F Y', $r['return_']); ?></td>
                        <?php } else { ?>
                           <td><center><?=  " "; ?></center></td> 
                        <?php } ?>
                        <td><?= $r['name']; ?></td>
                        <td><?= "Rp ".number_format($r['penalty'],0,',','.'); ?>,-</td>
                        <td>
                         <?php if ($r['status_id'] == 2) { ?>
                            <td>
                            <div><center>
                                <a href="<?= base_url('admin/confirm/'.$r['id']) ?>" class="badge badge-success">Konfirmasi</a>
                                <a href="<?= base_url('admin/unconfirm/'.$r['id']) ?>" class="badge badge-danger">Tolak</a>
                                </center>
                            </div>
                            </td>
                        <?php } else if ($r['status_id'] == 0) { ?>
                                    <?php if ($r['penalty'] == 0) { ?>
                                        <td><div class="alert alert-success" role="alert">Terkonfirmasi</div></td>
                                    <?php } else { ?>
                                             <?php if ($r['confirm_id'] == 2) { ?> 
                                        <td><div class="alert alert-danger" role="alert">Denda Belum Lunas</div></td>
                                            <?php } else { ?>
                                        <td><div class="alert alert-success" role="alert">Denda Lunas</div></td> 
                                            <?php } ?> 
                                     <?php } ?>
                        <?php } else { ?>
                            <td><div class="alert alert-secondary" role="alert">Tunggu Pengembalian</div></td> 
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
