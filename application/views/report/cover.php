<br><br><br><br><br>
<h1 style="text-align: center;font-size: 36px" >
     <?= $title?>
</h1>
<br><br>
<br><br>
<br><br>
<br><br>
<div style="text-align: center" >
	<?php
		
		$curl_handle=curl_init();
		curl_setopt($curl_handle, CURLOPT_URL, base_url()."/assets/logo/TPA.PNG" );
		curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
		$logo = base64_encode( curl_exec($curl_handle) );
		curl_close($curl_handle);	
	?>
    <img  src="data:image/gif;base64,<?= $logo ?>" alt="" height="auto" width="300">
</div>
<br><br><br><br><br>