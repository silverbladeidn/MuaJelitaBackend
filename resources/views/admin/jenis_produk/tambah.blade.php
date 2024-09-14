@if($errors->any())
<div class="alert alert-danger">
  <ul>
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
  </ul>
</div>
@endif

<form action="{{ asset('admin/jenis-produk/proses-tambah') }}" method="post" accept-charset="utf-8">
  {{ csrf_field() }}	

  	<div class="form-group row mb-2">
		<label class="col-3">Nama Jenis Produk</label>
		<div class="col-9">
			<input type="text" name="nama_jenis_produk" class="form-control" placeholder="Nama Jenis Produk" value="<?php echo old('nama_jenis_produk') ?>" required>
		</div>
	</div>

	<div class="form-group row mb-2">
		<label class="col-3">Keterangan</label>
		<div class="col-9">
			<textarea name="keterangan" placeholder="Keterangan" class="form-control"><?php echo old('keterangan') ?></textarea>
		</div>
	</div>


	<div class="form-group row mb-2">
		<label class="col-3">Status</label>
		<div class="col-5">
			<select name="status_jenis_produk" class="form-control">
				<option value="Aktif">Aktif</option>
				<option value="Non Aktif">Non Aktif</option>
			</select>
		</div>
	</div>

	<div class="form-group row mb-2">
		<label class="col-3"></label>
		<div class="col-9">
			<a href="{{ asset('admin/jenis_produk') }}" class="btn btn-outline-secondary">
				<i class="bi bi-arrow-left"></i> 
			</a>
			<button type="submit" class="btn btn-success" name="submit" value="submit">
				<i class="bi bi-save"></i> Simpan Data Jenis Produk
			</button>
		</div>
	</div>

</form>

