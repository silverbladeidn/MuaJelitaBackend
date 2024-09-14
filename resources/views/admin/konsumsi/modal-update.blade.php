<!-- Button trigger modal -->


@if($errors->any())
<div class="alert alert-danger">
  <ul>
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
  </ul>
</div>
@endif

<form id="UpdateForm" method="post">

<!-- Modal -->
<div class="modal fade" id="UpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Data Konsumsi</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- start form input -->
        <input type="hidden" name="id_konsumsi" id="id_konsumsi" value="">
        
        <div class="form-group row mb-3">
          <label class="col-md-3">Jenis Produk &amp; Status</label>
          <div class="col-md-6">
            <select name="id_jenis_produk" class="form-control select2" id="id_jenis_produk" required>
              <option value="">Pilih Jenis Produk</option>
              <?php foreach($jenis_produk2 as $jenis_produk) { ?>
                <option value="<?php echo $jenis_produk->id_jenis_produk ?>">
                  <?php echo $jenis_produk->nama_jenis_produk ?>
                </option>
              <?php } ?>
            </select>
          </div>

          <div class="col-md-3">
            <select name="status_konsumsi" class="form-control" id="status_konsumsi>
              <option value="Publish">Publish</option>
              <option value="Draft">Draft</option>
            </select>
          </div>

        </div>

        <div class="form-group row mb-3">
          <label class="col-md-3">Provinsi</label>
          <div class="col-md-9">
            <select name="kode_provinsi" class="form-control select2" id="kode_provinsi2" required>
              <option value="">Pilih Provinsi</option>
              <?php foreach($provinsi2 as $provinsi) { ?>
                <option value="<?php echo $provinsi->kode ?>">
                  <?php echo $provinsi->nama ?>
                </option>
              <?php } ?>
            </select>
          </div>
        </div>

        <div class="form-group row mb-3">
          <label class="col-md-3">Kota/Kabupaten</label>
          <div class="col-md-9">
            <select name="kode" class="form-control select2" id="kode2" required>
              <option value="">Pilih Kota/Kabupaten</option>
              
            </select>
          </div>
        </div>

         <div class="form-group row mb-3">
          <label class="col-md-3">Tahun dan Konsumsi</label>
          <div class="col-md-3">
            <input type="number" name="tahun" value="<?php if(isset($_POST['tahun'])) { echo $_POST['tahun']; }else{ echo date('Y'); } ?>" class="form-control" placeholder="Tahun" id="tahun" required>
            <small class="text-secondary">Periode tahun</small>
          </div>
          <div class="col-md-6">
            <input type="text" name="jumlah" value="<?php if(isset($_POST['jumlah'])) { echo $_POST['jumlah']; }else{ echo old('jumlah'); } ?>" class="form-control" placeholder="Jumlah konsumsi" id="jumlah" required>
            <small class="text-secondary">Jumlah konsumsi perkapita</small>
          </div>
        </div>

        <div class="form-group row mb-3">
          <label class="col-md-3">Keterangan</label>
          <div class="col-md-9">
            <textarea name="keterangan" class="form-control" id="keterangan" placeholder="Keterangan"><?php echo old('keterangan') ?></textarea>
          </div>
        </div>

        <!-- end form input -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          <i class="bi bi-x-circle"></i> Close 
        </button>
        <button type="submit" class="btn btn-primary">
          <i class="bi bi-save"></i> Simpan
        </button>
      </div>
    </div>
  </div>
</div>
<!-- end form -->
</form>
<script type="text/javascript">
  $(document).ready(function(){
    $("#kode_provinsi2").change(function(){
      var kode_provinsi = $("#kode_provinsi2").val();
      $.ajax({
        type: 'GET',
        url: "<?php echo asset('admin/konsumsi/get-kabupaten') ?>",
        data: {kode_provinsi: kode_provinsi},
        cache: false,
        success: function(msg){
          $("#kode2").html(msg);
        }
      });
    });
  });
</script>
