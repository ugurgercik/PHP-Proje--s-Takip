<?php include 'header.php'; 

if(isset($_POST['sip_id'])){
	$siparisSor=$db->prepare("SELECT * FROM siparis WHERE sip_id=:sip_id");
	$siparisSor->execute(array(
		'sip_id'=>$_POST['sip_id']
	));
	$siparisCek=$siparisSor->fetch(PDO::FETCH_ASSOC);
	} 	else{
	header("location:siparisler.php");
	}

?>


<div id="layoutSidenav_content" class="container"> 
	<div class="container">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title"> Sipariş Düzenleme Sayfası </h5>
			</div>
			<div class="card-body">
				<form action="islemler/islem.php" method="POST"> 
					<div class="row">
						<div class="col-md-5 "> 
							<label>İsim Soyisim</label>
							<input type="text" class="form-control" name="musteri_isim" 
							value="<?php echo $siparisCek['musteri_isim'] ?>">
						</div>	
						<div class="col-md-5 "> 			
							<label>Mail Adresi</label>
							<input type="email" class="form-control" name="musteri_mail" 
							value="<?php echo $siparisCek['musteri_mail'] ?>">
						</div> 
					</div>
					<div class="row">				
						<div class="col-md-5 mt-2 "> 
							<label>Telefon Numarası</label>
							<input type="number" class="form-control" name="musteri_tel" 
							value="<?php echo $siparisCek['musteri_tel'] ?>">
						</div>
						<div class="col-md-5 mt-2 "> 
							<label>Sipariş Başlığı</label>
							<input type="text" class="form-control" name="sip_baslik" 
							value="<?php echo $siparisCek['sip_baslik'] ?>">
						</div>						
					</div>
					<div class="row">
						<div class="form-group col-md-5 mt-2">
							<label>Sipariş Durumu</label>
							<select name="sip_durum" class="form-control">
							<option <?php if($siparisCek['sip_durum']=="yeni") {echo "selected";} ?>> Yeni Başladı </option>
							<option <?php if($siparisCek['sip_durum']=="devam") {echo "selected";} ?>> Devam Ediyor </option>
							<option <?php if($siparisCek['sip_durum']=="bitti") {echo "selected";} ?>> Bitti </option>
						</select>
						</div>
						<div class="form-group col-md-5 mt-2">
							<label>Ücret (TL)</label>
							<input type="number" required class="form-control" name="sip_ucret" 
							value="<?php echo $siparisCek['sip_ucret'] ?>">
						</div>
					</div>
					<div class="row mt-2">
						<div class="form-group col-md-5 mt-2">
							<label>Sipariş Teslim Tarihi</label>
							<input type="date" required class="form-control" name="sip_teslim_tarihi" value="<?php echo $siparisCek['sip_teslim_tarihi'] ?>">
						</div>	
						<div class="form-group col-md-5 mt-2">
							<label>Aciliyet</label>
							<select name="sip_aciliyet" required class="form-control">
							<option <?php if($siparisCek['sip_aciliyet']=="acil") {echo "selected";} ?> > Acil </option>
							<option <?php if($siparisCek['sip_aciliyet']=="normal") {echo "selected";} ?> > Normal </option>
							<option <?php if($siparisCek['sip_aciliyet']=="acelesi_yok") {echo "selected";} ?> > Acelesi Yok </option>
						</select>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-10 mt-2">
							<label>Sipariş Detayı</label>
							<textarea  class="form-control" required name="sip_detay" id="editor"> 
								<?php echo $siparisCek['sip_detay'] ?> </textarea>
						</div>	
					</div>
					<input type="hidden" name="sip_id" value="<?php echo $_POST['sip_id'] ?>">
					<button type="submit" class="btn btn-danger" name="siparisbak"> Geri Dön </button>
				</form>
			</div>
		</div>

	</div>
</div>
	

<?php include 'footer.php'; ?>