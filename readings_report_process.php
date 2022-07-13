<?php
$page_title = 'Fire components Report';
$results = '';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>

<?php
  if(isset($_POST['submit'])){
    $req_dates = array('start-date','end-date');
    validate_fields($req_dates);

    if(empty($errors)):
      $start_date   = remove_junk($db->escape($_POST['start-date']));
      $end_date     = remove_junk($db->escape($_POST['end-date']));
      $readings      = find_readings_by_dates($start_date,$end_date);
    else:
      $session->msg("d", $errors);
      redirect('readings_report.php', false);
    endif;

  } else {
    $session->msg("d", "Select dates");
    redirect('readings_report.php', false);
  }
?>
<!doctype html>
<html lang="en-US">
 <head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <title>Default Page Title</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
   <style>
   @media print {
     html,body{
        font-size: 9.5pt;
        margin: 0;
        padding: 0;
     }.page-break {
       page-break-before:always;
       width: auto;
       margin: auto;
      }
    }
    .page-break{
      width: 980px;
      margin: 0 auto;
    }
     .sale-head{
       margin: 40px 0;
       text-align: center;
     }.sale-head h1,.sale-head strong{
       padding: 10px 20px;
       display: block;
     }.sale-head h1{
       margin: 0;
       border-bottom: 1px solid #212121;
     }.table>thead:first-child>tr:first-child>th{
       border-top: 1px solid #000;
      }
      table thead tr th {
       text-align: center;
       border: 1px solid #ededed;
     }table tbody tr td{
       vertical-align: middle;
     }.sale-head,table.table thead tr th,table tbody tr td,table tfoot tr td{
       border: 1px solid #212121;
       white-space: nowrap;
     }.sale-head h1,table thead tr th,table tfoot tr td{
       background-color: #f8f8f8;
     }tfoot{
       color:#000;
       text-transform: uppercase;
       font-weight: 500;
     }
   </style>
</head>
<body>
  <?php if($results): ?>
    <div class="page-break">
       <div class="sale-head">
           <h2>Fire Detection and Alerting System - Fire Components Report</h2>
           <strong><?php if(isset($start_date)){ echo $start_date;}?> TILL DATE <?php if(isset($end_date)){echo $end_date;}?> </strong>
       </div>
      <table class="table table-border">
        <thead>
          <tr>
          <th>#</th>
          <th> Date and Time</th>
                <th> Temperature </th>
                <th> Flame </th>
                <th> Noticification</th> 
          </tr>
        </thead>
        <tbody>
        <?php foreach ($readings as $row):?>
           <tr>
           <td class="text-center"><?php echo $row['id'];?></td>
           <td class="text-center"><?php echo $row['Time']; ?></td>
               <td class="text-center"><?php echo (float)$row['Temperature'] ?></td>
             
               <td class="text-center"><?php 
               if($row['Flame']==1)
               echo "Fire detected";
               else
                echo "Fire not detected"
                ?>
               </td>
               <td class="text-center"><?php 
               if($row['Noticifications']==1)
               echo "notcification is sent";
               else
                echo "notcification is not sent"
                ?>
               </td>
             
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php
    else:
        $session->msg("d", "Sorry no updates has been found. ");
        redirect('readings_report.php', false);
     endif;
  ?>
</body>
</html>
<?php if(isset($db)) { $db->db_disconnect(); } ?>
