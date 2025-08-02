<form action="{{ asset('admin/portofolio/proses-tambah') }}"
	method="post" enctype="multipart/form-data" accept-charset="utf-8">
	{{ csrf_field() }}

	<div class="form-group row mb-2">
		<label class="col-3">Nama Portofolio</label>
		<div class="col-9">
			<input type="text" name="nama_portofolio" class="form-control"
				placeholder="Nama portofolio" value="{{ old('nama_portofolio') }}" required>
		</div>
	</div>

	<div class="form-group row mb-2">
		<label class="col-3">Gambar</label>
		<div class="col-9">
			<input type="file" name="gambar_porto" class="form-control"
				accept=".jpg,.jpeg,.png" required>
		</div>
	</div>

	<div class="form-group row mb-2">
		<label class="col-3">Deskripsi</label>
		<div class="col-9">
			<textarea name="deskripsi" class="form-control" rows="4" placeholder="Deskripsi portofolio" required>{{ old('deskripsi') }}</textarea>
		</div>
	</div>

	<div class="form-group row mb-2">
		<label class="col-3"></label>
		<div class="col-9">
			<a href="{{ asset('/') }}" class="btn btn-outline-secondary">
				<i class="bi bi-arrow-left"></i>
			</a>
			<button type="submit" class="btn btn-success" name="submit" value="submit">
				<i class="bi bi-save"></i> Simpan Data
			</button>
		</div>
	</div>
</form>