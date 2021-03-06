<?php include_once 'admin_includes/main_header.php'; ?>
<?php  
error_reporting(0);
if (!isset($_POST['submit']))  {
  //If fail
  echo "fail";
}else  {
  //If success
  //echo "<pre>"; print_r($_POST); die;
  $services_category_id = $_POST['services_category_id'];
  $services_sub_category_id = $_POST['services_sub_category_id'];
  $services_group_id = $_POST['services_group_id'];
  $group_service_name = $_POST['group_service_name'];
  $group_service_description = $_POST['group_service_description'];
  $service_price_type_id = $_POST['service_price_type_id'];
  $service_price = $_POST['service_price'];
  $price_after_visit_type_id = $_POST['price_after_visit_type_id'];  
  
  $lkp_status_id = $_POST['lkp_status_id'];

  if($_POST['service_price_type_id'] == 1) {
      $price_after_visit_type_id = 0;
      $service_price = $_POST['service_price'];
    } else {
      $price_after_visit_type_id = $_POST['price_after_visit_type_id'];
      $service_price = 0;
    }

  if($price_after_visit_type_id == 2) {
    $service_min_price = $_POST['service_min_price'];
    $service_max_price = $_POST['service_max_price'];
    $price_after_visit = "0";
  } else {
    $service_min_price = "0";
    $service_max_price = "0";
    $price_after_visit = $_POST['price_after_visit'];
  }

 $sql = "INSERT INTO services_group_service_names (`services_category_id`, `services_sub_category_id`, `services_group_id`, `group_service_name`,`group_service_description`, `service_price_type_id`,  `service_price`,`price_after_visit_type_id`,`price_after_visiting`, `service_min_price`, `service_max_price`, `lkp_status_id`) VALUES ('$services_category_id', '$services_sub_category_id', '$services_group_id', '$group_service_name','$group_service_description', '$service_price_type_id','$service_price', '$price_after_visit_type_id', '$price_after_visit', '$service_min_price', '$service_max_price', '$lkp_status_id')";
  
    
    if($conn->query($sql) === TRUE){
       echo "<script type='text/javascript'>window.location='services_group_service_names.php?msg=success'</script>";
    } else {
       echo "<script type='text/javascript'>window.location='services_group_service_names.php?msg=fail'</script>";
    }
  
}
?>
      <div class="site-content">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="m-y-0">Service Names</h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <form data-toggle="validator" method="POST" enctype="multipart/form-data">
                  <?php $getServicesCategories = getAllDataWithStatus('services_category','0');?>
                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Choose your Service Category</label>
                    <select name="services_category_id" class="custom-select" data-error="This field is required." required onChange="getSubCategory(this.value);">
                      <option value="">Select Service Category</option>
                      <?php while($row = $getServicesCategories->fetch_assoc()) {  ?>
                          <option value="<?php echo $row['id']; ?>" ><?php echo $row['category_name']; ?></option>
                      <?php } ?>
                   </select>
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Choose your Service Sub Category</label>
                    <select name="services_sub_category_id" id="services_sub_category_id" class="custom-select" data-error="This field is required." required onChange="getGroupsData(this.value);">
                      <option value="">Select Service Sub Category</option>
                   </select>
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Choose your Service Group</label>
                    <select name="services_group_id" id="services_group_id" class="custom-select" data-error="This field is required." required>
                      <option value="">Select Service Group</option>
                   </select>
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Group Service Name</label>
                    <input type="text" name="group_service_name" class="form-control" id="form-control-2" placeholder="Group Service Name" data-error="Please enter Group Service Name" required>
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Group Service Description</label>
                    <textarea name="group_service_description" class="form-control" id="category_description" placeholder="Group Service Description" data-error="Please enter Group Service Description." required></textarea>
                    <div class="help-block with-errors"></div>
                  </div>

                  <?php $getPriceTypes = getAllDataWithStatus('service_price_types','0');?>
                  <div class="form-group">
                    <label for="form-control-4" class="control-label">Price Type</label>
                    <div class="radio">
                      <?php while($row = $getPriceTypes->fetch_assoc()) {  ?>
                      <label>
                        <input name="service_price_type_id" id="service_price_type_id" class="service_price_type_id" value="<?php echo $row['id']; ?>" type="radio" required ><?php echo $row['price_type']; ?>
                      </label>
                      <?php } ?>
                    </div>
                  </div>

                  <div class="form-group" id="service_price">
                    <label for="form-control-2" class="control-label">Service Price</label>
                    <input type="text" name="service_price" class="form-control service_price valid_price_dec" id="service_price_txt" placeholder="Service Price" >
                    <div class="help-block with-errors"></div>
                  </div>                      

                    <?php $getPriceAfterVisitTypes = getAllDataWithStatus('price_after_visit_types','0');?>
                    <div class="form-group" id="price_after_visit_type_id1" class="price_after_visit_type_id1">
                      <label for="form-control-4" class="control-label">Price After Visit Type</label>
                      <div class="radio">
                        <?php while($row = $getPriceAfterVisitTypes->fetch_assoc()) {  ?>
                        <label>
                          <input name="price_after_visit_type_id" id="price_after_visit_type_id" class="price_after_visit_type_id" value="<?php echo $row['id']; ?>" type="radio"><?php echo $row['price_after_visit_type']; ?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group" id="price_after_visit1" >
                      <label for="form-control-2" class="control-label">Price After Visiting</label>
                      <input type="text" name="price_after_visit" class="form-control" id="price_after_visit" placeholder="Price After Visiting">
                      <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group" id="service_min_price" >
                      <label for="form-control-2" class="control-label">Service Min Price</label>
                      <input type="text" name="service_min_price" class="form-control valid_price_dec" id="min_price" placeholder="Service Min Price">
                      <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group" id="service_max_price" >
                      <label for="form-control-2" class="control-label">Service Max Price</label>
                      <input type="text" name="service_max_price" class="form-control valid_price_dec" id="max_price" placeholder="Service Max Price">
                      <div class="help-block with-errors"></div>
                    </div>

                  <?php $getStatus = getAllData('lkp_status');?>
                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Choose your status</label>
                    <select id="form-control-3" name="lkp_status_id" class="custom-select" data-error="This field is required." required>
                      <option value="">Select Status</option>
                      <?php while($row = $getStatus->fetch_assoc()) {  ?>
                          <option value="<?php echo $row['id']; ?>"><?php echo $row['status']; ?></option>
                      <?php } ?>
                   </select>
                    <div class="help-block with-errors"></div>
                  </div>
                
                  <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
              </div>
            </div>
            <hr>
          </div>
        </div>
      </div>
  
<?php include_once 'admin_includes/footer.php'; ?>
<!-- Script for display Price Type -->
<script type="text/javascript">
$(document).ready(function () { 
    $('#service_price, #price_after_visit_type_id1, #service_min_price, #service_max_price,#price_after_visit1').hide();
    $('.service_price_type_id').on('click', function() {

      if($(this).val() == 1) {
        $('#service_price').show();
        $('#price_after_visit_type_id1, #service_min_price, #service_max_price,#price_after_visit1').hide();
        $('#min_price, #max_price').val("");
        $('.price_after_visit_type_id').prop('checked', false);
        $(".service_price").attr("required", "true");
        $(".price_after_visit_type_id").removeAttr('required');
        $("#min_price, #max_price").removeAttr('required');
        $("#price_after_visit1").removeAttr('required');
      } else if($(this).val() == 2) {
        $('#service_price').hide();
        $('#service_price_txt').val("");
        $('#price_after_visit_type_id1').show();
        $(".price_after_visit_type_id").attr("required", "true");
        $(".service_price").removeAttr('required');
      }  

   });

  $('.price_after_visit_type_id').on('click', function() {

    $('#service_min_price, #service_max_price').show();
    if($(this).val() == 2) {
      $('#service_min_price, #service_max_price').show();
      $("#min_price, #max_price").attr("required", "true");
      $('#price_after_visit1').hide();
      $('#price_after_visit').val('');
      $("#price_after_visit1").removeAttr('required');
    } else if($(this).val() == 1) {
      $('#price_after_visit1').show();
      $("#price_after_visit").attr("required", "true");
      $('#service_min_price, #service_max_price').hide();
      $('#min_price, #max_price').val('');
      $("#min_price, #max_price").removeAttr('required');
    }

  });
  //Minimum Price should be less than Maximum Price
  $("#max_price,#min_price").blur(function () {
    if(parseInt($('#min_price').val()) > parseInt($('#max_price').val())) {
      alert("The Maximum Price must be larger than the Minimum Price");
      $('#min_price').val('');
      $('#max_price').val('');
      return false;
    }
    if(parseInt($('#min_price').val()) == 0 && parseInt($('#max_price').val()) == 0) {
      alert("The Maximum Price and the Minimum Price should be greater than zero");
      $('#min_price').val('');
      $('#max_price').val('');
      return false;
    }
 });
  $("#service_price_txt").blur(function() {
    if(parseInt($('#service_price_txt').val()) == 0) {
      alert("The Service Price should be greater than zero");
      $('#service_price_txt').val('');
      return false;
    }
  });
});
</script>
