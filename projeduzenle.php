<?php include 'header.php'; 

if(isset($_POST['proje_id'])){
	$projeSor=$db->prepare("SELECT * FROM projeler WHERE proje_id=:id");
	$projeSor->execute(array(
		'id' => $_POST['proje_id']
	));
	$projecek=$projeSor->fetch(PDO::FETCH_ASSOC);
}else{
	header("location:projeler.php");
}



?>



<div id="layoutSidenav_content" class="container">
	<div class="card"> 
		<div class="card-header">
			<h3 class="display-2" style="font-size: 2rem;"> Proje Düzenleme Sayfası </h3>
		</div>
		<div class="card-body">
			<form action="islemler/islem.php" method="POST">
				<div class="row mt-2">
					<div class="col-md-6">
						<label>Proje Başlığı</label>
						<input type="text" name="proje_baslik" class="form-control" value="<?php echo $projecek['proje_baslik'] ?>">
					</div>
					<div class="col-md-6">
						<label>Teslim Tarihi</label>
						<input type="date" name="proje_teslim_tarih" class="form-control" value="<?php echo $projecek['proje_teslim_tarih'] ?>">
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-md-6">
						<label>Proje Aciliyeti</label>
						<select name="proje_aciliyet" class="form-control">
							<option <?php if($projecek['proje_aciliyet']=="Acil") {echo "selected";} ?> > Acil </option>
							<option <?php if($projecek['proje_aciliyet']=="Acelesi Yok") {echo "selected";} ?> > Acelesi Yok </option>
							<option <?php if($projecek['proje_aciliyet']=="Normal") {echo "selected";} ?> > Normal </option>
						</select>
					</div>
					<div class="col-md-6">
						<label>Proje Durumu</label>
						<select name="proje_durum" class="form-control">
							<option <?php if($projecek['proje_durum']=="Yeni Başladı") {echo "selected";} ?> > Yeni Başladı </option>
							<option <?php if($projecek['proje_durum']=="Devam Ediyor") {echo "selected";} ?> > Devam Ediyor </option>
							<option <?php if($projecek['proje_durum']=="Bitti") {echo "selected";} ?> > Bitti </option>
						</select>
					</div> 
				</div>
					
				<div class="row mt-2"> 
					<div class="col-md-6"> 
						<label>Proje Detay</label>
						<textarea name="proje_detay" class="form-control mt-2"><?php echo $projecek['proje_detay'] ?></textarea>
					</div>
				<div class="col-md-6">		  
							 <label>Dosya eki seçin</label>
							 <input class="form-control mt-2" type="file" name="proje_dosya" id="projedosya">
				</div>
	

				</div>
				<!-- bu hidden input atıyoruz çünkü hangi projeyi tutacaksa onu bilmek için -->
				<input type="hidden" name="proje_id" value="<?php echo $_POST['proje_id'] ?>">
				<button type="submit" class="btn btn-outline-primary mt-2" name="projeDuzenle"> Kaydet </button>
			</form>
	
		</div>
	</div> 
</div>




<?php include 'footer.php'; ?>



