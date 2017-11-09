<?php include_once 'admin_includes/main_header.php'; ?>
<?php $getLocations = getAllDataWithActiveRecent('lkp_locations'); $i=1; ?>
     <div class="site-content">
        <div class="panel panel-default panel-table">
          <div class="panel-heading">
            <a href="add_lkp_locations.php" style="float:right">Add Locations</a>
            <h3 class="m-t-0 m-b-5">Locations</h3>
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered dataTable" id="table-1">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>State Name</th>
                    <th>District Name</th>
                    <th>City Name</th>
                    <th>Location Name</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = $getLocations->fetch_assoc()) { ?>
                  <tr>
                   <td><?php echo $i;?></td>
                   <td><?php $getStates = getAllDataWithStatus('lkp_states','0'); while($getStatesData = $getStates->fetch_assoc()) { if($row['lkp_state_id'] == $getStatesData['id']) { echo $getStatesData['state_name']; } } ?></td>
                   <td><?php $getDistricts = getAllDataWithStatus('lkp_districts','0'); while($getDistrictsData = $getDistricts->fetch_assoc()) { if($row['lkp_district_id'] == $getDistrictsData['id']) { echo $getDistrictsData['district_name']; } } ?></td>
                   <td><?php $getCities = getAllDataWithStatus('lkp_cities','0'); while($getCitiesData = $getCities->fetch_assoc()) { if($row['lkp_city_id'] == $getCitiesData['id']) { echo $getCitiesData['city_name']; } } ?></td>
                   <td><?php echo $row['location_name'];?></td>
                   <td><?php echo $row['location_pincode'];?></td>
                   <td><?php if ($row['lkp_status_id']==0) { echo "<span class='label label-outline-success check_active open_cursor' data-incId=".$row['id']." data-status=".$row['lkp_status_id']." data-tbname='lkp_locations'>Active</span>" ;} else { echo "<span class='label label-outline-info check_active open_cursor' data-status=".$row['lkp_status_id']." data-incId=".$row['id']." data-tbname='lkp_locations'>In Active</span>" ;} ?></td>
                   <td> <a href="edit_lkp_locations.php?cityid=<?php echo $row['id']; ?>"><i class="zmdi zmdi-edit"></i></a> &nbsp; <a href="delete.php?id=<?php echo $row['id']; ?>&table=<?php echo "lkp_locations" ?>"><i class="zmdi zmdi-delete zmdi-hc-fw" onclick="return confirm('Are you sure you want to delete?')"></i></a></td>
                  </tr>
                  <?php  $i++; } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
   <?php include_once 'admin_includes/footer.php'; ?>
   <script src="js/tables-datatables.min.js"></script>