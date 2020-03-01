<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h3> Nama Lengkap : <?php echo $nama ?> </h2>
	<h2>Ramalan Cuaca</h2>
	<ul>
		<?php foreach( (array) $data as $item) { ?>
			<?php $date = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', @$item->jamCuaca); ?>

			<li>
				Cuaca kota singkawang hari <?php echo $date->format('1'); ?> 
				tanggal <?php echo $date->format('d M Y'); ?>
				jam <?php echo $date->format('H:i'); ?>
				adalah <b> <?php echo $item->cuaca ?> </b>
				dengan suhu <?php echo $item->tempC ?>
				derajat celcius.
			</li>
	<?php	}  ?>

	</ul>
</body>
</html>
