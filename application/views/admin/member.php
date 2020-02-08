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

            <?= form_open("admin/searchmember"); ?>
                <select class="form-control form-control-user" name="search">
                    <option value="">Cari Berdasarkan</option>
                    <option value="name">Nama</option>
                    <option value="email">Email</option>
                    <option value="date_created">Tanggal Menjadi Anggota</option>
                    <option value="activation">Status</option>
                    <option value="menu">Hak Akses</option>
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
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Member since</th>
                        <th scope="col">Status</th>
                        <th scope="col">Access</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($all_user as $u) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $u['name']; ?></td>
                        <td><?= $u['email']; ?></td>
                        <td><?= date('d F Y', $u['date_created']); ?></td>
                        <td><?= $u['activation']; ?></td>
                        <td><?= $u['menu']; ?></td>
                        <td>
                        <?php if ($u['is_active'] != 1){ ?>
                            <a href="<?= base_url('admin/activate/'.$u['id']) ?>" class="badge badge-primary">aktifkan</a>
                        <?php } else { ?>
                            <a href="<?= base_url('admin/member/'.$u['id']) ?>" class="badge badge-success">edit</a>
                            <a href="<?= base_url('admin/delete/'.$u['id']); ?>" class="badge badge-danger">delete</a>
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
