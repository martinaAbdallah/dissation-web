<?php
  $page_title = 'Report';
  require_once('includes/load.php');
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "firesystem";
   
  $conn = new mysqli($servername, $username, $password, $database);
   
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  // Checkin What level user has permission to view this page

   page_require_level(3);
?>
<?php
  $sql  = "SELECT id,Temperature,Noticifications,Flame,Time FROM $reading";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
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
            <span>All readings</span>
          </strong>
        </div>
        <div class="panel-body">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th class="text-center" style="width: 5%;">#</th>
                <th class="text-center" style="width: 15%;"> Temperature in Celsius </th>
              
                <th class="text-center" style="width: 15%;"> Flame </th>
                <th class="text-center" style="width: 15%;"> Noticification</th>
                <th class="text-center" style="width: 15%;"> Date and Time</th>
             </tr>
            </thead>
           <tbody>
          
             <tr>
             <td class="text-center"><?php echo $row['id'];?></td>
               <td class="text-center"><?php echo (float)$row['Temperature'] ?></td>
             
               <td class="text-center"><?php 
               if($row['Flame']==1)
               echo "Flame detected";
               else
                echo "Flame not detected"
                ?>
               </td>
               <td class="text-center"><?php 
               if($row['Noticifications']==1)
               echo "notcification is sent";
               else
                echo "notcification is not sent"
                ?>
               </td>
               <td class="text-center"><?php echo $row['Time']; ?></td>
             </tr>
           </tbody>
         </table>
        </div>
      </div>
    </div>
  </div>
<?php include_once('layouts/footer.php'); ?>
