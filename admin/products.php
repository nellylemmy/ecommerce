<?php session_start(); ?>
<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php"); ?>
<div class="container-fluid">
  <div class="row">
    
    <?php include "./templates/sidebar.php"; ?>

      <div class="row">
      	<div class="col-10">
      		<h2>Product List</h2>
      	</div>
      	<div class="col-2">
      		<a href="#" data-toggle="modal" data-target="#add_product_modal" class="btn btn-primary btn-sm">Add Product</a>
      	</div>
      </div>
      
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Image</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Category</th>
              <th>Brand</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="product_list">
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



<!-- Add Product Modal start -->
<div class="modal fade" id="add_product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="add-product-form" enctype="multipart/form-data">
        	<div class="row">
            <div class="col-12">
        			<div class="form-group">
		        		<label for="browse">Click to Upload Product Image <small>(format: jpg, jpeg, png)</small></label>
		        		<input type="file" name="product_image" id="browse" class="form-control">
		        	</div>
        		</div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Product Name</label>
		        		<input type="text" name="product_name" class="form-control" placeholder="Enter Product Name">
		        	</div>
        		</div>
            <div class="col-12">
              <div class="form-group">
              <label>Product Volume</label>
              <div class="input-group mb-2">
              <input type="number" min="0" class="form-control" id="size-value" placeholder="Volume">
                <div class="input-group-prepend">
                  <div class="input-group">
                  <select class="form-control size_list" name="unit_size_id">
		        			<option value="">Select Unit</option>
		        		</select>
                  </div>
                </div>
                
              </div>
            </div>
            </div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Category</label>
		        		<select class="form-control category_list" name="category_id">
		        			<option value="">Select Category</option>
		        		</select>
		        	</div>
        		</div>
            <div class="col-12">
        			<div class="form-group">
		        		<label>Brand</label>
		        		<select class="form-control brand_list" name="brand_id">
		        			<option value="">Select Brand</option>
		        		</select>
		        	</div>
        		</div>
            <div class="col-12">
              <div class="form-group">
                <label>Quantity</label>
                <input type="number" name="product_qty" class="form-control" placeholder="Enter Product Quantity">
              </div>
            </div>
            <div class="col-12">
        			<div class="form-group">
		        		<label>Has ofer?</label>
		        		<div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input" id="switch_offer">
                  <label class="custom-control-label" for="switch_offer">Click to switch offer On</label>
                </div>
		        	</div>
        		</div>
          <div class="offer_on_section col-12">
            <div class="col-12 old-product-price-field">
        			<div class="form-group">
		        		<label class="on-switch-label hide">Normal Product Price</label>
		        		<label class="off-switch-label">Product Price</label>
		        		<input type="number" name="old_product_price" id="pointspossible" class="form-control old-product-price-input" placeholder="Enter Product Price">
		        	</div>
        		</div>
        		<div class="col-12 on-switch-new-price hide">
        			<div class="form-group">
		        		<label class="new-product-price-label">New Product Price</label>
		        		<!-- <label class="product-price-label">Product Price</label> -->
		        		<input type="number" name="product_price" id="pointsgiven" class="form-control" placeholder="Enter New Product Price">
		        	</div>
        		</div>
            <div class="col-12 on-switch-date hide">
              <label>Offer Ends</label>
              <div class="form-group input-group-prepend">
                <div class="input-group">
                <select class="form-control month_list" name="offer_month_id" id="month">
                  <option value="" selected="selected">Month</option>
                  <option value="Jan">Jan</option>
                  <option value="Feb">Feb</option>
                  <option value="Mar">Mar</option>
                  <option value="Apr">Apr</option>
                  <option value="May">May</option>
                  <option value="Jun">Jun</option>
                  <option value="Jul">Jul</option>
                  <option value="Aug">Aug</option>
                  <option value="Sept">Sept</option>
                  <option value="Oct">Oct</option>
                  <option value="Nov">Nov</option>
                  <option value="Dec">Dec</option>
                </select>
                <select class="form-control date_list" name="offer_date_id" id="day">
                  <option value="" selected="selected">Day</option>
                  <option value="01">01</option>
                  <option value="02">02</option>
                  <option value="03">03</option>
                  <option value="04">04</option>
                  <option value="05">05</option>
                  <option value="06">06</option>
                  <option value="07">07</option>
                  <option value="08">08</option>
                  <option value="09">09</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                  <option value="13">13</option>
                  <option value="14">14</option>
                  <option value="15">15</option>
                  <option value="16">16</option>
                  <option value="17">17</option>
                  <option value="18">18</option>
                  <option value="19">19</option>
                  <option value="20">20</option>
                  <option value="21">21</option>
                  <option value="22">22</option>
                  <option value="23">23</option>
                  <option value="24">24</option>
                  <option value="25">25</option>
                  <option value="26">26</option>
                  <option value="27">27</option>
                  <option value="28">28</option>
                  <option value="29">29</option>
                  <option value="30">30</option>
                  <option value="31">31</option>
                </select>
                <select class="form-control year_list" name="offer_year_id" id="year">
                  <option value="" selected="selected">Year</option>
                  <option value="2022">2022</option>
                  <option value="2023">2023</option>
                  <option value="2024">2024</option>
                  <option value="2025">2025</option>
                  <option value="2026">2026</option>
                  <option value="2027">2027</option>
                  <option value="2028">2028</option>
                  <option value="2029">2029</option>
                  <option value="2030">2030</option>
                  <option value="2031">2031</option>
                  <option value="2032">2032</option>
                  <option value="2033">2033</option>
                  <option value="2034">2034</option>
                  <option value="2035">2035</option>
                  <option value="2036">2036</option>
                  <option value="2037">2037</option>
                  <option value="2038">2038</option>
                  <option value="2039">2039</option>
                  <option value="2040">2040</option>
                  <option value="2041">2041</option>
                  <option value="2042">2042</option>
                  <option value="2043">2043</option>
                  <option value="2044">2044</option>
                  <option value="2045">2045</option>
                  <option value="2046">2046</option>
                  <option value="2047">2047</option>
                  <option value="2048">2048</option>
                  <option value="2049">2049</option>
                  <option value="2050">2050</option>
                  <option value="2051">2051</option>
                  <option value="2052">2052</option>
                  <option value="2053">2053</option>
                  <option value="2054">2054</option>
                  <option value="2055">2055</option>
                </select>
                </div>
              </div>
            </div>
            <div class="col-12 percentage-offer hide">
              <label><small>Below is your generated Offer in percentage ( % )</small></label>
        			<div class="form-group">
                <input type="text" class="py-1 px-2 br-6" id="pointsperc" disabled>
                
		        		<!-- <label ><b>An offer of <span >0</span>% </b></label> -->
		        	</div>
        		</div>

        </div>  
            <div class="col-12">
        			<div class="form-group">
		        		<label>Product Description</label>
		        		<textarea class="form-control" name="product_desc" placeholder="Enter product desc"></textarea>
		        	</div>
        		</div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Product Keywords <small>(eg: apple, iphone, mobile)</small></label>
		        		<input type="text" name="product_keywords" class="form-control" placeholder="Enter Product Keywords">
		        	</div>
        		</div>
        		
        		<input type="hidden" name="add_product" value="1">
        		<div class="col-12">
        			<button type="button" class="btn btn-primary add-product">Add Product</button>
        		</div>
        	</div>
        	
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Add Product Modal end -->

