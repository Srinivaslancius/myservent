<?php include_once 'admin_includes/main_header.php'; ?>
<?php  
$id = $_GET['fcid'];
if (!isset($_POST['submit'])) {
      //If fail
        echo "fail";
    } else {
    //If success            
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $description = $_POST['description'];
    $username = $_POST['username'];
    $password = decryptPassword($_POST['password']);
    $confirm_pass = decryptPassword($_POST['confirm_pass']);
    $working_timings = $_POST['working_timings'];
    $min_delivery = $_POST['min_delivery'];
    $lkp_state_id = $_POST['lkp_state_id'];
    $lkp_district_id = $_POST['lkp_district_id'];
    $lkp_city_id = $_POST['lkp_city_id'];
    $location = $_POST['location'];
    $lkp_status_id = $_POST['lkp_status_id'];

      if($_FILES["fileToUpload"]["name"]!='') {

              $fileToUpload = uniqid().$_FILES['fileToUpload']['name'];
              $target_dir = "../../uploads/food_vendor_logo/";
              $target_file = $target_dir . basename($fileToUpload);
              $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
              $getImgUnlink = getImageUnlink('logo','vendors','id',$id,$target_dir);
                //Send parameters for img val,tablename,clause,id,imgpath for image ubnlink from folder
              if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $sql = "UPDATE vendors SET name = '$name', email = '$email', mobile = '$mobile',description = '$description', username = '$username',password = '$password',confirm_pass = '$confirm_pass',working_timings = '$working_timings',min_delivery = '$min_delivery',lkp_state_id = '$lkp_state_id',lkp_district_id = '$lkp_district_id',lkp_city_id = '$lkp_city_id',location = '$location', logo = '$fileToUpload' WHERE id = '$id' ";
                    if($conn->query($sql) === TRUE){
                       echo "<script type='text/javascript'>window.location='vendors.php?msg=success'</script>";
                    } else {
                       echo "<script type='text/javascript'>window.location='vendors.php?msg=fail'</script>";
                    }
                    //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
      } else {

          $sql = "UPDATE vendors SET name = '$name', email = '$email', mobile = '$mobile',description = '$description', username = '$username',password = '$password',confirm_pass = '$confirm_pass',working_timings = '$working_timings',min_delivery = '$min_delivery',lkp_state_id = '$lkp_state_id',lkp_district_id = '$lkp_district_id',lkp_city_id = '$lkp_city_id',location = '$location' WHERE id = '$id' ";
          if($conn->query($sql) === TRUE){
             echo "<script type='text/javascript'>window.location='vendors.php?msg=success'</script>";
          } else {
             echo "<script type='text/javascript'>window.location='vendors.php?msg=fail'</script>";
          }

      }
  }   
?>
      <div class="site-content">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="m-y-0">Vendors</h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <?php $getAllVendorsData = getAllDataWhere('vendors','id',$id);
              $getVendorsData = $getAllVendorsData->fetch_assoc(); ?>  
              <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <form data-toggle="validator" method="POST" autocomplete="off" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Vendor Name</label>
                    <input type="text" name="title" class="form-control" id="form-control-2" placeholder="Vendor Name" data-error="Please enter Vendor Name" required value="<?php echo $getVendorsData['name'];?>">
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Email</label>
                    <input type="email" name="user_email" class="form-control" id="form-control-2" placeholder="Email" data-error="Please enter a valid email address." required value="<?php echo $getVendorsData['email'];?>">
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Mobile</label>
                    <input type="text" name="user_mobile" class="form-control" id="form-control-2" placeholder="Mobile" data-error="Please enter Correct Mobile Number." required maxlength="10" pattern="[0-9]{10}" onkeypress="return isNumberKey(event)" value="<?php echo $getVendorsData['mobile'];?>">
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Description</label>
                    <textarea name="description" class="form-control" id="description" data-error="Please enter a valid email address." required><?php echo $getVendorsData['description'];?></textarea>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">User Name</label>
                    <input type="text" name="username" class="form-control" id="form-control-2" placeholder="User Name" data-error="Please enter Name" required value="<?php echo $getVendorsData['username'];?>">
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" id="form-control-2" placeholder="Password" data-error="Please enter Password." required value="<?php echo $getVendorsData['password'];?>">
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" id="form-control-2" placeholder="Confirm Password" data-error="Please enter Confirm Password." required value="<?php echo $getVendorsData['confirm_password'];?>">
                    <div class="help-block with-errors"></div>
                  </div>
                  <div id="divCheckPasswordMatch" style="color:red"></div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Working Timings</label>
                    <input type="text" name="working_timings" class="form-control" id="form-control-2" placeholder="Working Timings" data-error="Please enter Working Timings" required  value="<?php echo $getVendorsData['working_timings'];?>">
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Minimum Delivery Time</label>
                    <input type="text" name="min_delivery_time" class="form-control" id="form-control-2" placeholder="Minimum Delivery Time" data-error="Please enter Minimum Delivery Time" required  value="<?php echo $getVendorsData['min_delivery_time'];?>">
                    <div class="help-block with-errors"></div>
                  </div>
                    <div class="form-group">
                    <label for="form-control-4" class="control-label">logo</label>
                    <img src="<?php echo $base_url . 'uploads/food_vendor_logo/'.$getVendorsData['logo'] ?>"  id="output" height="100" width="100"/>
                    <label class="btn btn-default file-upload-btn">
                        Choose file...
                        <input id="form-control-22" class="file-upload-input" type="file" accept="image/*" name="fileToUpload" id="fileToUpload"  onchange="loadFile(event)"  multiple="multiple" >
                      </label>
                  </div>
                  <?php $getStatus = getAllData('lkp_status');?>
                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Choose your status</label>
                    <select id="form-control-3" name="lkp_status_id" class="custom-select" data-error="This field is required." required>
                      <option value="">Select Status</option>
                      <?php while($row = $getStatus->fetch_assoc()) {  ?>
                          <option <?php if($row['id'] == $getVendorsData['lkp_status_id']) { echo "Selected"; } ?> value="<?php echo $row['id']; ?>"><?php echo $row['status']; ?></option>
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