<?php $user = current_user(); ?>
<!DOCTYPE html>
  <html lang="en">
    <head>
    <meta charset="UTF-8">
    <title><?php if (!empty($page_title))
           echo remove_junk($page_title);
            elseif(!empty($user))
           echo ucfirst($user['name']);
            else echo "Fire Alerting System";?>
    </title>
    <link rel="shortcut icon" href="62873f6b13eb183d36d5410ab3fdba01.ico/favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
    <link rel="stylesheet" href="libs/css/main.css" />
  </head>
  <body>
  <?php  if ($session->isUserLoggedIn(true)): ?>
   
   
<?php endif;?>

<div class="page">
  <div class="container-fluid">
