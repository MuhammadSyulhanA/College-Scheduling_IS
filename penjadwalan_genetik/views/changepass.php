<div class="content">
   <div class="header">
      <div class="stats">
         <!--     <p class="stat"><span class="number">53</span>tickets</p>
         <p class="stat"><span class="number">27</span>tasks</p>
         <p class="stat"><span class="number">15</span>waiting</p>-->
      </div>
      <h1 class="page-title">Pengaturan Kata Sandi</h1>
   </div>
   <ul class="breadcrumb">
      <li><a href="<?php echo base_url() ?>web">Beranda</a> <span class="divider">/</span></li>
      <li class="active"><?php echo $page_title; ?></li>
   </ul>
   <div class="container-fluid">
      <div class="row-fluid">
         <?php if (isset($msg)) { ?>
            <div class="alert alert-error">
               <button type="button" class="close" data-dismiss="alert">×</button>
               <?php echo $msg; ?>
            </div>
         <?php } ?>

         <div class="row-fluid">
            <form method="POST" name="formkatsand" action="<?php echo base_url(); ?>web/ubahSandi">
               <input type="hidden" name="id" autofocus value="<?php echo $ses_id; ?>"><br>
               <label for="username">Username</label>
               <input type="text" id="username" name="username" autofocus value="<?php echo $ses_nama; ?>"><br>
               <label for="password">Password</label>
               <input type="password" id="password" name="password" value="<?php echo $password; ?>"><br>
               <input type="submit" name="submit" value="Update" class="btn btn-primary">
               <br><br>
               <p>*Jika password tidak diganti , maka diamkan saja</p>
            </form>
         </div>
      </div>
   </div>
</div>