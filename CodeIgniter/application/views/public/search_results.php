<?php 	include('public_header.php') ?>

<div class="container">	
		<h1>Search Results</h1>
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
					<?= $count =$this->uri->segment(4);?>
					<?php foreach($articles as $article): ?>
					<td><?= ++$count ?></td>
					<td><?=$article->title ?></td>
					<td></td>
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