<!-- Edit Product Modal start -->
<div class="modal fade" id="edit_product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit-product-form" enctype="multipart/form-data">
          <div class="row">
          <div class="col-12">
              <div class="form-group">
                <label>Product Image <small>(format: jpg, jpeg, png)</small></label>
                <input type="file" name="e_product_image" class="form-control">
                <img src="../product_images/1.0x0.jpg" class="img-fluid" width="50">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Product Name</label>
                <input type="text" name="e_product_name" class="form-control" placeholder="Enter Product Name">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
              <label>Product Size</label>
              <div class="input-group mb-2">
              <input type="number" min="0" class="form-control" id="size-value" placeholder="Value">
                <div class="input-group-prepend">
                  <div class="input-group">
                  <select class="form-control size_list" name="unit_size_id">
		        			<option value="">Select Unit</option>
		        		</select>
                  </div>
                </div>
              </div>
            </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Category Name</label>
                <select class="form-control category_list" name="e_category_id">
                  <option value="">Select Category</option>
                </select>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Brand Name</label>
                <select class="form-control brand_list" name="e_brand_id">
                  <option value="">Select Brand</option>
                </select>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Product Qty</label>
                <input type="number" name="e_product_qty" class="form-control" placeholder="Enter Product Quantity">
              </div>
            </div>
            <div class="col-12">
        			<div class="form-group">
		        		<label>Has ofer?</label>
		        		<div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input" id="customSwitch2">
                  <label class="custom-control-label" for="customSwitch2">Click to switch offer On</label>
                </div>
		        	</div>
        		</div>
            <div class="col-12 old-product-price-field">
        			<div class="form-group">
		        		<label>Old Product Price</label>
		        		<input type="number" name="old_product_price" class="form-control old-product-price-input" placeholder="Enter Old Product Price" disabled>
		        	</div>
        		</div>
            <div class="col-12">
              <div class="form-group">
                <label>Product Price</label>
                <input type="number" name="e_product_price" class="form-control" placeholder="Enter Product Price">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Product Description</label>
                <textarea class="form-control" name="e_product_desc" placeholder="Enter product desc"></textarea>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Product Keywords <small>(eg: apple, iphone, mobile)</small></label>
                <input type="text" name="e_product_keywords" class="form-control" placeholder="Enter Product Keywords">
              </div>
            </div>
            
            <input type="hidden" name="pid">
            <input type="hidden" name="edit_product" value="1">
            <div class="col-12">
              <button type="button" class="btn btn-primary submit-edit-product">Add Product</button>
            </div>
          </div>
          
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Edit Product Modal end -->


