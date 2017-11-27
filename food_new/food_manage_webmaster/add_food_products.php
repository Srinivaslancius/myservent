<?php include_once 'admin_includes/main_header.php'; ?>

<?php  
if (!isset($_POST['submit']))  {
            echo "";
} else  {
    //Save data into database
    $restaurant_id = $_POST['restaurant_id'];
    $product_name = $_POST['product_name'];
    $category_id = $_POST['category_id'];
    $specifications = $_POST['specifications'];
    $availability_id = $_POST['availability_id'];
    $lkp_status_id = $_POST['lkp_status_id'];
    $created_at = date("Y-m-d h:i:s");
    $created_by = $_SESSION['food_admin_user_id'];
    //save product images into product_images table    
    $sql1 = "INSERT INTO food_products (`restaurant_id`,`product_name`,`category_id`,`specifications`,`availability_id`,`lkp_status_id`,`created_by`,`created_at`) VALUES ('$restaurant_id','$product_name','$category_id','$specifications', '$availability_id','$lkp_status_id','$created_by','$created_at')";
     $result1 = $conn->query($sql1);
     $last_id = $conn->insert_id;

    $product_weights = $_REQUEST['weight_type_id'];
    foreach($product_weights as $key=>$value){

        $product_weights1 = $_REQUEST['weight_type_id'][$key];
        $product_price = $_REQUEST['product_price'][$key];
        $sql = "INSERT INTO food_product_weight_prices ( `product_id`,`weight_type_id`,`product_price`) VALUES ('$last_id','$product_weights1','$product_price')";
        $result = $conn->query($sql);
    }
    $product_ingredients = $_REQUEST['ingredient_name_id'];
    foreach($product_ingredients as $key=>$value){

        $product_ingredients1 = $_REQUEST['ingredient_name_id'][$key];
        $ingredient_price = $_REQUEST['ingredient_price'][$key];
        $sql = "INSERT INTO food_product_ingredient_prices ( `product_id`,`ingredient_name_id`,`ingredient_price`) VALUES ('$last_id','$product_ingredients1','$ingredient_price')";
        $result = $conn->query($sql);
    }

    $product_images = $_FILES['product_images']['name'];
    foreach($product_images as $key=>$value){

        $product_images1 = $_FILES['product_images']['name'][$key];
        $file_tmp = $_FILES["product_images"]["tmp_name"][$key];
        $file_destination = '../../uploads/food_product_images/' . $product_images1;
        move_uploaded_file($file_tmp, $file_destination);        
        $sql = "INSERT INTO food_product_images ( `product_id`,`product_image`) VALUES ('$last_id','$product_images1')";
        $result = $conn->query($sql);
    }
     
     if( $result1 == 1){
        echo "<script type='text/javascript'>window.location='food_products.php?msg=success'</script>";
    } else {
        echo "<script type='text/javascript'>window.location='food_products.php?msg=fail'</script>";
    }
}
?>		
      <div class="site-content">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="m-y-0">Products</h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <?php $getCategories = getAllDataWithStatus('food_category','0');?>
              <?php $getWeights = getAllDataWithStatus('food_product_weights','0');?>
              <?php $getIngredients = getAllDataWithStatus('food_ingredients','0');?>
              <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <form data-toggle="validator" method="post" enctype="multipart/form-data">
                  <?php $getResturants = getAllDataWithStatus('food_restaurants','0');?>
                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Choose your Resturant</label>
                    <select name="restaurant_id" class="custom-select" data-error="This field is required." required>
                      <option value="">Select Resturant</option>
                      <?php while($row = $getResturants->fetch_assoc()) {  ?>
                          <option value="<?php echo $row['id']; ?>" ><?php echo $row['restaurant_name']; ?></option>
                      <?php } ?>
                   </select>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Choose your Category</label>
                    <select id="form-control-3" name="category_id" class="custom-select" data-error="This field is required." required>
                      <option value="">Select Category</option>
                      <?php while($row = $getCategories->fetch_assoc()) {  ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['category_name']; ?></option>
                      <?php } ?>
                   </select>
                    <div class="help-block with-errors"></div>
                  </div>

                  
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Product Name</label>
                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name" data-error="Please enter product name." required>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-5">
                        <label for="form-control-3" class="control-label">Choose Weight Type</label>
                        <select id="form-control-3" name="weight_type_id[]" class="custom-select" data-error="This field is required." required>
                          <option value="">Select Weight Type</option>
                          <?php while($row = $getWeights->fetch_assoc()) {  ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['weight_type']; ?></option>
                          <?php } ?>
                       </select>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="form-control-2" class="control-label">Product Price</label>
                        <input type="text" class="form-control" id="price" name="product_price[]" placeholder="Product Price" data-error="Please enter product price." required onkeypress="return isNumberKey(event)">
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-2">
                      
                     <a href="javascript:void(0);"  ><img style="margin-top: 28px;" src="add-icon.png" onkeypress="return isNumberKey(event)" onclick="addInput('dynamicInput');"/></a>
                    </div>
                    <div id="dynamicInput" class="input-field col s12"></div>  
                  </div>

                  <div class="row">
                    <div class="form-group col-md-5">  
                        <label for="form-control-3" class="control-label">Choose Ingredient Type</label>
                        <select id="form-control-3" name="ingredient_name_id[]" class="custom-select" data-error="This field is required." required>
                          <option value="">Select Ingredient Type</option>
                          <?php while($row = $getIngredients->fetch_assoc()) {  ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['ingredient_name']; ?></option>
                          <?php } ?>
                       </select>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="form-control-2" class="control-label">Ingredient Price</label>
                        <input type="text" class="form-control" id="price" name="ingredient_price[]" placeholder="Ingredient Price" data-error="Please enter Ingredient Price." required onkeypress="return isNumberKey(event)">
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-2">
                      <a href="javascript:void(0);"  ><img src="add-icon.png" style="margin-top: 28px;" onkeypress="return isNumberKey(event)" onclick="addInput1('dynamicInput1');"/></a>
                    </div>
                  </div>    
                  
                  <div id="dynamicInput1" class="input-field col s12"></div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Description</label>
                    <textarea name="specifications" class="form-control" id="description" placeholder="Description" data-error="This field is required." required></textarea>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div id="formdiv">                   
                          <div id="filediv"><input required name="product_images[]" accept="image/*" type="file" id="file" /></div><br/><input type="button" id="add_more" class="upload" value="Add More Files"/>                                                    
                  </div>
                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Avalability</label>
                    <select id="form-control-3" name="availability_id" class="custom-select" data-error="This field is required." required>
                      <option value="">Avalability</option>
                        <option value="0">In Stock</option>
                        <option value="1">Out Of Stock</option>
                   </select>
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

                  <button type="submit" name="submit" value="Submit"  class="btn btn-primary btn-block">Submit</button>
                </form>
              </div>
            </div>
            <hr>
          </div>
        </div>
      </div>
      <?php include_once 'admin_includes/footer.php'; ?>
   <script src="js/tables-datatables.min.js"></script>
   <script src="js/multi_image_upload.js"></script>
   <link rel="stylesheet" type="text/css" href="css/multi_image_upload.css">
    <!-- Below script for ck editor -->
