<?php include('header.php') ?>

<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


<div class="row mb-4 mx-1">
<?php
	$sayi=0;
	$projeSor=$db->prepare("SELECT * FROM projeler");
	$projeSor->execute();
	$sayi=$projeSor->rowcount();
?>

	<div class="col-md-3">	
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
             <div class="row no-gutters align-items-center">
                 <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            <b> Toplam Proje Sayısı </b></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $sayi  ?></div>
                   </div>
                 <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                 </div>
              </div>
         </div>                        
	</div>

<?php
	$sayi=0;
	$projeSor=$db->prepare("SELECT * FROM projeler WHERE proje_durum='Bitti'");
	$projeSor->execute();
	$sayi=$projeSor->rowcount();
?>

	<div class="col-md-3">	
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
             <div class="row no-gutters align-items-center">
                 <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            <b> Biten Proje Sayısı </b></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $sayi  ?> </div>
                   </div>
                 <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                 </div>
              </div>
         </div>                        
	</div>

<?php
	$sayi=0;
	$projeSor=$db->prepare("SELECT * FROM projeler WHERE proje_aciliyet='Acil'");
	$projeSor->execute();
	$sayi=$projeSor->rowcount();
?>
	<div class="col-md-3">	
        <div class="card border-left-danger shadow h-100 py-2">
          <div class="card-body">
             <div class="row no-gutters align-items-center">
                 <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            <b> Acil Proje Sayısı </b></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $sayi  ?> </div>
                   </div>
                 <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                 </div>
              </div>
         </div>                        
	</div>


<?php
	$sayi=0;
	$projeSor=$db->prepare("SELECT * FROM projeler WHERE proje_aciliyet='Acelesi Yok'");
	$projeSor->execute();
	$sayi=$projeSor->rowcount();
?>
	<div class="col-md-3">	
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
             <div class="row no-gutters align-items-center">
                 <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            <b> Önemsiz Proje Sayısı </b></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $sayi  ?> </div>
                   </div>
                 <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                 </div>
              </div>
         </div>                        
	</div>
</div>


<div class="row justify-content-center">
		<div class="col-md-11">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h5 class="m-0 font-weight-bold text-primary text-center">Projeler</h5>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="projeler" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th> No </th>
									<th> Başlık </th>
									<th> Teslim tarihi </th>
									<th> Aciliyet </th>
									<th> Durum </th>
									<th> ProjeDetay </th>
									<th> <center> İşlemler</center> </th>
								</tr>
							</thead>
							<!--While döngüsü ile veritabanında ki verilerin tabloya çekilme işlemi giriş-->
							<tbody>
								<?php 
									$sayi=0;
									$projeSor=$db->prepare("SELECT * FROM projeler");
									$projeSor->execute();
									while($projecek=$projeSor->fetch(PDO::FETCH_ASSOC)){
										$sayi++;  ?>
									<tr>
										<td> <?php echo $sayi ?> </td>
										<td> <?php echo $projecek['proje_baslik'] ?> </td>
										<td> <?php echo $projecek['proje_teslim_tarih'] ?> </td>
										<td> <?php echo $projecek['proje_aciliyet'] ?> </td>
										<td> <?php echo $projecek['proje_durum'] ?> </td>
										<td> <?php echo $projecek['proje_detay'] ?> </td>
										<td> 
								<div class="d-flex justify-content-center">
									<form action="projeduzenle.php" method="POST">
										<input type="hidden" name="proje_id" value="<?php echo $projecek['proje_id'] ?>">
										<button type="submit" name="duzenleme" class="btn btn-success btn-sm btn-icon-split"> 
											<span class="icon text-white-60">
												<i class="fas fa-edit"> </i>
											</span>
										</button>
									</form>
									<form class="mx-2" action="islemler/islem.php" method="POST">
										<input type="hidden" name="proje_id" value="<?php echo $projecek['proje_id'] ?>">
										<button type="submit" name="projesilme" class="btn btn-danger btn-sm btn-icon-split"> 
											<span class="icon text-white-60">
												<i class="fas fa-trash"> </i>
											</span>
										</button>
									</form>
									<form action="projebak.php" method="POST">
										<input type="hidden" name="proje_id" value="<?php echo $projecek['proje_id'] ?>">
										<button type="submit" name="projebak" class="btn btn-primary btn-sm btn-icon-split"> 
											<span class="icon text-white-60">
												<i class="fas fa-eye"> </i>
											</span>
										</button>
									</form>
									
								</div>

						</tr>
								<?php } ?>
							</tbody>
							<!--While döngüsü ile veritabanında ki verilerin tabloya çekilme işlemi çıkış-->
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>



	<div class="row mt-5 mb-4 mx-1">
