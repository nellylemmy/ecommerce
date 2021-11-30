<?php session_start(); ?>
<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php"); ?>
<div class="container-fluid">
  <div class="row">
    
    <?php include "./templates/sidebar.php"; ?>

      <div class="row">
      	<div class="col-10">
      		<h2>Slides</h2>
      	</div>
      	<div class="col-2">
      		<a href="#" data-toggle="modal" data-target="#add_slide_modal" class="btn btn-primary btn-sm">Add Slides</a>
      	</div>
      </div>
      
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Image</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="slide_list">
            <!-- <tr>
              <td>1</td>
              <td>ABC</td>
              <td>FDGR.JPG</td>
              <td>122</td>
              <td>eLECTRONCS</td>
              <td>aPPLE</td>
              <td><a class="btn btn-sm btn-info"></a><a class="btn btn-sm btn-danger">Delete</a></td>
            </tr> -->
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>



<!-- Add Slide Modal start -->
<div class="modal fade" id="add_slide_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Slide</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="add-slide-form" enctype="multipart/form-data">
        	<div class="row">
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Slide Name</label>
		        		<input type="text" name="slide_name" class="form-control" placeholder="Enter Slide Name">
		        	</div>
        		</div>
        		
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Slide Image <small>(format: jpg, jpeg, png)</small></label>
		        		<input type="file" name="slide_image" class="form-control">
		        	</div>
        		</div>
        		<input type="hidden" name="add_slide" value="1">
        		<div class="col-12">
        			<button type="button" class="btn btn-primary add-slide">Add Slide</button>
        		</div>
        	</div>
        	
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Add Slide Modal end -->

<!-- Edit Slide Modal start -->
<div class="modal fade" id="edit_slide_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add slide</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit-slide-form" enctype="multipart/form-data">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label>Slide Name</label>
                <input type="text" name="e_slide_name" class="form-control" placeholder="Enter slide Name">
              </div>
            </div>
      
            <div class="col-12">
              <div class="form-group">
                <label>Slide Image <small>(format: jpg, jpeg, png)</small></label>
                <input type="file" name="e_slide_image" class="form-control">
                <img src="../product_images/1.0x0.jpg" class="img-fluid" width="50">
              </div>
            </div>
            <input type="hidden" name="pid">
            <input type="hidden" name="edit_slide" value="1">
            <div class="col-12">
              <button type="button" class="btn btn-primary submit-edit-slide">Add Slide</button>
            </div>
          </div>
          
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Edit Slide Modal end -->

<?php include_once("./templates/footer.php"); ?>



<script type="text/javascript" src="./js/slides.js"></script>