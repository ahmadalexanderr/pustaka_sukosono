 <!-- container --> 
  <section class="showcase">
    <div class="container">
      <div class="pb-2 mt-4 mb-2 border-bottom">
 </div>
 
      <?php if(form_error('fileURL')) {?>    
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php print form_error('fileURL'); ?>
        </div>       
    <?php } ?>
 
    <form action="<?php print site_url();?>phpspreadsheet/upload" class="excel-upl" id="excel-upl" enctype="multipart/form-data" method="post" accept-charset="utf-8">
      <div class="row padall">
        <div class="col-lg-10 order-lg-1">
          
          <input type="file" class="custom-file-input" id="validatedCustomFile" name="fileURL">
          <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
        </div>
        <div class="col-lg-6 order-lg-2">
        <br>
          <button type="submit" name="import" class="float-right btn btn-primary">Import</button>
        </div>
      </div>
    </form>
    </div>
  </section>