<?php include_once("./templates/footer.php"); ?>
<script>
  document.addEventListener('DOMContentLoaded', function () {
  var checkbox = document.querySelector('#switch_offer');

  checkbox.addEventListener('change', function () {
    if (checkbox.checked) {
      document.querySelector('.on-switch-date').classList.remove('hide');
      document.querySelector('.on-switch-new-price').classList.remove('hide');
      document.querySelector('.on-switch-label').classList.remove('hide');
      document.querySelector('.off-switch-label').classList.add('hide');
      document.querySelector('.offer_on_section').classList.add('on_section');
      document.querySelector('.percentage-offer').classList.remove('hide');
      document.querySelector('#pointsgiven').value = '';
      document.querySelector('#pointsperc').value = '';

      var month = document.querySelector('#month option');
      var day = document.querySelector('#day option');
      var year = document.querySelector('#year option');

      month.selected = month.defaultSelected;
      day.selected = day.defaultSelected;
      year.selected = year.defaultSelected;

    } else {
      document.querySelector('.on-switch-date').classList.add('hide');
      document.querySelector('.on-switch-new-price').classList.add('hide');
      document.querySelector('.on-switch-label').classList.add('hide');
      document.querySelector('.off-switch-label').classList.remove('hide');
      document.querySelector('.offer_on_section').classList.remove('on_section');
      document.querySelector('.percentage-offer').classList.add('hide');

    }
  });

  $(function() {

$('#pointspossible').on('input', function() {
  calculate();
});
$('#pointsgiven').on('input', function() {
  calculate();
});

function calculate() {
  var pPos = parseInt($('#pointspossible').val());
  var pEarned = parseInt($('#pointsgiven').val());
  console.log(pPos);
  console.log(pEarned);

  var perc = "";
  if (isNaN(pPos) || isNaN(pEarned)) {
  perc = " ";
  } else {
  perc = ((pEarned / pPos) * 100).toFixed(2);
  }

  let offerPerc = (perc - 100).toFixed(2);

  $('#pointsperc').val(offerPerc);
  console.log(offerPerc);
}

});




// function percentage(partialValue, totalValue) {
//    return (100 * partialValue) / totalValue;
// }

// const totalActivities = 3000;
// const doneActivities = 3000;

// let result = percentage(doneActivities, totalActivities);
// console.log(result)

});



</script>




<script type="text/javascript" src="./js/products.js"></script>