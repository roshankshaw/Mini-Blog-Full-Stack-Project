<?php include('admin_header.php'); ?>

<div class="container">
	<br><br>
	<div class="row">		    
		<div class="col-md-12">
			<?= anchor('admin/store_article','Add Article',['class'=>'btn btn-primary btn-lg float-right'])?>
			<!-- <a class="btn btn-success btn-lg float-right" href=" base_url function" >Add Article</a> -->
		</div>
	</div>
	<br>

	    <?php if($feedback = $this->session->flashdata('feedback')):
	    		$feedback_class=$this->session->flashdata('feedback_class');
	     ?>
		    <div class="row">
		    	<div class="col-md-8 offset-md-2">
		    		<div class="alert alert-dismissible <?=$feedback_class?>">
					  <center><strong><?= $feedback ?></strong></center>
					</div>
		    	</div>
		    </div>
		<?php endif;?>
	<br>
	<table class="table">
		<thead>
			<th>Sr. No.</th>
			<th>Title</th>
			<th>Action</th>
		</thead>
		<tbody>
			<?php if (count ($articles)):
				$count=$this->uri->segment(3,0);//second parameter = default offset value when there is no segment.
				foreach($articles as $article): ?>
				<tr>
					<td><?=++$count?></td>
					<td><?=$article->title ?></td>
					<td>
						<div class="row">
							<div class="col-md-2">
								<?= anchor("admin/edit_article/{$article->id}",'Edit',['class'=>'btn btn-primary'])?>
							</div>
							<div class="col-md-2">
								<?=
									form_open('admin/delete_article'),
									form_hidden('article_id',$article->id),
									form_submit(['name'=>'submit','value'=>'Delete','class'=>'btn btn-danger']),
									form_close();
								?>
							</div>
						</div>
					</td>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="3">No Records found.</td>
				</tr>
			<?php endif; ?>
		</tbody>
	</table>
	<?= $this->pagination->create_links();?>
</div>
<?php include('admin_footer.php'); ?>