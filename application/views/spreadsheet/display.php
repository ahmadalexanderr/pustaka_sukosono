
 <!-- container --> 
  <section class="showcase">
    <div class="container">
      <div class="pb-2 mt-4 mb-2 border-bottom">

      </div>
      <div class="row padall border-bottom">  
      <div class="col-lg-12">
      <div class="float-right">  
          <a href="<?= base_url();?>Phpspreadsheet/import" class="btn btn-info btn-sm"><i class="fa fa-file-upload"></i> Back to Upload</a>
        </div> 
      </div>
      </div>
      <div class="row padall">
        
        <table class="table table-striped">
          <thead>
            <tr class="table-primary">
              <th scope="col">Judul</th>
              <th scope="col">Penulis</th>
              <th scope="col">Tahun</th>
              <th scope="col">Kategori</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($dataInfo as $key=>$element) { ?>
            <tr>
              <td><?php print $element['title'];?></td>
              <td><?php print $element['author'];?></td>
              <td><?php print $element['year'];?></td>
              <td><?php print $element['category_id'];?></td>
              <td><?php print $element['status_id'];?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
        
      </div>
    </div>
  </section>
