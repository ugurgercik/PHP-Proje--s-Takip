<?php include('header.php'); 

	$ayarsor=$db->prepare("SELECT * FROM ayarlar");
	$ayarsor->execute();
	$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);
?>

<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h1 class="text-primary font-weight-bolder"> Ayarlar </h1>
		</div>

		<div class="card-body ">
			<form action="islemler/islem.php" method="POST">
				<div class="form-row">
					<div class="col-md-6"> 
						<label>Site başlığını giriniz</label>
						<input class="form-control" type="text" name="site_baslik" value="<?php echo $ayarcek['site_baslik'] ?>">
					</div>
					
				</div>
				<div class="form-row my-2">
					<div class="col-md-6"> 
						<label>Site Açıklamasını giriniz</label>
						<input class="form-control" type="text" name="site_aciklama" value="<?php echo $ayarcek['site_aciklama'] ?>">
					</div>
				</div>
				<div class="form-row ">
					<div class="col-md-6">
						<label>Site Sahibini giriniz</label>
						<input class="form-control" type="text" name="site_sahibi" value="<?php echo $ayarcek['site_sahibi'] ?>">
					</div>
				</div>
				<button type="submit" name="ayarkaydet" class="btn-outline-primary mt-2"> Kaydet </button>
			</form>
		</div>

	</div>
</div>



<?php include('footer.php') ?>