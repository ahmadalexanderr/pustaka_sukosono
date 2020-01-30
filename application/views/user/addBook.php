<!-- Books Modal-->
            <div class="modal fade" id="bookModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Book</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        
                        <form action="<?= base_url('user/book'); ?>" method="post">
                        <div class="form-group row">
                            <label for="Title" class="col-sm-2 col-form-label">Judul Buku</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title" name="title" value="<?= set_value("title"); ?>">
                                <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Author" class="col-sm-2 col-form-label">Pengarang</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="author" name="author" value="<?= set_value("author"); ?>">
                                <?= form_error('author', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Author" class="col-sm-2 col-form-label">Tahun</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="year" name="year" value="<?= set_value("year"); ?>">
                                <?= form_error('year', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="Category" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-10">
                            <select class="form-control" id="category_id" name="category_id">
                            <?php foreach ($category as $row): ?>
                                <option value="<?= $row['id'];?>" > <?= $row['category'];?></option>
                            <?php endforeach; ?>
                            </select>
                            </div>
                        </div>
                         <div class="form-group row" style="visibility:hidden">
                            <label for="Status" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                            <select class="form-control" id="status_id" name="status_id">
                            <?php foreach ($status as $row): ?>
                                <option value="<?= $row['status_id'];?>" selected="<?= $row['status_id'] == 0;?>"><?= $row['status'];?></option>
                            <?php endforeach; ?>
                            </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit">Add</button>
                        </div>
                        
                        </form>
                        </div>
                    </div>
                </div>
            </div>