<?php 
$config=array('add_article_rules'=>array(	
				[
					'field' => 'title',
					'label' => 'Article Title',
					'rules' => 'required|alpha_numeric_spaces'
				],
				[
					'field' => 'body',
					'label' => 'Article Body',
					'rules' => 'required'
				]
			)
		);



 ?>