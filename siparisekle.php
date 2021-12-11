<?php include 'header.php' ?>

<div class="container">
	<div class="card">
		<div class="card-header">
			<h4 class="display-4"> Sipariş Ekleme Sayfası </h4>
		</div>
		<div class="card-body">
			<form action="islemler/islem.php" method="POST" enctype="multipart/form-data">
				<div class="row mt-2">
					<div class="col-md-6">
						<label>Müşteri İsim Soyisim</label>
						<input type="text" name="musteri_isim" class="form-control">
					</div>
					<div class="col-md-6">
						<label>Mail Adresi</label>
						<input type="email" name="musteri_mail" class="form-control">
					</div>
				</div>

				<div class="row mt-2">
					<div class="col-md-6">
						<label>Telefon Numarası</label>
						<input type="number" name="musteri_tel" class="form-control">
					</div>
					<div class="col-md-6">
						<label>Sipariş Başlık</label>
						<input type="text" name="sip_baslik" class="form-control">
					</div>
				</div>


				<div class="row mt-2">
					<div class="form-group col-md-6">
						<label>Sipariş Durumu</label>
						<select name="sip_durum" class="form-control">
							<option > Yeni Başladı </option>
							<option > Devam Ediyor </option>
							<option > Bitti </option>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label>Sipariş Aciliyeti</label>
						<select name="sip_aciliyet" class="form-control">
							<option > Acil </option>
							<option > Normal </option>
							<option > Acelesi Yok </option>
						</select>
					</div>		
				</div>			

					<div class="form-row mt-2 "> 
						<div class="form-group col-md-6"> 
							<label>Sipariş Ücreti (TL)</label>
							<input type="number" required class="form-control" name="sip_ucret">
						</div>

						<div class="form-group col-md-6">	
							<label>Sipariş Teslim Tarihi </label>							  
							<input type="date" required class="form-control" name="sip_teslim_tarihi">
						</div>
					</div>	

					<div class="form-row mt-2 "> 
						<div class="form-group col-md-12"> 
							<label>Sipariş Detayı</label>
							<textarea  class="form-control" required name="sip_detay" id="sipdetay_editor"> </textarea>
						</div>

						<div class="col-md-6 mt-2">		  
							 <label>Dosya eki seçin</label>
							 <input class="form-control mt-2" type="file" name="sip_dosya" id="sip_dosya">
						</div>
					</div>	

					<button type="submit" class="btn btn-outline-primary mt-2" name="siparisekle"> Kaydet </button>
			</form>
		</div>
	</div>
</div>



<?php include 'footer.php' ?>  

<script type="text/javascript"  src="ckeditor/ckeditor.js"> </script>

<script> CKEDITOR.replace('sipdetay_editor'); </script>