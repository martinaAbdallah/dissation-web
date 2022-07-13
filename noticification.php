<?php
  $page_title = 'All Notifications';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>
<?php
$readings = find_all_reading();
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
            <span>Noticifications readings</span>
          </strong>
        </div>
        <div class="panel-body">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th class="text-center" style="width: 5%;">#</th>
               
                <th class="text-center" style="width: 15%;"> Noticification</th>
       
                <th class="text-center" style="width: 15%;"> Date and Time</th>
             </tr>
            </thead>
           <tbody>
             <?php foreach ($readings as $row):?>
    
             <tr>
               <td class="text-center"><?php echo $row['id'];?></td>
            
               <td class="text-center"><?php 
               if($row['Noticifications']==1)
               echo "notcification is sent";
               else
                echo "notcification is not sent"
                ?>
               </td>
             
               <td class="text-center"><?php echo $row['Time']; ?></td>
             </tr>
             <?php endforeach;?>
           </tbody>
         </table>
        </div>
      </div>
    </div>
  </div>
<?php include_once('layouts/footer.php'); ?>
