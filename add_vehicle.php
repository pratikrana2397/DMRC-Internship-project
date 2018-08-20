<?php
  $page_title = 'Add Vehicles';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(3);
  $all_categories = find_all('categories');
  $all_photo = find_all('media');
?>
<?php
 if(isset($_POST['add_vehicle'])){
   $req_fields = array('vehicle-station','vehicle-reg','vehicle-date','vehicle-class','vehicle-makemodel','vehicle-engine','vehicle-chasis', 'vehicle-o','vehicle-categorie' );
   validate_fields($req_fields);
   if(empty($errors)){
     
     $p_st  = remove_junk($db->escape($_POST['vehicle-station']));
     $p_reg   = remove_junk($db->escape($_POST['vehicle-reg']));
     $p_date  = remove_junk($db->escape($_POST['vehicle-date']));

     $p_class  = remove_junk($db->escape($_POST['vehicle-class']));
     $p_makermodel  = remove_junk($db->escape($_POST['vehicle-makemodel']));
     $p_eng   = remove_junk($db->escape($_POST['vehicle-engine']));
     $p_cha   = remove_junk($db->escape($_POST['vehicle-chasis']));
     $p_o  = remove_junk($db->escape($_POST['vehicle-o']));
     $p_cat  = remove_junk($db->escape($_POST['vehicle-categorie']));
     if (is_null($_POST['vehicle-photo']) || $_POST['vehicle-photo'] === "") {
       $media_id = '0';
     } else {
       $media_id = remove_junk($db->escape($_POST['vehicle-photo']));
     }
     $p_date    = make_date();
     $query  = "INSERT INTO vehicle (";
     $query .="station, reg_no, reg_date, vehicle_class, maker_model, engine_no, chasis_no, o_name, categorie_id, media_id";
     $query .=") VALUES (";
     $query .=" '{$p_st}', '{$p_reg}', '{$p_date}', '{$p_class}', '{$p_makermodel}', '{$p_eng}', '{$p_cha}', '{$p_o}','{$p_cat}','{$media_id}'";
     $query .=")";
     $query .=" ON DUPLICATE KEY UPDATE reg_no='{$p_reg}'";
     if($db->query($query)){
       $session->msg('s',"Vehicle added ");
       redirect('add_vehicle.php', false);
     } else {
       $session->msg('d',' Sorry failed to added!');
       redirect('vehicle.php', false);
     }

   } else{
     $session->msg("d", $errors);
     redirect('add_vehicle.php',false);
   }

 }

?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
</div>
  <div class="row">
  <div class="col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Add New Vehicle</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
          <form method="post" action="add_vehicle.php" class="clearfix">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="vehicle-station" placeholder="Station at which vehicle is found">
               </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="vehicle-reg" placeholder="Vehicle Registration No.">
               </div>
              </div>
              
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="vehicle-date" placeholder="Date at which vehicle is registered ">
               </div>
              </div>
              
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="vehicle-class" placeholder="Vehicle Class Model">
               </div>
              </div>
              
              
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="vehicle-makemodel" placeholder="Vehicle Make Model">
               </div>
              </div>
              

              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="vehicle-engine" placeholder="Vehicle Engine Number">
               </div>
              </div>

              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="vehicle-chasis" placeholder="Vehicle Chasis Number">
               </div>
              </div>
              
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="vehicle-o" placeholder="Vehicle Owner's Name">
               </div>
              </div>
              
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <select class="form-control" name="vehicle-categorie">
                      <option value="">Select Vehicle Category</option>
                    <?php  foreach ($all_categories as $cat): ?>
                      <option value="<?php echo (int)$cat['id'] ?>">
                        <?php echo $cat['name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <select class="form-control" name="vehicle-photo">
                      <option value="">Select Vehicle Photo</option>
                    <?php  foreach ($all_photo as $photo): ?>
                      <option value="<?php echo (int)$photo['id'] ?>">
                        <?php echo $photo['file_name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
              <button type="submit" name="add_vehicle" class="btn btn-danger">Add Vehicle</button>
          </form>
         </div>
        </div>
      </div>
    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
