<form method="post">
	<input type="text" name="cari"><button type="submit">Cari</button>
</form>

<?php 
include"koneksi.php";

echo "<table border='1'>";
echo "<tr>
			<th>Nama</th>
			<th>NIM</th>
			<th>Kelas</th>
			<th>Hobi</th>
			<th>film</th>
			<th>Wisata</th>
			<th>Tanggal lahir</th>
			
			<th>Edit</th>
		</tr>";

$tampil;
if (isset($_POST['cari'])) {
	$cari = $_POST['cari'];
	$tampil = mysqli_query($konek, "SELECT * FROM jurnal WHERE nim like '%$cari%' ");
}else{
	$tampil = mysqli_query($konek, "SELECT * FROM jurnal");

}

while ($cc = mysqli_fetch_array($tampil)) {

?>
	
		<tr>
			<td><?php echo $cc['nama']; ?></td>
			<td><?php echo $cc['nim']; ?></td>
			<td><?php echo $cc['kelas']; ?></td>
			<td><?php echo $cc['hobi']; ?></td>
			<td><?php echo $cc['film']; ?></td>
			<td><?php echo $cc['wisata']; ?></td>
			<td><?php echo $cc['tgl_lahir']; ?></td>
			
			<td><?php echo "<a href=newData.php?nim=".$cc['nim']." >Edit data</a>"; ?></td>
		</tr>
<?php 

}
echo "</table>";

?>