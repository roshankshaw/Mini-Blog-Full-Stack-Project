<?php include('admin_header.php') ?>

<div class="container">
		  <?php echo form_open('admin/update_article/'."{$article->id}");?>
		  <fieldset>
		  	<legend>Edit Article</legend>
		    <div class="row" style="padding-left: 2.5%;">
			    <div class="form-group col-md-6">
			      <label for="exampleInputEmail1">Article Title:</label>
			      <?php echo form_input(['name'=>'title','class'=>'form-control', 'placeholder'=>'Article title','value'=>set_value('title',$article->title)])?>
			    </div>
			    <div class="col-md-6">
			    	<br>
			      <small style=" padding-top: 50%; color:red;"><?php echo form_error('title'); ?></small>
			    </div>
			</div>
			<div class="row" style="padding-left: 2.5%;">
			    <div class="form-group col-md-6">
			      <label for="exampleInputPassword1">Article Body:</label>
			      <?php echo form_textarea(['name'=>'body','class'=>'form-control', 'placeholder'=>'Article body','value'=>set_value('body',$article->body)])?>
			    </div>

			    <div class="col-md-6">
			    	<br>
			      <small style=" padding-top: 50%; color:red;"><?php echo form_error('body'); ?></small>
			    </div>
			</div>
			<div class="form-group col-md-6 offset-md-4" style="padding-left: 2.5%;">
				<?php echo form_reset(['name'=>'reset','value'=>'reset','class'=>'btn btn-default'])?>
				<?php echo form_submit(['name'=>'submit','value'=>'Submit','class'=>'btn btn-primary'])?>
		  	</div>
		  </fieldset>
		</form>
</div>

<?php include('admin_footer.php')?>
