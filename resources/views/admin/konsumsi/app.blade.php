<?php 
if(isset($_GET['keywords'])){
    $url = asset('admin/konsumsi/data?keywords='.$_GET['keywords']);
} else{
    $url = asset('admin/konsumsi/data');
}
?>
<script>
	$(document).ready(function(){
	listBahan();		
	var table = $('#KonsumsiListing').dataTable({
      "paging": false,
      "searching": true,
      "order": [[ 0, "desc" ]]
      // "ordering": true
    }); 
	// list all bahan in datatable
	function listBahan(){
		$.ajax({
			type  : 'ajax',
			url   : '<?php echo $url; ?>',
			async : false,
			type:"get",
			dataType: "json",
			contentType: "application/json; charset=utf-8",
			success : function(data){
				var html = '';
				var i;
				for(i=0; i<data.length; i++){
                var no = i+1;
					html += '<tr id="'+data[i].id_konsumsi+'">'+
                            '<td class="text-center">'+no+'</td>'+
							'<td>'+data[i].nama_kota+' - '+data[i].ibukota+'</td>'+
							'<td>'+data[i].tahun+'</td>'+
							'<td>'+data[i].jumlah+'</td>'+
							'<td class="text-center">'+data[i].status_konsumsi+'</td>'+
							'<td>'+
								'<a href="javascript:void(0);" class="btn btn-info btn-sm editRecord" data-id="'+data[i].id_konsumsi+'" data-kode="'+data[i].id_jenis_produk+'" data-nama="'+data[i].status_konsumsi+'" data-harga="'+data[i].jumlah+'" data-ukuran="'+data[i].tahun+'" data-satuan="'+data[i].kode+'" data-keterangan="'+data[i].keterangan+'"><i class="bi bi-pencil"></i></a>'+
                                '<a href="<?php echo asset('admin/konsumsi/hapus') ?>/'+data[i].id_konsumsi+'" class="btn btn-secondary btn-sm delete-link"><i class="bi bi-trash"></i></a>'+
							'</td>'+
							'</tr>';
				}
				$('#listRecords').html(html);					
			}

		});
	}
	
	// Update
    function notifikasi()
    {
    	swal ( "Berhasil" ,  "Data telah diupdate/ditambah/dihapus" ,  "success" );
    }

	// show edit modal form with bahan data
	$('#listRecords').on('click','.editRecord',function(){
		$('#UpdateModal').modal('show');
		$("#id_konsumsi").val($(this).data('id'));
		$("#id_jenis_produk").val($(this).data('idJenisProduk'));
		$("#status").val($(this).data('status'));
		$("#jumlah").val($(this).data('jumlah'));
		$("#tahun").val($(this).data('tahun'));
		$("#keterangan").val($(this).data('keterangan'));
		$("#kode2").val($(this).data('kode'));
	});
	// save edit record
	 $('#UpdateForm').on('submit',function(){
		var id_konsumsi = $('#id_konsumsi').val();
		var id_jenis_produk = $('#id_jenis_produk').val();
		var status = $('#status').val();
		var jumlah = $('#jumlah').val();
		var tahun = $('#tahun').val();
		var keterangan = $('#keterangan').val();
		var kode = $('#kode2').val();
		$.ajax({
			type : "POST",
			url  : "<?php echo asset('admin/konsumsi/update') ?>",
			dataType : "JSON",
			data : {id_konsumsi:id_konsumsi, 
                id_jenis_produk:id_jenis_produk, 
                status:status, 
                jumlah:jumlah,
                tahun:tahun,
                keterangan:keterangan,
                kode:kode,
            },
			success: function(data){
				$("#id_konsumsi").val("");
				$("#id_jenis_produk").val("");
				$("#status").val("");
				$('#jumlah').val("");
				$("#keterangan").val("");
				$('#kode2').val("");
				$('#UpdateModal').modal('hide');
				listBahan();
				swal ( "Berhasil" ,  "Data telah diupdate" ,  "success" );
			}
		});
		return false;
	});
	// show delete form
});
</script>