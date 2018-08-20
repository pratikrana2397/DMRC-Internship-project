
<?php
  $page_title = 'Home Page';
  require_once('includes/load.php');
  if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12">
   
  </div>
 <div class="col-md-12">
    <div class="panel">
      <div class="jumbotron text-center">
         <div class="form-group">
         <form action="uploaddo.php" method="post" enctype="multipart/form-data">
      Select Document to upload:
      <input type="file" name="fileToUpload" id="fileToUpload" class="form-control"><br>
      <button type="submit" name="submit" value="Upload File" class="btn btn-info  pull-right" >Upload File</button>
      </form>
    </div>
      </div>
    </div>
 </div>
</div>
<?php include_once('layouts/footer.php'); ?>
