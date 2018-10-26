<table>
	<h1>Silahkan login</h1>
	<form  method="post">
		<tr>
			<td>Username</td>
			<td>:</td>
			<td><input type="text" name="username"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td>:</td>
			<td><input type="password" name="password"></td>
		</tr>
		<tr>
			<td><a href="register.php">Belum punya akun?</a></td>
			<td colspan="2" align="right"><input type="submit" name="submit"></td>
		</tr>
	</form>
</table>

<?php
include"koneksi.php"; 
if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$query = mysqli_query($konek, "SELECT * FROM jurnal WHERE username='$username' and password='$password'");
	$cek = mysqli_num_rows($query);

	if ($cek>0) {
		session_start();
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;

		header("Location:dashboard.php");
	}else{
		echo "<center>Gagal login</center>";
	}
	
}
 ?>