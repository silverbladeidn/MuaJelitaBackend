<p class="text-center">
	<?php foreach($listing_tahun as $listing_tahun) { ?>
		<a href="<?php echo asset('admin/peta?tahun='.$listing_tahun->tahun) ?>" class="btn <?php if($listing_tahun->tahun==$tahun) { echo 'btn-success'; }else{ echo 'btn-dark'; } ?>">
			<i class="bi bi-eye"></i> Tahun <?php echo $listing_tahun->tahun ?>
		</a>
	<?php } ?>
</p>

<style>
	html, body {
		height: 100%;
		margin: 0;
	}
	.leaflet-container {
		height: 600px;
		width: 100%;
		max-width: 100%;
		max-height: 100%;
	}
</style>

<div id='map'></div>
<!-- -4.914764, 117.351615 -->
<script>
	const map = L.map('map').setView([-4.914764, 117.351615], 4.5);

	L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	}).addTo(map);

	const LeafIcon = L.Icon.extend({
		options: {
			shadowUrl: '{{ asset("assets/images/leaf-shadow.png") }}',
			iconSize:     [38, 95],
			shadowSize:   [50, 64],
			iconAnchor:   [22, 94],
			shadowAnchor: [4, 62],
			popupAnchor:  [-3, -76]
		}
	});

	// define icon
	<?php foreach($konsumsi2 as $konsumsi2) { ?>
		const greenIcon<?php echo $konsumsi2->id_konsumsi ?> = new LeafIcon({iconUrl: '{{ asset("assets/images/leaf-red.png") }}'});
	<?php } ?>
	
	// define latitude longitude
	<?php foreach($konsumsi as $konsumsi) { ?>
		const mGreen<?php echo $konsumsi->id_konsumsi ?> = L.marker([<?php echo $konsumsi->lat ?>, <?php echo $konsumsi->lng ?>], {icon: greenIcon<?php echo $konsumsi->id_konsumsi ?>}).bindPopup('<?php echo $konsumsi->nama_kota ?> (<?php echo number_format($konsumsi->jumlah) ?>)').addTo(map);
	<?php } ?>
	

</script>
