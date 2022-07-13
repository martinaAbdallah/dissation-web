<?php
  $page_title = 'Report';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>
<?php
$readings = find_all_reading();
// $readings = firedetected_readings();
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
            <span>Fire Outcomes Report in Karume Market</span>
          </strong>
        </div>
        <div class="panel-body">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <!-- <th class="text-center" style="width: 5%;">#</th> -->
                <th class="text-center" style="width: 15%;"> Date and Time</th>
                <th class="text-center" style="width: 15%;"> Temperature in Celsius </th>
              
                <th class="text-center" style="width: 15%;"> Flame </th>
                <th class="text-center" style="width: 15%;"> Noticification</th>
           
             </tr>
            </thead>
           <tbody>
             <?php foreach ($readings as $row):?>
    
             <tr>
             <td class="text-center"><?php if($row['Flame']==1|| $row['Temperature']>40) echo $row['Time']; ?></td>
               <!-- <td class="text-center"><?php if($row['Flame']==1 || $row['Temperature']>40) echo $row['id'];?></td> -->
               <td class="text-center"><?php if ($row['Flame']==1 || $row['Temperature']>40)echo (float)$row['Temperature'] ?></td>
               <td class="text-center"><?php 
               if($row['Flame']==1 || $row['Temperature']>40)
               echo "Flame detected";
              //  else
              //   echo "Flame not detected"
                ?>
               </td>
               <td class="text-center"><?php 
               if($row['Noticifications']==1 || $row['Temperature']>40)
               echo "notcification is sent";
              //  else
              //   echo "notcification is not sent"
                ?>
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
