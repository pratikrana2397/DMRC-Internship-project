<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(3);
?>
<?php
  $d_station = find_by_id('station',(int)$_GET['id']);
  if(!$d_station){
    $session->msg("d","Missing station id.");
    redirect('station.php');
  }
?>
<?php
  $delete_id = delete_by_id('station',(int)$d_station['id']);
  if($delete_id){
      $session->msg("s","station deleted.");
      redirect('station.php');
  } else {
      $session->msg("d","station deletion failed.");
      redirect('station.php');
  }
?>
