<!-- DataTales Example -->
<div class="container mt-3">
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex justify-content-between">
		  	<h6 class="m-0 font-weight-bold text-primary"><?= $title_page; ?></h6>
		  	<a href="#" class="btn-sm btn-primary" data-toggle="modal" data-target="#formModal" data-url="<?= base_url(); ?>" id="addNewMenu">Add New Menu</a>
		</div>
		<div class="card-body">
			<div class="table-responsive">
			    <table class="table table-bordered table-striped table-hover" id="example" width="100%" cellspacing="0">
			      <thead>
			        <tr>
						<th style="max-width: 5%;">No</th>
						<th style="width: 70%; min-width: 250px;">Menu</th>
						<th style="width: 25%; min-width: 200px;">Action</th>
			        </tr>
			      </thead>
			      <tbody>
			      	<?php 
			      	$number = 0;
			      	foreach($menu as $m): ?>
			      	<tr>
			      		<td><?= ++$number; ?></td>
			      		<td><?= $m['menu']; ?></td>
			      		<td>
			      			<a href="#" class="btn-sm btn-warning p-2 tampilModalUbah" data-id="<?= $m['id']; ?>" data-url="<?= base_url(); ?>" data-toggle="modal" data-target="#formModal">Edit</a>		
							<a href="#" class="btn-sm btn-danger p-2 tampilModalAlert" data-id="<?= $m['id']; ?>" data-url="<?= base_url(); ?>" data-toggle="modal" data-target="#alertModal">Delete</a>		
			      		</td>
			      	</tr>
				    <?php endforeach; ?>
			      </tbody>
			    </table>
			</div>
		</div>
	</div>
</div>

<!-- form Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="formModalLabel"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="formModalAction" action="" method="post">
					<input type="text" name="id" id="id" class="form-control" value="" hidden="hidden">
					<div class="form-group">
						<input type="number" name="id" hidden="hidden" >
						<input type="text" name="name" class="form-control" required="" id="formModalInput" placeholder="Menu Name">
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal" required="">Close</button>
				<button hidden="hidden" type="submit" class="btn btn-primary" id="formModalBtn"></button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="alertModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="alertModalLabel"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			<p id="paragrafBodyModal"></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<a href="" id="anchorAlertModal"></a>
			</div>
		</div>
	</div>
</div>


<script>
	$(document).ready(function(){
		$('#formModalInput').on('keyup',function(){
			if ($(this).val().length == 0) {
				$('.modal-footer button[type=submit]').attr('hidden', 'hidden');
			}else{
				$('.modal-footer button[type=submit]').removeAttr('hidden', 'hidden');
			}
		});
	
		// menampilkan alert konfirmasi hapus data
		$('.tampilModalAlert').on('click', function(){
			const id = $(this).data('id');
			const url = $(this).data('url');
			$('#anchorAlertModal').attr('href', url + '/menu/delete/' + id);
			$('#alertModalLabel').html('Delete Menu');
			$('#anchorAlertModal').attr('class', 'btn btn-danger');
			$('#anchorAlertModal').html('Delete');
			$('#paragrafBodyModal').html('Are You Sure..?');
		});

		// modal tambah data
		$('#addNewMenu').on('click', function(){
			const url = $(this).data('url') + 'menu';
			$('input[name=name]').val('');
			$('#formModalLabel').html('Add New Menu');
			$('#formModalBtn').html('Add');
			$('#formModalInput').removeAttr('value');
		});

		// modal edit data
		$('.tampilModalUbah').on('click', function(){
			$('.modal-footer button[type=submit]').attr('hidden', 'hidden');
			$('input[name=name]').val('');
			$('#formModalLabel').html('Edit Menu');
			$('#formModalBtn').html('Edit');
			const id = $(this).data('id');
			const url = $(this).data('url');
			$('#formModalAction').attr('action', url + 'menu/edit');
			$.ajax({
				url: url + 'menu/detail',
				data: {id: id},
				method: 'post',
				dataType: 'json',
				success: function(data){
					console.log(data['menu']);
					$('input[name=name]').val(data['menu']);
					$('input[name=id]').attr('value', data['id']);
				}
			});
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function () {
    $('#example').DataTable();
});
</script>