<br/>
<br/>
<center><h4>FELMERALD BESARIO QUERIES DOCUMENTATION</h4></center>
<div class="col-sm-6">

	<div class="panel panel-default">
		<div class="panel-body">
			<p><strong>SELECT <em class="text-danger">$column_name</em> FROM <em class="text-danger">$table_name</em></strong></p>
				<ul>
				<?php if($get_all): foreach($get_all as $row): ?>
					<li><?php echo ucwords($row->sl_id.' '.$row->description) ?> 
						<a href="<?php echo base_url();?>my_controller/delete_record?id=<?php echo $row->sl_id; ?>">DELETE</a>
					</li>
				<?php endforeach; else: echo 'No Records found'; endif;   ?>

				</ul>

				<br/>
				<br/>

				<?php if($get_paginate): foreach($get_paginate as $row):  echo '<ul><li>'.$row->first_name.'</li></ul>'; endforeach; endif; ?>
				<?php echo $pagination_links; ?>
		</div>
	</div>

	<br/>

	<div class="panel panel-default">
		<div class="panel-body">

			<p><strong>SELECT <em class="text-danger">$column_name</em> 
					   FROM <em class="text-danger">$table_name</em>
					   LEFT JOIN <em class="text-danger"> $join </em>
					   WHERE <em class="text-danger">$where</em>
					   LIKE <em class="text-danger">$like</em>
					   ORDER_BY <em class="text-danger">$order_by</em>
					   LIMIT <em class="text-danger">$limit</em></strong></p>

					   <ul>
					   <?php if($get_join): foreach($get_join as $row): ?>
					   	<li><?php echo ucwords($row->first_name.' '.$row->attributes); ?></li>
					   <?php endforeach; else: echo 'No Records Found'; endif; ?>
					   </ul>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-body">
		<p><strong>SEARCH: SELECT <em class="text-danger">$column</em>
				   FROM <em class="text-danger">$table_name</em>
				   LIke <em class="text-danger">%LIKE%</em></strong></p>
				   <br/>
				<?php echo form_open(base_url('my_controller/index')); ?>
				<input type="text" name="search" class="form-control" placeholder="search..." required>
				<br/>
				<input type="submit" value="search" class="btn btn-default">
				<?php echo form_close();?>
				<hr/>
				<p><strong>SEARCH RESULT:</strong></p>
				<ul>
					<?php if($get_search): foreach($get_search as $row): ?>
					<li><?php echo $row->first_name; ?></li>
					<?php endforeach; else: echo 'no search result found'; endif;?>
				</ul>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-body">
		<p><strong>COUNT ALL RESULT 
				<em class="text-danger">$column_name </em>
				WHERE 
				<em class="text-danger"> $where</em> 
				FROM <em class="text-danger">$table_name</em> </strong></p>

				<ul>
					<li><?php echo $get_count_all; ?></li>
				</ul>
		</div>
	</div>


</div>

<div class="col-sm-6">

	<div class="panel panel-default">
		<div class="panel-body">

			<?php echo $this->session->flashdata('success'); ?>
			
			<p><strong>INSERT INTO <em class="text-danger">$table_name</em> 
			VALUES <em class="text-danger">$value</em></strong></p>
			<?php echo form_open(base_url('my_controller/add')); ?>
			<input type="text" name="first_name" class="form-control" required="">
			<br/>
			<input type="submit" value="Add" class="btn btn-default">
			<?php echo form_close(); ?>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-body">
		<p>
		<strong>
		INSERT INTO 
		<em class="text-danger">$table_name</em>
		VALUES <em class="text-danger">$value</em>
		WITH <em class="text-danger">$do_upload image</em>
		</strong>
		</p>
		<?php echo $this->session->flashdata("info"); ?>
		<br/>
		<?php echo form_open_multipart(base_url('my_controller/add_upload')); ?>
		<input type="file" name="userfile" required="">
		<br/>
		<input type="text" name="first_name" class="form-control" required="">
		<br/>
		<input type="submit" value="Add" class="btn btn-default">
		<?php echo form_close();?>
		</div>
	</div>


</div>