
<div class="row">
	<div class="col-md-8">

		<form action="{{ asset('admin/konsumsi')}}" method="get" accept-charset="utf-8">
			{{ csrf_field() }} 
			<div class="input-group"> 
				<input type="text" name="keywords" class="form-control" placeholder="Kata kunci..." aria-label="Kata kunci..." aria-describedby="basic-addon2" value="<?php if(isset($_GET['keywords'])) { echo $_GET['keywords']; } ?>"> 
				<span class="input-group-button" id="basic-addon2">
					<button type="submit" class="btn btn-dark">
						<i class="bi bi-search"></i> Cari
					</button>
					<a href="{{ asset('admin/konsumsi/all') }}" class="btn btn-info">
						<i class="fa fa-tasks"></i> Data Konsumsi (Single Page Application)
					</a>
					<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
					  <i class="bi bi-plus-circle"></i> Tambah Data Konsumsi
					</button>
				</span> 
			</div>
		</form>

		@include('admin/konsumsi/tambah')
	</div>
	<div class="col-md-4">
		<?php echo $konsumsi_pagination->links() ?>
	</div>
</div>


<table class="table table-sm table-bordered mt-5">
	<thead>
		<tr>
			<th>No</th>
			<th>Kota</th>
			<th>Tahun</th>
			<th>Konsumsi Perkapita</th>
			<th>Status</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($konsumsi as $konsumsi) { ?>
		<tr>
			<td><?php echo $no ?></td>
			<td><?php echo $konsumsi->nama_kota ?> - <?php echo $konsumsi->ibukota ?></td>
			<td><?php echo $konsumsi->tahun ?></td>
			<td><?php echo number_format($konsumsi->jumlah) ?></td>
			<td><?php echo $konsumsi->status_konsumsi ?></td>
			<td>
				<button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#Edit<?php echo $konsumsi->id_konsumsi ?>">
					  <i class="bi bi-pencil"></i>
				</button>
				<a href="{{ asset('admin/konsumsi/delete/'.$konsumsi->id_konsumsi) }}" class="btn btn-secondary btn-sm delete-link" >
					<i class="bi bi-trash"></i>
				</a>
				@include('admin/konsumsi/form-edit')
			</td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>
