<?php include('public_header.php')?>

<div class="container">
		  <?php echo form_open('login/admin_login');?>
		  <fieldset>
		    <legend>Admin Login</legend>

		    <div class="row">
			    <div class="form-group col-md-6">
			      <label for="exampleInputEmail1">Name:</label>
			      <?php echo form_input(['type'=>'name','name'=>'username','class'=>'form-control', 'placeholder'=>'Enter Username','value'=>set_value('username')])?>
			    </div>
			    <div class="col-md-6">
			    	<br>
			      <?php echo form_error('username')?>
			    </div>
			</div>
			<div class="row">
			    <div class="form-group col-md-6">
			      <label for="exampleInputPassword1">Password</label>
			      <?php echo form_password(['name'=>'password','class'=>'form-control', 'placeholder'=>'Enter password'])?>
			    </div>

			    <div class="col-md-6">
			    	<br>
			      <?php echo form_error('password')?>
			    </div>
			</div>
			<?php echo form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn btn-default'])?>
			<?php echo form_submit(['name'=>'submit','value'=>'Login','class'=>'btn btn-primary'])?>
		  </fieldset>
		</form>
</div>

<?php include('public_footer.php')?>