<?php
	$sayi=0;
	$siparisSor=$db->prepare("SELECT * FROM siparis");
	$siparisSor->execute();
	$sayi=$siparisSor->rowcount();
?>

	<div class="col-md-3">	
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
             <div class="row no-gutters align-items-center">
                 <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            <b> Toplam Sipariş Sayısı </b></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $sayi  ?></div>
                   </div>
                 <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                 </div>
              </div>
         </div>                        
	</div>

<?php
	$sayi=0;
	$siparisSor=$db->prepare("SELECT * FROM siparis WHERE sip_durum='Bitti'");
	$siparisSor->execute();
	$sayi=$siparisSor->rowcount();
?>

	<div class="col-md-3">	
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
             <div class="row no-gutters align-items-center">
                 <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            <b> Biten Sipariş Sayısı </b></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $sayi  ?> </div>
                   </div>
                 <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                 </div>
              </div>
         </div>                        
	</div>

<?php
	$sayi=0;
	$siparisSor=$db->prepare("SELECT * FROM siparis WHERE sip_aciliyet='Acil'");
	$siparisSor->execute();
	$sayi=$siparisSor->rowcount();
?>
	<div class="col-md-3">	
        <div class="card border-left-danger shadow h-100 py-2">
          <div class="card-body">
             <div class="row no-gutters align-items-center">
                 <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            <b> Acil Sipariş Sayısı </b></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $sayi  ?> </div>
                   </div>
                 <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                 </div>
              </div>
         </div>                        
	</div>


<?php
	$sayi=0;
	$siparisSor=$db->prepare("SELECT * FROM siparis WHERE sip_aciliyet='Acelesi Yok'");
	$siparisSor->execute();
	$sayi=$siparisSor->rowcount();
?>
	<div class="col-md-3">	
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
             <div class="row no-gutters align-items-center">
                 <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            <b> Önemsiz Sipariş Sayısı </b></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $sayi  ?> </div>
                   </div>
                 <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                 </div>
              </div>
         </div>                        
	</div>
</div>

