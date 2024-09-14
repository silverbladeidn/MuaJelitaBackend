@if($errors->any())
<div class="alert alert-danger">
  <ul>
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
  </ul>
</div>
@endif

<form action="{{ asset('admin/konsumsi/proses-edit') }}" method="post" accept-charset="utf-8">
  {{ csrf_field() }}  

    <input type="hidden" name="id_konsumsi" value="{{ $konsumsi->id_konsumsi }}">
<!-- start form input -->

        <div class="form-group row mb-3">
          <label class="col-md-3">Jenis Produk &amp; Status</label>
          <div class="col-md-6">
            <select name="id_jenis_produk" class="form-control select2" required>
              <option value="">Pilih Jenis Produk</option>
              <?php foreach($jenis_produk as $jenis_produk) { ?>
                <option value="<?php echo $jenis_produk->id_jenis_produk ?>" <?php if($jenis_produk->id_jenis_produk==$konsumsi->id_jenis_produk) { echo 'selected'; } ?>>
                  <?php echo $jenis_produk->nama_jenis_produk ?>
                </option>
              <?php } ?>
            </select>
          </div>

          <div class="col-md-3">
            <select name="status_konsumsi" class="form-control">
              <option value="Publish">Publish</option>
              <option value="Draft" <?php if($konsumsi->status_konsumsi=='Draft') { echo 'selected'; } ?>>Draft</option>
            </select>
          </div>

        </div>

        <div class="form-group row mb-3">
          <label class="col-md-3">Provinsi</label>
          <div class="col-md-9">
            <select name="kode_provinsi" class="form-control select2" id="kode_provinsi" required>
              <option value="">Pilih Provinsi</option>
              <?php foreach($provinsi as $provinsi) { ?>
                <option value="<?php echo $provinsi->kode ?>"  <?php if($provinsi->kode==substr($konsumsi->kode,0,2)) { echo 'selected'; } ?>>
                  <?php echo $provinsi->nama ?>
                </option>
              <?php } ?>
            </select>
          </div>
        </div>

        <div class="form-group row mb-3">
          <label class="col-md-3">Kota/Kabupaten</label>
          <div class="col-md-9">
            <select name="kode" class="form-control select2" id="kode" required>
              <option value="">Pilih Kota/Kabupaten</option>
              <option value="<?php echo $kota->kode ?>" selected><?php echo $kota->nama ?></option>
            </select>
          </div>
        </div>

         <div class="form-group row mb-3">
          <label class="col-md-3">Tahun dan Konsumsi</label>
          <div class="col-md-3">
            <input type="number" name="tahun" value="<?php if(isset($_POST['tahun'])) { echo $_POST['tahun']; }else{ echo $konsumsi->tahun; } ?>" class="form-control" placeholder="Tahun" required>
            <small class="text-secondary">Periode tahun</small>
          </div>
          <div class="col-md-6">
            <input type="text" name="jumlah" value="<?php if(isset($_POST['jumlah'])) { echo $_POST['jumlah']; }else{ echo $konsumsi->jumlah; } ?>" class="form-control" placeholder="Jumlah konsumsi" required>
            <small class="text-secondary">Jumlah konsumsi perkapita</small>
          </div>
        </div>

        <div class="form-group row mb-3">
          <label class="col-md-3">Keterangan</label>
          <div class="col-md-9">
            <textarea name="keterangan" class="form-control" placeholder="Keterangan"><?php echo $konsumsi->keterangan ?></textarea>
          </div>
        </div>

          <div class="form-group row mb-2">
    <label class="col-3"></label>
    <div class="col-9">
      <a href="{{ asset('admin/konsumsi') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> 
      </a>
      <button type="submit" class="btn btn-success" name="submit" value="submit">
        <i class="bi bi-save"></i> Simpan Data Jenis Produk
      </button>
    </div>
  </div>

        <!-- end form -->
</form>
<script type="text/javascript">
  $(document).ready(function(){
    $("#kode_provinsi").change(function(){
      var kode_provinsi = $("#kode_provinsi").val();
      $.ajax({
        type: 'GET',
        url: "<?php echo asset('admin/konsumsi/get-kabupaten') ?>",
        data: {kode_provinsi: kode_provinsi},
        cache: false,
        success: function(msg){
          $("#kode").html(msg);
        }
      });
    });
  });
</script>