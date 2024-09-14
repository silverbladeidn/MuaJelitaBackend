<div class="row">
	<div class="col-md-8">

		<form action="{{ asset('admin/konsumsi/all')}}" method="get" accept-charset="utf-8">
			{{ csrf_field() }} 
			<div class="input-group"> 
				<input type="text" name="keywords" class="form-control" placeholder="Kata kunci..." aria-label="Kata kunci..." aria-describedby="basic-addon2" value="<?php if(isset($_GET['keywords'])) { echo $_GET['keywords']; } ?>"> 
				<span class="input-group-button" id="basic-addon2">
					<button type="submit" class="btn btn-dark">
						<i class="bi bi-search"></i> Cari
					</button>
					<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
					  <i class="bi bi-plus-circle"></i> Tambah Data Konsumsi
					</button>
                    <?php if(isset($_GET['keywords'])) { ?> 
                        <a href="<?php echo asset('admin/konsumsi/all') ?>" class="btn btn-outline-info">
                            <i class="bi bi-arrow-left"></i> Back
                        </a>
                    <?php } ?>
                    </span> 
			</div>
		</form>

		@include('admin/konsumsi/add')
	</div>
	<div class="col-md-4">
	</div>
</div>

<br/>

<table class="table table-sm table-bordered" id="KonsumsiListing">
    <thead>
        <tr class="text-center bg-light">
            <th>No</th>
            <th>Kota</th>
            <th>Tahun</th>
            <th>Konsumsi Perkapita</th>
            <th>Status</th>
            <th></th>
        </tr>
    </thead>
    <tbody id="listRecords">
    </tbody>
</table>

@include('admin/konsumsi/app')
@include('admin/konsumsi/modal-update')