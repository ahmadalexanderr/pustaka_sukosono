

  <section>
   <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <?php if ($this->session->userdata('role_id') == 1){ ?>
     <a class="" href="<?= base_url('admin/book');?>" id="category" role="button" aria-haspopup="true" aria-expanded="false" data-toggle="modal" data-target="#bookModal">
      <i class="fas fa-book-open"></i>
    <?php } ?>
   </a>
    
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
            <br>
            <center><p id="bottom">Koleksi Buku Perpustakaan Balai Desa Sukosono</p></center>
            <?= form_open("visitor/searchbook"); ?>
                <select class="form-control form-control-user" name="search">
                    <option value="">Cari Berdasarkan</option>
                    <option value="title">Judul Buku</option>
                    <option value="author">Penulis</option>
                    <option value="year">Tahun Terbit</option>
                    <option value="category">Kategori</option>
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
  </section>

    <!-- Bootstrap core CSS -->
  <link href="<?= base_url('assets/') ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?= base_url('assets/'); ?>css/one-page-wonder.min.css" rel="stylesheet">
