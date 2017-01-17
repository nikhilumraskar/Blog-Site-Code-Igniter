<?php  include('admin_header.php'); ?>

<div class="container">
	<div class="row">
		<div class="col-lg-6 col-lg-offset-6">
			<a href="<?= base_url('admin/add_article')?>" class="btn btn-lg btn-primary pull-right">Add Article</a>
		</div>
	</div>
	<?php if($feedback = $this->session->flashdata('feedback')): 
			$feedback_class = $this->session->flashdata('feedback_class');
	?>
         <div class="row">
            <div class="col-lg-6">
                <div class="alert alert-dismissible <?= $feedback_class ?>">
                    <?= $feedback; ?>
                </div>
            </div>
        </div>
    <?php endif;?>
    <div class="col-lg-8">
	<table class="table">
		<thead>
			<tr>
				<td>Sr no.</td>
				<td>Title</td>
				<td>action</td>
			</tr>
		</thead>
		<tbody>
		<?php $i = 0;  if(count($articles)): ?>
			<?php foreach ($articles as $article): ?>
			<tr>
				<td><?= ++$i ?></td>
				<td><?=$article->title ?></td>
				<td>
					<?= anchor("admin/edit_article/$article->id", 'Edit', ['class'=>'btn btn-default pull-left']) ?>
					<!-- button class="btn btn-default">Edit</button -->
					<?= 
						form_open('admin/delete_article'),
						form_hidden('article_id', $article->id),
						form_submit(['name'=>'delete', 'value'=>'Delete', 'class'=>'btn btn-danger pull-left']),
						form_close();
					?>
					<!--button class="btn btn-danger">Delete</button-->
				</td>
			</tr>
			<?php  endforeach; ?> 
		<?php else:?>
			<tr>
				<td colspan="3">
					No Records
				</td>
			</tr>
		<?php endif;?>
		</tbody>
	</table>
	</div>
	
</div>

<?php  include('admin_footer.php'); ?>