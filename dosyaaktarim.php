<link rel="stylesheet" href="boost.css" >  
<?php
if(isset($_FILES['dosya'])){
	   
			 $hata = $_FILES['dosya']['error'];
			   if($hata != 0)
			   {
				  echo 'Yüklenirken bir hata gerçekleşmiş.';
			   } 
			   else 
			   { 
				  $boyut = $_FILES['dosya']['size'];
				  
				  if($boyut > (1024*1024*5))
				  {
					 echo 'Dosya 5MB den büyük olamaz.';
				  } 
				  
				  else {
					 $tip = $_FILES['dosya']['type'];
					 $isim = $_FILES['dosya']['name'];
					 $uzanti = explode('.', $isim);
					 $uzanti = $uzanti[count($uzanti)-1];
					 // dosya.04.png
					 $dosyaformati = array("image/png", "image/jpeg"); //Burda hangi dosya formatlarının olabileceğini belirliyoruz

											
					 	if(!in_array($tip, $dosyaformati)) {
						?>
						<br><br><br><br><br><br><br>
	<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">İzin verilmiyor!</h4>

  <p>İzin verilmeyen dosya tipi.</p>
  <hr>
  <p class="mb-0">Yanlızca türü png veya jpg olan dosyaları yükleyebilirsiniz </p>
  
</div>

						
						<?php	
	header("refresh:4, url=index.php?islem=acikarttirmabaslat");						
					 	} 
					
						else {
						$dosya = $_FILES['dosya']['tmp_name'];
						$olustur= mt_rand(0,256541);
						move_uploaded_file($dosya, 'dosyalar/' . $olustur.".".$uzanti);
											
						//Burda dosyayı dosyalar kladsörümüze rastgele bir ad vererek atıyoruz.
				
						}
			     } 
  
  
  			 }
			 }
?>
