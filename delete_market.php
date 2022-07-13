<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
  $delete_id = delete_by_id('markets',(int)$_GET['id']);
  if($delete_id){
      $session->msg("s","Market deleted.");
      redirect('markets.php');
  } else {
      $session->msg("d","Market deletion failed Or Missing Prm.");
      redirect('markets.php');
  }
?>
