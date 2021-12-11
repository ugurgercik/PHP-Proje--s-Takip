<?php include 'header.php'; ?>


<link rel="stylesheet" media="all" type="text/css" href="vendor/upload/css/fileinput.min.css">
<link rel="stylesheet" media="all" type="text/css" href="vendor/upload/themes/explorer-fas/theme.min.css">

<script type="text/javascript" charset="utf-8" src="vendor/upload/js/fileinput.js"></script>
<script type="text/javascript" charset="utf-8" src="vendor/upload/themes/fas/theme.min.js"></script>
<script type="text/javascript" charset="utf-8" src="vendor/upload/themes/explorer-fas/theme.minn.js"></script>



<div class="container">
	<div class="card">
		<div class="card-header">
			<h3 class="display-4"> Proje Ekle </h3>
		</div>
		<div class="card-body">
			<form action="islemler/islem.php" method="POST" enctype="multipart/form-data">
				<div class="row mt-2">
					<div class="col-md-6">
						<label>Proje Başlığı</label>
						<input type="text" name="proje_baslik" class="form-control">
					</div>
					<div class="col-md-6">
						<label>Teslim Tarihi</label>
						<input type="date" name="proje_teslim_tarih" class="form-control">
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-md-6">
						<label>Proje Aciliyeti</label>
						<select name="proje_aciliyet" class="form-control">
							<option > Acil </option>
							<option > Acelesi Yok </option>
							<option > Normal </option>
						</select>
					</div>
					<div class="col-md-6">
						<label>Proje Durumu</label>
						<select name="proje_durum" class="form-control">
							<option > Yeni Başladı </option>
							<option > Devam Ediyor </option>
							<option > Bitti </option>
						</select>
					</div>		
				</div>			

					<div class="form-row mt-2 "> 
						<div class="col-md-12"> 
							<label>Proje Detay</label>
							<textarea id="projedetay_editor" name="proje_detay" class="form-control mt-2"></textarea>
						</div>

						<div class="col-md-6 mt-2">		  
							 <label>Dosya eki seçin</label>
							 <input class="form-control mt-2" type="file" name="dosya_yolu" id="dosya_yolu">
						</div>
	
					</div>			
					<button type="submit" class="btn btn-outline-primary mt-2" name="projeekle"> Kaydet </button>
			</form>
		</div>
	</div>
</div>




<?php include 'footer.php'; ?>


<script type="text/javascript"  src="ckeditor/ckeditor.js"> </script>

<script> CKEDITOR.replace('projedetay_editor'); </script>