<script src="//cdn.ckeditor.com/4.7.0/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'description' );
</script>
<?php
    $sql1 = "SELECT * FROM  food_product_weights where lkp_status_id = '0'";
    $result1 = $conn->query($sql1);                                    
?>

<?php while($row = $result1->fetch_assoc()) { 
   $choices1[] = $row['id'];
   $choices_names[] = $row['weight_type'];
} ?>

<?php
    $getFoodIng = "SELECT * FROM  food_ingredients where lkp_status_id = '0'";
    $getFoodIngAll = $conn->query($getFoodIng);                                    
?>

<?php while($row = $getFoodIngAll->fetch_assoc()) { 
   $choices2[] = $row['id'];
   $choices_names1[] = $row['ingredient_name'];
} ?>

<script type="text/javascript">

function addInput(divName) {
    var choices = <?php echo json_encode($choices1); ?>; 
    var choices_names = <?php echo json_encode($choices_names); ?>;      
    var newDiv = document.createElement('div');
    newDiv.className = 'new_appen_class';
    var selectHTML = "";    
    selectHTML="<div class='input-field form-group col-md-5'><select required name='weight_type_id[]' id='form-control-3' class='custom-select' style='display:block !important'><option value=''>Select Weighy Type</option>";
    var newTextBox = "<div class='form-group col-md-5'><input type='text' onkeypress='return isNumberKey(event)' onclick='addInput('dynamicInput');' required name='product_price[]' class='form-control' id='form-control-2' placeholder='Product Price'></div>";
    removeBox="<div class='input-field  form-group col-md-2'><a class='remove_button' ><img src='remove-icon.png' style='margin-top: 8px;'/></a></div><div class='clearfix'></div>";
    for(i = 0; i < choices.length; i = i + 1) {
        selectHTML += "<option value='" + choices[i] + "'>" + choices_names[i] + "</option>";
    }
    selectHTML += "</select></div>";
    newDiv.innerHTML = selectHTML+ " &nbsp;"+newTextBox +" "+removeBox;
    document.getElementById(divName).appendChild(newDiv);
}

$(document).ready(function() {
    $(dynamicInput).on("click",".remove_button", function(e){ //user click on remove text
        e.preventDefault();
        $(this).parent().parent().remove();
    })
    
});
</script>
<script type="text/javascript">
function addInput1(divName1) {
    var choices = <?php echo json_encode($choices2); ?>; 
    var choices_names1 = <?php echo json_encode($choices_names1); ?>;      
    var newDiv = document.createElement('div');
    newDiv.className = 'new_appen_class';
    var selectHTML = "";    
    selectHTML="<div class='input-field form-group col-md-6'><select required name='ingredient_name_id[]' id='form-control-3' class='custom-select' style='display:block !important'><option value=''>Select Ingredient Type</option>";
    var newTextBox = "<div class='form-group col-md-4'><input type='text' onkeypress='return isNumberKey(event)' onclick='addInput1('dynamicInput1');' required name='ingredient_price[]' class='form-control' id='form-control-2' placeholder='Ingrediet Price'></div>";
    removeBox="<div class='input-field  form-group col-md-2'><a class='remove_button' ><img src='remove-icon.png'/></a></div><div class='clearfix'></div>";
    for(i = 0; i < choices.length; i = i + 1) {
        selectHTML += "<option value='" + choices[i] + "'>" + choices_names1[i] + "</option>";
    }
    selectHTML += "</select></div>";
    newDiv.innerHTML = selectHTML+ " &nbsp;"+newTextBox +" "+removeBox;
    document.getElementById(divName1).appendChild(newDiv);
}

$(document).ready(function() {
    $(dynamicInput1).on("click",".remove_button", function(e){ //user click on remove text
        e.preventDefault();
        $(this).parent().parent().remove();
    })
    
});
</script>
<script type="text/javascript">

//Script allowed only numeric value
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>
