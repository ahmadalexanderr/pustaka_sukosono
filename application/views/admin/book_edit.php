<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg-8">

            <form method="post" action="<?= base_url('admin/book_edit/'.$record['id']); ?>">
            <div class="form-group row">
                <label for="Title" class="col-sm-2 col-form-label">Judul</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" name="title" value="<?= $record['title']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="Author" class="col-sm-2 col-form-label">Penulis</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="author" name="author" value="<?= $record['author']; ?>">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="Year" class="col-sm-2 col-form-label">Tahun Terbit</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="year" name="year" value="<?= $record['year']; ?>">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
           <div class="form-group row">
                <label for="Category" class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-10">
                <select class="form-control" id="category_id" name="category_id">
                <?php foreach ($category as $row): ?>
                    <option value="<?= $row['id'];?>" <?php if($record['category_id'] == $row['id']) { echo 'selected';}?>><?= $row['category'];?></option>
                <?php endforeach; ?>
                </select>
                </div>
            </div>

            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
            </form>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 