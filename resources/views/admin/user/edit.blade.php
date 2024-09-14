@if($errors->any())
<div class="alert alert-danger">
  <ul>
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
  </ul>
</div>
@endif

<form action="{{ asset('admin/user/proses-edit') }}" method="post" accept-charset="utf-8">
  {{ csrf_field() }}	

  	<input type="hidden" name="id_user" value="{{ $user->id_user }}">

  	<div class="form-group row mb-2">
		<label class="col-3">Nama Pengguna</label>
		<div class="col-9">
			<input type="text" name="nama" class="form-control" placeholder="Nama user" value="<?php echo $user->nama ?>" required>
		</div>
	</div>

	<div class="form-group row mb-2">
		<label class="col-3">Email</label>
		<div class="col-9">
			<input type="email" name="email" class="form-control" placeholder="Email user" value="<?php echo $user->email ?>" required>
		</div>
	</div>

	<div class="form-group row mb-2">
		<label class="col-3">Username dan Password</label>
		<div class="col-4">
			<input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $user->username ?>" required>
		</div>
		<div class="col-5">
			<input type="text" name="password" class="form-control" placeholder="Password" value="<?php echo $user->password ?>" required>
		</div>
	</div>

	<div class="form-group row mb-2">
		<label class="col-3">Level dan Status</label>
		<div class="col-4">
			<select name="akses_level" class="form-control">
				<option value="Admin">Admin</option>
				<option value="User" <?php if($user->akses_level=='User') { echo 'selected'; } ?>>User</option>
			</select>
		</div>
		<div class="col-5">
			<select name="status_user" class="form-control">
				<option value="Aktif">Aktif</option>
				<option value="Non Aktif" <?php if($user->status_user=='Non Aktif') { echo 'selected'; } ?>>Non Aktif</option>
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

