<?php

include_once "database/connect.php";
include_once "header.php";
include_once "function.php";

if(empty($_SESSION['user'])): ?>

<?php header("location:login.php"); ?>

<?php else: ?>

        <!-- MAIN CONTAINER -->
        <section class="main-container" >

        <?php readfav($_SESSION['user']);?>

        <h1 class="txthome">New on Netfish</h1>
      <div class="box">
        <?php read('new');?>
      </div>
      
      <h1 class="txthome">Netfish Originals</h1>
      <div class="box">
      <?php read('original');?>              
      </div>

      <h1 class="txthome">Action & Adventure</h1>
      <div class="box">
      <?php read('action');?>         
      </div>
      
      <h1 class="txthome">Science Fiction</h1>
      <div class="box">
      <?php read('scifi');?>           
      </div>

      <h1 class="txthome">Comedy</h1>
      <div class="box">
      <?php read('comedy');?>           
      </div>

      <h1 class="txthome">Horror</h1>
      <div class="box">
      <?php read('horror');?>             
      </div>
      
<?php endif; ?>
