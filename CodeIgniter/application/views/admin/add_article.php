<?php include('admin_header.php') ?>

<div class="container">
		  <?php echo form_open('admin/store_article');?>
		  <?php echo form_hidden('user_id',$this->session->userdata('user_id'));?>
		  <?php echo form_hidden('created_at',date('Y-m-d H:i:s'));?>
		  <fieldset>
		  	<legend>Add Article</legend>
		    <div class="row" style="padding-left: 2.5%;">
			    <div class="form-group col-md-6">
			      <label for="exampleInputEmail1">Article Title:</label>
			      <?php echo form_input(['name'=>'title','class'=>'form-control', 'placeholder'=>'Article title','value'=>set_value('title')])?>
			    </div>
			    <div class="col-md-6">
			    	<br>
			      <small style=" padding-top: 50%; color:red;"><?php echo form_error('title'); ?></small>
			    </div>
			</div>
			<div class="row" style="padding-left: 2.5%;">
			    <div class="form-group col-md-6">
			      <label for="exampleInputPassword1">Article Body:</label>
			      <?php echo form_textarea(['name'=>'body','class'=>'form-control', 'placeholder'=>'Article body','value'=>set_value('body')])?>
			    </div>

			    <div class="col-md-6">
			    	<br>
			      <small style=" padding-top: 50%; color:red;"><?php echo form_error('body'); ?></small>
			    </div>
			</div>
			<div class="form-group col-md-6 offset-md-4" style="padding-left: 2.5%;">
				<?php echo form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn btn-default'])?>
				<?php echo form_submit(['name'=>'submit','value'=>'Submit','class'=>'btn btn-primary'])?>
		  	</div>
		  </fieldset>
		</form>
</div>

<?php include('admin_footer.php')?>