<div class="row justify-content-center mt-4">
		<div class="col-md-11">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h5 class="m-0 font-weight-bold text-primary text-center">Siparişler</h5>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="siparisler" width="100%" cellspacing="0" >
				<thead>
					<tr>
						<th> Sipariş No </th>
			            <th> Müşteri Ad Soyad </th>
			            <th> Müşteri Telefon No </th>
			            <th> Müşteri Mail </th>
						<th> Sipariş Başlık </th>
						<th> Bitiş Tarihi </th>
						<th> Aciliyet </th>
						<th> Durum </th>
						<th> Ücret </th>
            			<th> Sipariş Detayı </th>
						<th> <center> İşlemler</center> </th>
					</tr>
				</thead>
				<tbody>					
						<?php 
						$sayi=0;
						$siparisSor=$db->prepare("SELECT * FROM siparis");
						$siparisSor->execute();
						while($siparisCek=$siparisSor->fetch(PDO::FETCH_ASSOC)){
							$sayi++;  ?>

						<tr>
							<td> <?php echo $sayi ?> </td>
				            <td> <?php echo $siparisCek['musteri_isim'] ?> </td>
				            <td> <?php echo $siparisCek['musteri_tel'] ?> </td>
				            <td> <?php echo $siparisCek['musteri_mail'] ?> </td> 
							<td> <?php echo $siparisCek['sip_baslik'] ?> </td>
							<td> <?php echo $siparisCek['sip_teslim_tarihi'] ?> </td>
							<td> <?php echo $siparisCek['sip_aciliyet'] ?> </td>
							<td> <?php echo $siparisCek['sip_durum'] ?> </td>
              				<td> <?php echo $siparisCek['sip_ucret'] ?> </td>
							<td> <?php echo $siparisCek['sip_detay'] ?> </td>
							<td> 
								<div class="d-flex justify-content-center">
									<form action="siparisDuzenle.php" method="POST">
										<input type="hidden" name="sip_id" value="<?php echo $siparisCek['sip_id'] ?>">
										<button type="submit" name="siparisGuncelle" class="btn btn-success btn-sm btn-icon-split"> 
											<span class="icon text-white-60">
												<i class="fas fa-edit"> </i>
											</span>
										</button>
									</form>
									<form class="mx-2" action="islemler/islem.php" method="POST">
										<input type="hidden" name="sip_id" value="<?php echo $siparisCek['sip_id'] ?>">
										<button type="submit" name="siparisSilme" class="btn btn-danger btn-sm btn-icon-split"> 
											<span class="icon text-white-60">
												<i class="fas fa-trash"> </i>
											</span>
										</button>
									</form>
									<form action="siparisbak.php" method="POST">
										<input type="hidden" name="sip_id" value="<?php echo $siparisCek['sip_id'] ?>">
										<button type="submit" name="siparisbak" class="btn btn-primary btn-sm btn-icon-split"> 
											<span class="icon text-white-60">
												<i class="fas fa-eye"> </i>
											</span>
										</button>
									</form>									
								</div>
						</tr>

									<?php } ?>					
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div> 






<?php include('footer.php') ?>



<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="js/demo/datatables-demo.js"></script> 
<script src="vendor/datatables/dataTables.buttons.min.js"></script>
<script src="vendor/datatables/buttons.flash.min.js"></script>
<script src="vendor/datatables/jszip.min.js"></script>
<script src="vendor/datatables/pdfmake.min.js"></script>
<script src="vendor/datatables/vfs_fonts.js"></script>
<script src="vendor/datatables/buttons.html5.min.js"></script>
<script src="vendor/datatables/buttons.print.min.js"></script>

<script type="text/javascript">
  var dataTables = $('#projeler').DataTable({
    "ordering": true,  //Tabloda sıralama özelliği gözüksün mü? true veya false
    "searching": true,  //Tabloda arama yapma alanı gözüksün mü? true veya false
    "lengthChange": true, //Tabloda öğre gösterilme gözüksün mü? true veya false
    "info": true,
    dom: "<'row mobilgizleexport gizlemeyiac'<'col-md-6'l><'col-md-6'f><'col-md-4 d-none d-print-block'B>>rtip",
    
});
</script>

  <script type="text/javascript">
  var dataTables = $('#siparisler').DataTable({
    "ordering": true,  //Tabloda sıralama özelliği gözüksün mü? true veya false
    "searching": true,  //Tabloda arama yapma alanı gözüksün mü? true veya false
    "lengthChange": true, //Tabloda öğre gösterilme gözüksün mü? true veya false
    "info": true,
    dom: "<'row mobilgizleexport gizlemeyiac'<'col-md-6'l><'col-md-6'f><'col-md-4 d-none d-print-block'B>>rtip",
    
});
</script>

<script type="text/javascript"> 
Swal.fire({
  type: 'success',
  title: 'Hoş geldiniz',
  text: 'Başarıyla giriş yaptınız',
  footer: '<a href="projeler.php"> Projeleri görmek için tıklayın </a>'
})

</script>


