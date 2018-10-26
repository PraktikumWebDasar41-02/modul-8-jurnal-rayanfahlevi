<?php 

$nim = $_GET['nim']; 
include"koneksi.php";
$select = mysqli_query($konek, "SELECT * FROM jurnal WHERE nim='$nim'" );
$act	= mysqli_fetch_array($select);
$array = explode(",", $act['hobi']);
 ?>

<form method="post">
		<center>
		<table >
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><input type="text" name="nama" value="<?php echo$act['nama'] ?>"></td>
			</tr>
			<tr> 
				<td>NIM</td>
				<td>:</td>
				<td><input type="text" name="nim" value="<?php echo$act['nim'] ?> "></td>
			</tr>
			
			<tr>
				<td>Kelas</td>
				<td>:</td>
				<td><select name="kelas">
					<option value="D3MI-41-01" <?php echo$act['kelas']=="D3MI-41-01"? "selected='selected'" : ""; ?>>D3MI-41-01</option>
					<option value="D3MI-41-02" <?php echo$act['kelas']=="D3MI-41-02"? "selected='selected'" : ""; ?>>D3MI-41-02</option>
					<option value="D3MI-41-03" <?php echo$act['kelas']=="D3MI-41-03"? "selected='selected'" : ""; ?>>D3MI-41-03</option>
					<option value="D3MI-41-04" <?php echo$act['kelas']=="D3MI-41-04"? "selected='selected'" : ""; ?>>D3MI-41-04</option>
					</select>
				</td>
			</tr>
			
			<tr>
			<td>Hobi</td>
			<td> : </td>
			<td>
				<input type="checkbox" name="hobi" value="Renang" 	<?php in_array('Renang', $array) ? print 'checked': ' ' ?> >Renang
				<input type="checkbox" name="hobi" value="Bola" 	<?php in_array('Bola', $array) ? print 'checked': ' ' ?> >Bola
				<input type="checkbox" name="hobi" value="Volly" 	<?php in_array('Volly', $array) ? print 'checked': ' ' ?> >Volly
				<input type="checkbox" name="hobi" value="Badminton" <?php in_array('Badminton', $array) ? print 'checked': ' ' ?> >Badminton 
				<input type="checkbox" name="hobi" value="Basket"	<?php in_array('Basket', $array) ? print 'checked': ' ' ?> >Basket	 	
			</td>
			</tr>
			<tr>
				<td>Genre film</td>
				<td> : </td>
				<td>
					<input type="checkbox" name="film" value="Horor"	<?php in_array('Horor', $array) ? print 'checked': ' ' ?>>Horor
					<input type="checkbox" name="film" value="Anime"	<?php in_array('Anime', $array) ? print 'checked': ' ' ?>>Anime
					<input type="checkbox" name="film" value="Action"	<?php in_array('Action', $array) ? print 'checked': ' ' ?>>Action
					<input type="checkbox" name="film" value="Drama"	<?php in_array('Drama', $array) ? print 'checked': ' ' ?>>Drama 
					<input type="checkbox" name="film" value="Romance"	<?php in_array('Romance', $array) ? print 'checked': ' ' ?>>Romance
				</td>
			</tr>
			<tr>
				<td>Tempat Wisata</td>
				<td> : </td>
				<td>
					<input type="checkbox" name="wisata" value="Bali"		<?php in_array('Bali', $array) ? print 'checked': ' ' ?>>Bali
					<input type="checkbox" name="wisata" value="Tanjung Selor" <?php in_array('Tanjung Selor', $array) ? print 'checked': ' ' ?>>Tanjung Selor
					<input type="checkbox" name="wisata" value="Jakarta"	<?php in_array('Jakarta', $array) ? print 'checked': ' ' ?>>Jakarta
					<input type="checkbox" name="wisata" value="Lombok"		<?php in_array('Lombok', $array) ? print 'checked': ' ' ?>>Lombok
				</td>
			</tr>
			<tr>
				<td>Tanggal lahir</td>
				<td>:</td>
				<td><input type="date" name="tgl_lahir" value="<?php echo$act['tgl_lahir'] ?>" ></td>
			</tr>
			
			<tr>
				<td><a href="tampil.php">Cek data</a></td>
				<td colspan="2" align="right"><input type="submit" name="submit"></td>
			</tr>
		</table>
		</center>
	</form>

<?php 
include"koneksi.php";
$errnama	= "";
$errnim		= "";


if (isset($_POST['submit'])) {
	$nama 	= $_POST['nama'];

	$nama = $_POST['nama'];
	if (strlen($_POST['nama']) > 25) {
		$errnama = "Nama tidak boleh lebih dari 25";
	}

	$nim 	= $_POST['nim'];
	if (!is_numeric($nim)) {
		$errnim = "NIM harus berupa angka";
	}

	$kelas = $_POST['kelas'];
	$hobi 	= $_POST['hobi'];
	$film 	= $_POST['film'];
	$wisata 	= $_POST['wisata'];
	$tgl_lahir = $_POST['tgl_lahir'];


	$query = mysqli_query($konek, "INSERT INTO jurnal VALUES ('$nama', '$nim', '$kelas', '$hobi', '$film', '$wisata', '$tgl_lahir') ");

	if ($query) {
		echo "<center>Data berhasil disimpan</center>";
	}else{
		echo "Gagal";
	}
}

 ?>