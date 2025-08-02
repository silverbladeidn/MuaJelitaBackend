<p>
	<a href="{{ asset('admin/user/tambah') }}" class="btn btn-success">
		<i class="bi bi-plus-circle"></i> Tambah Portofolio
	</a>
</p>

<table class="table table-sm table-bordered text-center align-middle">
	<thead class="table-light">
		<tr>
			<th>No</th>
			<th>Nama Portofolio</th>
			<th>Gambar</th>
			<th>Deskripsi</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		@forelse ($porto as $no => $por)
		<tr>
			<td>{{ $no + 1 }}</td>
			<td>{{ $por->nama_portofolio }}</td>
			<td>
				@if($por->gambar_porto)
				<img src="{{ url('public/uploads/portofolio/'.$por->gambar_porto) }}"
					alt="{{ $por->nama_portofolio }}" width="380" class="img-thumbnail">
				@else
				<span class="text-muted">Tidak ada gambar</span>
				@endif
			</td>
			<td>{{ $por->deskripsi }}</td>
			<td>
				<a href="{{ asset('admin/user/edit/'.$por->id) }}" class="btn btn-secondary btn-sm">
					<i class="bi bi-pencil"></i>
				</a>
				<a href="{{ asset('admin/user/delete/'.$por->id) }}"
					class="btn btn-danger btn-sm delete-link"
					onclick="return confirm('Yakin ingin menghapus data ini?')">
					<i class="bi bi-trash"></i>
				</a>
			</td>
		</tr>
		@empty
		<tr>
			<td colspan="5" class="text-center">Belum ada data portofolio</td>
		</tr>
		@endforelse
	</tbody>
</table>