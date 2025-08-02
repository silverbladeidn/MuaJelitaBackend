@if($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif

<form action="{{ asset('admin/portofolio/proses-edit') }}" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}

	<input type="hidden" name="id" value="{{ $por->id }}">

	{{-- Nama Portofolio --}}
	<div class="form-group row mb-2">
		<label class="col-3">Nama Portofolio</label>
		<div class="col-9">
			<input type="text" name="nama_portofolio" class="form-control"
				value="{{ old('nama_portofolio', $por->nama_portofolio) }}" required>
		</div>
	</div>

	{{-- Gambar --}}
	<div class="form-group row mb-2">
		<label class="col-3">Gambar</label>
		<div class="col-9">
			@if($por->gambar_porto)
			<p>
				<img src="{{ url('public/uploads/portofolio/'.$por->gambar_porto) }}"
					alt="{{ $por->nama_portofolio }}" width="120" class="mb-2">
			</p>
			@endif
			<input type="file" name="gambar_porto" class="form-control">
			<small class="text-muted">Biarkan kosong jika tidak ingin mengganti gambar</small>
		</div>
	</div>

	{{-- Deskripsi --}}
	<div class="form-group row mb-2">
		<label class="col-3">Deskripsi</label>
		<div class="col-9">
			<textarea name="deskripsi" class="form-control" required>{{ old('deskripsi', $por->deskripsi) }}</textarea>
		</div>
	</div>

	{{-- Tombol --}}
	<div class="form-group row mb-2">
		<label class="col-3"></label>
		<div class="col-9">
			<a href="{{ asset('/') }}" class="btn btn-outline-secondary">
				<i class="bi bi-arrow-left"></i> Kembali
			</a>
			<button type="submit" class="btn btn-success">
				<i class="bi bi-save"></i> Simpan Data
			</button>
		</div>
	</div>
</form>