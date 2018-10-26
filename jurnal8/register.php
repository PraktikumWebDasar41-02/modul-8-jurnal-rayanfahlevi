<?php
include"koneksi.php";

$erruser = "";
$errpass = "";

if (isset($_POST['submit'])) {
	$email = $_POST['email'];

	$username = $_POST['username'];
	if (strlen($_POST['username']) <> 20) {
		$erruser = "Username harus 20";
	}

	$password = $_POST['password'];
	if (strlen($_POST['password']) < 6) {
		$errpass = "Password minimal 6 karakter";
	}

	$password2 = $_POST['password2'];

	if ($erruser === "" && $errpass === "" ) {
		$query = "INSERT INTO jurnal VALUES ('$username', '$password', '$email', '', '', '', '', '', '', '')" ;

		$simpan = mysqli_query($konek, $query);
		if ($simpan) {
			echo "<script>
			alert('Data Berhasil Disimpan');
			</script>";
		}
	}	
}
?>

<table>
	<form method="post">
		<tr>
			<td>Masukan email</td>
			<td>:</td>
			<td><input type="text" name="email" placeholder="@gmail.com"></td>
		</tr>
		<tr>
			<td>Masukan username</td>
			<td>:</td>
			<td><input type="text" name="username"></td>
		</tr>
		<tr>
			<td>Masukan password</td>
			<td>:</td>
			<td><input type="password" name="password"></td>
		</tr>
		<tr>
			<td>Masukan ulang password</td>
			<td>:</td>
			<td><input type="text" name="password2"></td>
		</tr>
		<tr>
			<td colspan="3" align="right"><input type="submit" name="submit"></td>
		</tr>
	</form>
</table>

