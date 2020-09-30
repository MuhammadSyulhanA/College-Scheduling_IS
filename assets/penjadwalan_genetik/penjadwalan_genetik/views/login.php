<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <title>Halaman Login | Login Page</title>
      <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta name="description" content="Halaman Login Page | Penjadwalan Genetik" />
      <meta name="author" content="Hafiz ramadhan" />
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/lib/bootstrap/login/bootstrap.min.css" />
      <link rel="stylesheet" href="<?php echo base_url();?>assets/lib/font-awesome/css/font-awesome.css" />
	  <link rel="stylesheet" href="<?php echo base_url();?>assets/lib/datepicker/css/datepicker.css" />
      <script src="<?php echo base_url()?>assets/lib/jquery-latest.min.js" type="text/javascript"></script>	  
     </head>
	 <body>

	 <div class="container" style="margin-top: 12%;">
	 			<div class="col-md-4 col-md-offset-4">
	 				<div class="panel panel-primary">
	 					<div class="panel-heading">
	 						<div ><b>LOGIN</b></div>
	 					</div>
	 					<div class="panel-body">
		 					<form role="form" name="form_login" id="form_login" method="POST" action="<?php echo base_url();?>akses/ActLogin">
		 						<div class="row">
		 						<div class="form-group col-xs-12"> 
		 							<label for="username"><span class="text-danger" style="margin-right: 5px;">*</span>Username: </label>
		 								<div class="input-group">
		 									<input type="text" name="username" class="form-control" placeholder="Username" autofocus autocomplete="" required>
		 									<span class="input-group-btn">
		 										<label class="btn btn-primary"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> </label>
		 									</span>
		 							 	</div>
		 							</div>
		 						</div>

		 						<div class="row">
		 						<div class="form-group col-xs-12"> 
		 							<label for="username"><span class="text-danger" style="margin-right: 5px;">*</span>Password: </label>
		 								<div class="input-group">
		 									<input type="password" name="password" class="form-control" placeholder="Password" required>
		 									<span class="input-group-btn">
		 										<label class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> </label>
		 									</span>
		 							 	</div>
		 							</div>
		 						</div>

		 						<div class="row">
		 							<div class="form-group col-xs-4"> 
		 								<button class="btn btn-primary btn-block" type="submit">Login </button>
		 							</div>
		 						</div>
		 					</form> 
		 				</div>
		 			</div>
		 		</div>
				  <script type="text/javascript" src="<?php echo base_url();?>assets/lib/jquery-2.1.1.min.js"></script>
				  <script type="text/javascript" src="<?php echo base_url();?>assets/lib/bootstrap/js/bootstrap.js"></script>
		</body>
	 </html>