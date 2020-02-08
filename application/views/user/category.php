<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <?php if($this->session->userdata('role_id') == 1){ ?>
     <a class="" href="<?= base_url('user/category');?>" id="category" role="button" aria-haspopup="true" aria-expanded="false" data-toggle="modal" data-target="#categoryModal">
      <i class="fas fa-swatchbook"></i>
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

            <?= $this->session->flashdata('message'); ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Total Buku</th>
                        <?php if ($this->session->userdata('role_id') == 1){ ?>
                        <th scope="col">Aksi</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($count_category as $c): ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $c['category']; ?></td>
                        <td><?= $c['total']; ?></td>
                        <?php if ($this->session->userdata('email') == 'pemdessukosono@gmail.com'){ ?>
                        <td>
                            <a href="<?= base_url('admin/category_edit/'.$c['id']) ;?>" class="badge badge-success">Edit</a>
                        </td>
                        <?php } ?>
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

<!-- Add category Modal-->
            <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        
                        <form action="<?= base_url('user/category'); ?>" method="post">
                        <div class="form-group">
                            <label for="category">Category</label>
                            <input type="text" class="form-control" id="category" name="category">
                            <?= form_error('category', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit">Add</button>
                        </div>
                        
                        </form>
                        </div>
                    </div>
                </div>
            </div>