<p>
	<a href="{{ asset('admin/user/tambah') }}" class="btn btn-success">
		<i class="bi bi-plus-circle"></i> Tambah Pengguna
	</a>
</p>

<table class="table table-sm table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Username</th>
			<th>Level</th>
			<th>Status</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($user as $user) { ?>
		<tr>
			<td><?php echo $no ?></td>
			<td><?php echo $user->nama ?></td>
			<td><?php echo $user->email ?></td>
			<td><?php echo $user->username ?></td>
			<td><?php echo $user->akses_level ?></td>
			<td><?php echo $user->status_user ?></td>
			<td>
				<a href="{{ asset('admin/user/edit/'.$user->id_user) }}" class="btn btn-secondary btn-sm">
					<i class="bi bi-pencil"></i>
				</a>
				<a href="{{ asset('admin/user/delete/'.$user->id_user) }}" class="btn btn-secondary btn-sm delete-link" >
					<i class="bi bi-trash"></i>
				</a>
			</td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>

