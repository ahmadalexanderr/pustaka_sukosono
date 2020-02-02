<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg-8">
            <form method="post" action="<?= base_url('user/borrow/'.$record['id']); ?>">
             <div class="form-group row">
                <label for="book_id" class="col-sm-2 col-form-label">ID Buku</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="book_id" name="book_id" value="<?= $record['id'] ?>" readonly>
                    <?= form_error('book_id', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Judul Buku</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" name="title" value="<?= $record['title'] ?>" readonly>
                    <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" readonly>
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Add Request</button>
                </div>
            </div>
            </form>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 
