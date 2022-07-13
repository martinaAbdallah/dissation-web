<?php
  $page_title = 'Edit Market';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
  $e_market = find_by_id('markets',(int)$_GET['id']);
//   $groups  = find_all('user_groups');
  if(!$e_market){
    $session->msg("d","Missing market id.");
    redirect('markets.php');
  }
?>

<?php
//Update User basic info
  if(isset($_POST['update'])) {
    $req_fields = array('market_name','status');
    validate_fields($req_fields);
    if(empty($errors)){
             $id = (int)$e_market['id'];
            
           $market_name = remove_junk($db->escape($_POST['market_name']));
    
       $status   = remove_junk($db->escape($_POST['status']));
            $sql = "UPDATE markets SET market_name ='{$market_name}',status='{$status}' WHERE id='{$db->escape($id)}'";
         $result = $db->query($sql);
          if($result && $db->affected_rows() === 1){
            $session->msg('s',"Acount Updated ");
            redirect('edit_market.php?id='.(int)$e_market['id'], false);
          } else {
            $session->msg('d',' Sorry failed to updated!');
            redirect('edit_market.php?id='.(int)$e_market['id'], false);
          }
    } else {
      $session->msg("d", $errors);
      redirect('edit_market.php?id='.(int)$e_market['id'],false);
    }
  }
?>
<?php
// Update user password
if(isset($_POST['update-pass'])) {
  $req_fields = array('market_password');
  validate_fields($req_fields);
  if(empty($errors)){
           $id = (int)$e_market['id'];
     $password = remove_junk($db->escape($_POST['market_password']));
     $h_pass   = sha1($password);
          $sql = "UPDATE markets SET password='{$h_pass}' WHERE id='{$db->escape($id)}'";
       $result = $db->query($sql);
        if($result && $db->affected_rows() === 1){
          $session->msg('s',"Market password has been updated ");
          redirect('edit_market.php?id='.(int)$e_market['id'], false);
        } else {
          $session->msg('d',' Sorry failed to updated user password!');
          redirect('edit_market.php?id='.(int)$e_market['id'], false);
        }
  } else {
    $session->msg("d", $errors);
    redirect('edit_market.php?id='.(int)$e_market['id'],false);
  }
}

?>
<?php include_once('layouts/header.php'); ?>
 <div class="row">
   <div class="col-md-12"> <?php echo display_msg($msg); ?> </div>
  <div class="col-md-6">
     <div class="panel panel-default">
       <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          Update <?php echo remove_junk(ucwords($e_market['market_name'])); ?> Account
        </strong>
       </div>
       <div class="panel-body">
          <form method="post" action="edit_market.php?id=<?php echo (int)$e_market['id'];?>" class="clearfix">
            <div class="form-group">
                  <label for="name" class="control-label">Market Name</label>
                  <input type="name" class="form-control" name="market_name" value="<?php echo remove_junk(ucwords($e_market['market_name'])); ?>">
            </div>
            <div class="form-group">
              <label for="status">Status</label>
                <select class="form-control" name="status">
                  <option <?php if($e_market['status'] === '1') echo 'selected="selected"';?>value="1">Active</option>
                  <option <?php if($e_market['status'] === '0') echo 'selected="selected"';?> value="0">Deactive</option>
                </select>
            </div>
            <div class="form-group clearfix">
                    <button type="submit" name="update" class="btn btn-info">Update</button>
            </div>
        </form>
       </div>
     </div>
  </div>
  <!-- Change password form -->
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          Change <?php echo remove_junk(ucwords($e_market['market_name'])); ?> password
        </strong>
      </div>
      <div class="panel-body">
        <form action="edit_market.php?id=<?php echo (int)$e_market['id'];?>" method="post" class="clearfix">
          <div class="form-group">
                <label for="password" class="control-label">Password</label>
                <input type="password" class="form-control" name="market_password" placeholder="Type market new password">
          </div>
          <div class="form-group clearfix">
                  <button type="submit" name="update" class="btn btn-danger pull-right">Change</button>
          </div>
        </form>
      </div>
    </div>
  </div>

 </div>
<?php include_once('layouts/footer.php'); ?>
