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
							echo "İzin verilmeyen dosya tipi.";						
					 	}else {
						$dosya = $_FILES['dosya']['tmp_name'];
						$olustur= mt_rand(0,256541);
						move_uploaded_file($dosya, 'dosyalar/' . $olustur.".".$uzanti);
											
						//Burda dosyayı dosyalar kladsörümüze rastgele bir ad vererek atıyoruz.
				
						}
			     } 
  
  
  			 }
			 }
?>
