<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <?php if ($this->session->userdata('role_id') == 1){ ?>
     <a class="" href="<?= base_url('admin/book');?>" id="category" role="button" aria-haspopup="true" aria-expanded="false" data-toggle="modal" data-target="#bookModal">
      <i class="fas fa-book-open"></i>
    <?php } ?>
   </a>
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
   <style>
    #category {
      float : right;
    }
    </style>

    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
            <?php endif; ?>
            
            <?= form_open("user/searchbook"); ?>
                <select class="form-control form-control-user" name="search">
                    <!-- <option value="">Cari Berdasarkan</option> -->
                    <option value="title">Cari Berdasarkan: Judul Buku</option>
                    <option value="author">Cari Berdasarkan: Penulis</option>
                    <option value="year">Cari Berdasarkan: Tahun Terbit</option>
                    <option value="category">Cari Berdasarkan: Kategori</option>
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
                        <th scope="col">Nomor Rack</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Penulis</th>
                        <th scope="col">Tahun</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                    <?php foreach ($books as $b): ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $b['category_id'].'-'.$b['id'];?></td> 
                        <td><?= $b['title']; ?></td>
                        <td><?= $b['author']; ?></td>
                        <td><?= $b['year']; ?></td>
                        <td><?= $b['category']; ?></td>
                        <td><?= $b['status']; ?></td>
                        
                        <td> 
                            <?php if ($b['status_id'] == 0){ ?>
                            <a href="<?= base_url('user/borrow/'.$b['id']) ?>" class="badge badge-primary">Pinjam</a>
                            <?php } ?>
                            <?php if ($this->session->userdata('role_id') == 1){ ?>
                            <a href="<?= base_url('admin/book_edit/'.$b['id']) ?>" class="badge badge-success">Edit</a>
                            <a href="<?= base_url('admin/book_delete/'.$b['id']) ?>" class="badge badge-danger">Hapus</a>
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