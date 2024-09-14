<p>
	<a href="{{ asset('admin/jenis-produk/tambah') }}" class="btn btn-success">
		<i class="bi bi-plus-circle"></i> Tambah Jenis Produk
	</a>
</p>

<table class="table table-sm table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Slug</th>
			<th>Keterangan</th>
			<th>Status</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($jenis_produk as $jenis_produk) { ?>
		<tr>
			<td><?php echo $no ?></td>
			<td><?php echo $jenis_produk->nama_jenis_produk ?></td>
			<td><?php echo $jenis_produk->slug_jenis_produk ?></td>
			<td><?php echo $jenis_produk->keterangan ?></td>
			<td><?php echo $jenis_produk->status_jenis_produk ?></td>
			<td>
				<a href="{{ asset('admin/jenis-produk/edit/'.$jenis_produk->id_jenis_produk) }}" class="btn btn-secondary btn-sm">
					<i class="bi bi-pencil"></i>
				</a>
				<a href="{{ asset('admin/jenis-produk/delete/'.$jenis_produk->id_jenis_produk) }}" class="btn btn-secondary btn-sm delete-link" >
					<i class="bi bi-trash"></i>
				</a>
			</td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>

