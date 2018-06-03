<?php 	include('public_header.php') ?>

<div class="container">	
		<h1>All Articles</h1>
		<table class="table">
			<thead>
				<tr>
					<th>Sr. no.</th>
					<th>Article Title</th>
					<th>Published on</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<?php if(count($articles)): ?>
					<?= $count =$this->uri->segment(3);?>
					<?php foreach($articles as $article): ?>
					<td><?= ++$count ?></td>
					<td><?=anchor("user/article/{$article->id}",$article->title) ?></td>
					<td><?= date('d M Y H:i:s',strtotime($article->created_at))?></td>
				</tr>
				<?php endforeach; ?>
				<?php else: ?>
				<tr>
					<td colspan="3">No records found.</td>
				</tr>	
				<?php endif;?>
			</tbody>
		</table>
	<?= $this->pagination->create_links();?>
</div>

<?php 	include('public_footer.php') ?>
