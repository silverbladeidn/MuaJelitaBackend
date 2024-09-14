@if($errors->any())
<div class="alert alert-danger">
  <ul>
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
  </ul>
</div>
@endif

<form action="{{ asset('admin/user/proses-tambah') }}" method="post" accept-charset="utf-8">
  {{ csrf_field() }}	

  	<div class="form-group row mb-2">
		<label class="col-3">Nama Pengguna</label>
		<div class="col-9">
			<input type="text" name="nama" class="form-control" placeholder="Nama user" value="<?php echo old('nama') ?>" required>
		</div>
	</div>

	<div class="form-group row mb-2">
		<label class="col-3">Email</label>
		<div class="col-9">
			<input type="email" name="email" class="form-control" placeholder="Email user" value="<?php echo old('email') ?>" required>
		</div>
	</div>

	<div class="form-group row mb-2">
		<label class="col-3">Username dan Password</label>
		<div class="col-4">
			<input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo old('username') ?>" required>
		</div>
		<div class="col-5">
			<input type="text" name="password" class="form-control" placeholder="Password" value="<?php echo old('password') ?>" required>
		</div>
	</div>

	<div class="form-group row mb-2">
		<label class="col-3">Level dan Status</label>
		<div class="col-4">
			<select name="akses_level" class="form-control">
				<option value="Admin">Admin</option>
				<option value="User">User</option>
			</select>
		</div>
		<div class="col-5">
			<select name="status_user" class="form-control">
				<option value="Aktif">Aktif</option>
				<option value="Non Aktif">Non Aktif</option>
			</select>
		</div>
	</div>

	<div class="form-group row mb-2">
		<label class="col-3"></label>
		<div class="col-9">
			<a href="{{ asset('admin/user') }}" class="btn btn-outline-secondary">
				<i class="bi bi-arrow-left"></i> 
			</a>
			<button type="submit" class="btn btn-success" name="submit" value="submit">
				<i class="bi bi-save"></i> Simpan Data Pengguna Aplikasi
			</button>
		</div>
	</div>

</form>

