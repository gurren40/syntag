<html>
	<head>
		<title>TU</title>
	</head>
	<body>
		<div align="center">
			<br><h1>HOME TU</h1>
			<a href="<?php echo base_url();?>">Home Page</a> <a href="<?php echo base_url();?>TU/logout">Logout</a>
		</div>
		<div align="center">
			<br><h2>Data mahasiswa</h2>
			<table>
				<tr>
					<th>NIM</th>
					<th>Nama</th>
				</tr>
				<?php 
					foreach($datamahasiswa as $mahasiswa){
						echo '<tr>
							<td>'.$mahasiswa['NIM'].'</td>
							<td>'.$mahasiswa['nama'].'</td>
						</tr>';
					}
				?>
			</table>
		</div>
		<div align="center">
			<br><h2>Masukkan data mahasiswa</h2>
			<form method="POST" action="<?php echo base_url();?>TU/createmahasiswa">
				<br><input type="text" placeholder="NIM" name="NIM" required>
				<br><input type="text" placeholder="Nama" name="nama" required>
				<br><button type="submit">Submit</button>
			</form>
		</div>
	</body>
</html>
