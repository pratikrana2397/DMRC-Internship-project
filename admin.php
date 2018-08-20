<?php
  $page_title = 'Admin Home Page';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>
<?php
 $c_categorie     = count_by_id('categories');
 $c_vehicle       = count_by_id('vehicle');
 $c_station       = count_by_id('station');
 $c_user          = count_by_id('users');
 //$products_sold   = find_higest_saleing_product('10');
 $recent_vehicles = find_recent_vehicle_added('5');
 $recent_stations  = find_recent_station_added('5')
?>
<?php include_once('layouts/header.php'); ?>

<div class="row">
   <div class="col-md-6">
     <?php echo display_msg($msg); ?>
   </div>
</div>
  <div class="row">
    <div class="col-md-3">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-green">
          <i class="glyphicon glyphicon-user"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $c_user['total']; ?> </h2>
          <p class="text-muted">Users</p>
        </div>
       </div>
    </div>
    <div class="col-md-3">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-red">
          <i class="glyphicon glyphicon-list"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $c_categorie['total']; ?> </h2>
          <p class="text-muted">Categories</p>
        </div>
       </div>
    </div>
    <div class="col-md-3">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-blue">
          <i class="glyphicon glyphicon-bed"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $c_vehicle['total']; ?> </h2>
          <p class="text-muted">Vehicles</p>
        </div>
       </div>
    </div>
    <div class="col-md-3">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-yellow">
          <i class="glyphicon glyphicon-modal-window"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $c_station['total']; ?></h2>
          <p class="text-muted">Stations</p>
        </div>
       </div>
    </div>
</div>
  <div class="row">
   <div class="col-md-12">
      <div class="panel">
        <div class="jumbotron text-center">
           <h1>Welcome <?php echo $user['name'];?> </h1>
           <p> <strong> You Can Acess Your Previlages</strong>  <strong> From the right hand side menu </strong>.
           

        </div>
      </div>
   </div>
  </div>
  <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Recently added Stations</span>
          </strong>
        </div>
        <div class="panel-body">
          <table class="table table-striped table-bordered table-condensed">
       <thead>
         <tr>
           <th class="text-center" style="width: 50px;">#</th>
           <th>Station Name</th>
           <th>Date</th>
           <th>Total Capacity</th>
         </tr>
       </thead>
       <tbody>
         <?php foreach ($recent_stations as  $recent_station): ?>
         <tr>
           <td class="text-center"><?php echo count_id();?></td>
           <td>
            <a href="edit_station.php?id=<?php echo (int)$recent_station['id']; ?>">
             <?php echo remove_junk(first_character($recent_station['station_name'])); ?>
           </a>
           </td>
           <td><?php echo remove_junk(ucfirst($recent_station['date'])); ?></td>
           <td><?php echo remove_junk(first_character($recent_station['size'])); ?></td>
        </tr>

       <?php endforeach; ?>
       </tbody>
     </table>
    </div>
   </div>
  </div>
  

  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Recently Added Vehicles</span>
        </strong>
      </div>
      <div class="panel-body">

        <div class="list-group">
      <?php foreach ($recent_vehicles as  $recent_vehicle): ?>
            <a class="list-group-item clearfix" href="edit_vehicle.php?id=<?php echo    (int)$recent_vehicle['id'];?>">
                <h4 class="list-group-item-heading">
                 <?php if($recent_vehicle['media_id'] === '0'): ?>
                    <img class="img-avatar img-circle" src="uploads/vehicles/no_image.jpg" alt="">
                  <?php else: ?>
                  <img class="img-avatar img-circle" src="uploads/vehicles/<?php echo $recent_vehicle['image'];?>" alt="" />
                <?php endif;?>
                <?php echo remove_junk(first_character($recent_vehicle['reg_no']));?>
                  <span class="label label-warning pull-right">
                 $<?php echo (int)$recent_vehicle['maker_model']; ?>
                  </span>
                </h4>
                <span class="list-group-item-text pull-right">
                <?php echo remove_junk(first_character($recent_vehicle['categorie'])); ?>
              </span>
          </a>
      <?php endforeach; ?>
    </div>
  </div>
 </div>
</div>
 </div>
  <div class="row">

  </div>



<?php include_once('layouts/footer.php'); ?>
