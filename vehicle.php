<?php
  $page_title = 'All Vehicles';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
  $vehicles = join_vehicle_table();
?>
<?php include_once('layouts/header.php'); ?>
  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
         <div class="pull-right">
           <a href="add_vehicle.php" class="btn btn-primary">Add New</a>
         </div>
        </div>
        <div class="panel-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center" style="width: 50px;">#</th>
                <th> Photo</th>
                <th> Vehicle  </th>
                <th class="text-center" style="width: 10%;"> Station </th>
                <th class="text-center" style="width: 10%;"> Registration Number </th>
                <th class="text-center" style="width: 10%;"> Registration Date </th>
                <th class="text-center" style="width: 10%;"> Vehicle Class </th>
                <th class="text-center" style="width: 10%;"> Vehicle Maker Model </th>
                <th class="text-center" style="width: 10%;"> Vehicle Engine No. </th>
                <th class="text-center" style="width: 10%;"> Vehicle Chasis No. </th>
                <th class="text-center" style="width: 10%;"> Owners Name </th>
                <th class="text-center" style="width: 10%;"> Vehicle Added </th>
                <th class="text-center" style="width: 100px;"> Actions </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($vehicles as $vehicle):?>
              <tr>
                <td class="text-center"><?php echo count_id();?></td>
                <td>
                  <?php if($vehicle['media_id'] === '0'): ?>
                    <img class="img-avatar img-circle" src="uploads/vehicles/no_image.jpg" alt="">
                  <?php else: ?>
                  <img class="img-avatar img-circle" src="uploads/vehicles/<?php echo $vehicle['image']; ?>" alt="">
                <?php endif; ?>
                </td>
                <td> <?php echo remove_junk($vehicle['id']); ?></td>
                <td class="text-center"> <?php echo remove_junk($vehicle['station']); ?></td>
                <td class="text-center"> <?php echo remove_junk($vehicle['reg_no']); ?></td>
                <td class="text-center"> <?php echo read_date($vehicle['reg_date']); ?></td>
                <td class="text-center"> <?php echo remove_junk($vehicle['vehicle_class']); ?></td>
                <td class="text-center"> <?php echo remove_junk($vehicle['maker_model']); ?></td>
                <td class="text-center"> <?php echo remove_junk($vehicle['engine_no']); ?></td>
                <td class="text-center"> <?php echo remove_junk($vehicle['chasis_no']); ?></td>
                <td class="text-center"> <?php echo remove_junk($vehicle['o_name']); ?></td>
                <td class="text-center"> <?php echo read_date($vehicle['reg_date']); ?></td>
                <td class="text-center">
                  <div class="btn-group">
                    <a href="edit_vehicle.php?id=<?php echo (int)$vehicle['id'];?>" class="btn btn-info btn-xs"  title="Edit" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    <a href="delete_vehicle.php?id=<?php echo (int)$vehicle['id'];?>" class="btn btn-danger btn-xs"  title="Delete" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-trash"></span>
                    </a>
                  </div>
                </td>
              </tr>
             <?php endforeach; ?>
            </tbody>
          </tabel>
        </div>
      </div>
    </div>
  </div>
  <?php include_once('layouts/footer.php'); ?>
