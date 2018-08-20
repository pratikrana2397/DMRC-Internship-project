<?php
  $page_title = 'All stations';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>
<?php
$stations = find_all_station();
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-6">
    <?php echo display_msg($msg); ?>
  </div>
</div>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>All Stations</span>
          </strong>
          <div class="pull-right">
            <a href="add_station.php" class="btn btn-primary">Add station</a>
          </div>
        </div>
        <div class="panel-body">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th class="text-center" style="width: 50px;">#</th>
                <th> Station name </th>
                <th class="text-center" style="width: 15%;"> Station Head Id</th>
                <th class="text-center" style="width: 15%;"> Station Head Name </th>
                <th class="text-center" style="width: 15%;"> Line No. </th>
                <th class="text-center" style="width: 15%;"> Parking Capacity </th>
                <th class="text-center" style="width: 15%;"> Date</th>
                <th class="text-center" style="width: 100px;"> Actions </th>
             </tr>
            </thead>
           <tbody>
             <?php foreach ($stations as $station):?>
             <tr>
               <td class="text-center"><?php echo count_id();?></td>
               <td><?php echo remove_junk($station['station_name']); ?></td>
               <td class="text-center"><?php echo remove_junk($station['stationh_id']); ?></td>
               <td class="text-center"><?php echo remove_junk($station['stationh_name']); ?></td>
               <td class="text-center"><?php echo (int)$station['Line_no']; ?></td>
               <td class="text-center"><?php echo remove_junk($station['size']); ?></td>
               <td class="text-center"><?php echo $station['date']; ?></td>
               <td class="text-center">
                  <div class="btn-group">
                     <a href="edit_station.php?id=<?php echo (int)$station['id'];?>" class="btn btn-warning btn-xs"  title="Edit" data-toggle="tooltip">
                       <span class="glyphicon glyphicon-edit"></span>
                     </a>
                     <a href="delete_station.php?id=<?php echo (int)$station['id'];?>" class="btn btn-danger btn-xs"  title="Delete" data-toggle="tooltip">
                       <span class="glyphicon glyphicon-trash"></span>
                     </a>
                  </div>
               </td>
             </tr>
             <?php endforeach;?>
           </tbody>
         </table>
        </div>
      </div>
    </div>
  </div>
<?php include_once('layouts/footer.php'); ?>
