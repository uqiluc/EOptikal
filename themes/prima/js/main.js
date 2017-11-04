$('#BarangStok_details_0').on('change', function () {$('#details').show(); 
	notie.alert(2, 'Silahkan Tentukan Harga Produk'); 
	$( "#BarangStok_details" ).focus(); });
$('#BarangStok_details_1').on('change', function () {$('#details').hide(); 
	$('#BarangStok_details').val(0); 
	notie.alert(1, 'Harga Produk telah di setting Call US'); });

$('#Patient_bpjs_0').on('change', function () {$('#bpjs').show(); 
	notie.alert(2, 'Silahkan Tentukan Harga Produk'); 
	$( "#Patient_bpjs" ).focus(); });
$('#Patient_bpjs_1').on('change', function () {$('#bpjs').hide(); 
	$('#Patient_bpjs').val(0); 
	notie.alert(1, 'Harga Produk telah di setting Call US'); });
