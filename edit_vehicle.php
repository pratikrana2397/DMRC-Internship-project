<?php
  $page_title = 'Edit vehicle';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>
<?php
$vehicle = find_by_id('vehicle',(int)$_GET['id']);
$all_categories = find_all('categories');
$all_photo = find_all('media');
if(!$vehicle){
  $session->msg("d","Missing vehicle id.");
  redirect('vehicle.php');
}
?>
<?php
 if(isset($_POST['vehicle'])){
    $req_fields = array('vehicle-station','vehicle-reg','vehicle-class','vehicle-makemodel','vehicle-engine','vehicle-chasis', 'vehicle-o','vehicle-categorie' );
    validate_fields($req_fields);

   if(empty($errors)){
     
     $p_st  = remove_junk($db->escape($_POST['vehicle-station']));
     $p_reg   = remove_junk($db->escape($_POST['vehicle-reg']));

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
     
       $query   = "UPDATE vehicle SET";
       $query  .=" station ='{$p_st}', reg_no ='{$p_reg}', vehicle_class='{$p_class}', maker_model='{$p_makermodel}',";
       $query  .=" engine_no ='{$p_eng}', chasis_no ='{$p_cha}', o_name='{$p_o}', categorie_id ='{$p_cat}',media_id='{$media_id}'";
       $query  .=" WHERE id ='{$vehicle['id']}'";
       $result = $db->query($query);
               if($result && $db->affected_rows() === 1){
                 $session->msg('s',"Vehicle updated ");
                 redirect('vehicle.php', false);
               } else {
                 $session->msg('d',' Sorry failed to updated!');
                 redirect('edit_vehicle.php?id='.$vehicle['id'], false);
               }

   } else{
       $session->msg("d", $errors);
       redirect('edit_vehicle.php?id='.$vehicle['id'], false);
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
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Add New Vehicle</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-7">
           <form method="post" action="edit_vehicle.php?id=<?php echo (int)$vehicle['id'] ?>">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="vehicle-station" value="<?php echo remove_junk($vehicle['station']);?>">
               </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <select class="form-control" name="vehicle-categorie">
                    <option value=""> Select a categorie</option>
                   <?php  foreach ($all_categories as $cat): ?>
                     <option value="<?php echo (int)$cat['id']; ?>" <?php if($vehicle['categorie_id'] === $cat['id']): echo "selected"; endif; ?> >
                       <?php echo remove_junk($cat['name']); ?></option>
                   <?php endforeach; ?>
                 </select>
                  </div>
                  <div class="col-md-6">
                    <select class="form-control" name="product-photo">
                      <option value=""> No image</option>
                      <?php  foreach ($all_photo as $photo): ?>
                        <option value="<?php echo (int)$photo['id'];?>" <?php if($vehicle['media_id'] === $photo['id']): echo "selected"; endif; ?> >
                          <?php echo $photo['file_name'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
               <div class="row">
                 <div class="col-md-4">
                  <div class="form-group">
                    <label for="qty">Registration Number</label>
                    <div class="input-group">
                      <span class="input-group-addon">
                       <i class="glyphicon glyphicon-shopping-cart"></i>
                      </span>
                      <input type="text" class="form-control" name="vehicle-reg" value="<?php echo remove_junk($vehicle['reg_no']); ?>">
                   </div>
                  </div>
                 </div>
                 <div class="col-md-4">
                  <div class="form-group">
                    <label for="qty">Vehicle Class</label>
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-usd"></i>
                      </span>
                      <input type="text" class="form-control" name="vehicle-class" value="<?php echo remove_junk($vehicle['vehicle_class']);?>">
                   </div>
                  </div>
                 </div>
                  <div class="col-md-4">
                   <div class="form-group">
                     <label for="qty">Maker Model</label>
                     <div class="input-group">
                       <span class="input-group-addon">
                         <i class="glyphicon glyphicon-usd"></i>
                       </span>
                       <input type="text" class="form-control" name="vehicle-makemodel" value="<?php echo remove_junk($vehicle['maker_model']);?>">
                    </div>
                   </div>
                  </div>
                   <div class="col-md-4">
                   <div class="form-group">
                     <label for="qty">Engine Number</label>
                     <div class="input-group">
                       <span class="input-group-addon">
                         <i class="glyphicon glyphicon-usd"></i>
                       </span>
                       <input type="text" class="form-control" name="vehicle-engine" value="<?php echo remove_junk($vehicle['engine_no']);?>">
                    </div>
                   </div>
                  </div>
              <div class="col-md-4">
                   <div class="form-group">
                     <label for="qty">Chasis Number</label>
                     <div class="input-group">
                       <span class="input-group-addon">
                         <i class="glyphicon glyphicon-usd"></i>
                       </span>
                       <input type="text" class="form-control" name="vehicle-chasis" value="<?php echo remove_junk($vehicle['chasis_no']);?>">
                    </div>
                   </div>
                  </div>
              <div class="col-md-4">
                   <div class="form-group">
                     <label for="qty">Owner Name</label>
                     <div class="input-group">
                       <span class="input-group-addon">
                         <i class="glyphicon glyphicon-usd"></i>
                       </span>
                       <input type="text" class="form-control" name="vehicle-o" value="<?php echo remove_junk($vehicle['o_name']);?>">
                    </div>
                   </div>
                  </div>
                </div>
              </div>    
            <button type="submit" name="vehicle" class="btn btn-danger">Update</button>
          </form>
         </div>
        </div>
      </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
