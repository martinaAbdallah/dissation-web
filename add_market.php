<?php
  $page_title = 'Add Market';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
//   $groups = find_all('user_groups');
?>
<?php
  if(isset($_POST['add'])){

   $req_fields = array('market_name','market_password','status' );
   validate_fields($req_fields);

   if(empty($errors)){
        $market_name   = remove_junk($db->escape($_POST['market_name']));
       $market_password   = remove_junk($db->escape($_POST['market_password']));
       $status   = remove_junk($db->escape($_POST['status']));
     
       $market_password = sha1($market_password);
        $query = "INSERT INTO markets (";
        $query .="market_name,market_password,status";
        $query .=") VALUES (";
        $query .=" '{$market_name}','{$market_password}','{$status}'";
        $query .=")";
        if($db->query($query)){
          //sucess
          $session->msg('s',"Market account has been creted! ");
          redirect('add_market.php', false);
        } else {
          //failed
          $session->msg('d',' Sorry failed to create account!');
          redirect('add_market.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('add_market.php',false);
   }
 }
?>
<?php include_once('layouts/header.php'); ?>
  <?php echo display_msg($msg); ?>
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Add New Market</span>
       </strong>
      </div>
      <div class="panel-body">
        <div class="col-md-6">
          <form method="post" action="add_market.php" form onsubmit="return validateForm(this)">
            <div class="form-group">
                <label for="name">Market Name</label>
                <input type="text" class="form-control" name="market_name" placeholder="Market Name">
            </div>
            <div class="form-group">
                <label for="market_password">market_password</label>
                <input type="password" class="form-control" name ="market_password" placeholder="market_password">
            </div>
            <div class="form-group">
                <label for="status">status</label>
                <input type="text" class="form-control" name="status" placeholder="status">
            </div>
            <div class="form-group clearfix">
              <button type="submit" name="add" class="btn btn-primary">Add Market</button>
            </div>
        </form>
        </div>

      </div>

    </div>
  </div>
  <script> 
    function validateForm(form) { 
        // does the first name have any numbers? 
        if (form['market_name'].value.match(/[0-9]/)) { 
            // notify the user about their mistake 
            alert("Avoid numbers in the first name field, please."); 
            // focus the field to make it easy to correct 
            form['market_name'].focus(); 
            // prevent the form from submitting 
            return false; 
        } 
        // all good, allow the form to submit 
        return true; 
    } 
</script> 
<?php include_once('layouts/footer.php'); ?>
