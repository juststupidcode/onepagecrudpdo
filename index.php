<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>One Page PDO CRUD</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
	<style>
	/*design table 1*/
	body{
	font-family: 'roboto';
	

}

.judul{
	background: #87D1D8;
	text-align: center;
	padding: 5px 16px;
	position: fixed;
  	top: 0;
  	width: 100%;
  

}

.judul h1,h2,h3{
	height: 15px;
}

a{
	/*color: #fff;*/
	padding: 5px;
	text-decoration: none;	
}

a input[type=button]
{
	border: none;
	padding: 8px 15px 8px 15px;
	background: #87D1D8;
	color: #fff;
	box-shadow: 1px 1px 4px #DADADA;
	-moz-box-shadow: 1px 1px 4px #DADADA;
	-webkit-box-shadow: 1px 1px 4px #DADADA;
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
}


.table1 {
    font-family: sans-serif;
    color: #232323;
    border-collapse: collapse;
	overflow: auto;
	width: 100%;
	text-align: center; 
	
	
}

.table1, th {
    border: 1px solid #999;
    padding: 8px 20px;
	height: 50px;
	overflow: auto;
	text-align: center; 
	
}
.tr1 {
    border: 1px solid #999;
    padding: 8px 20px;
	height: 50px;
	overflow: auto;
	text-align: center; 
	background: #87D1D8;
}
.table1, td {
    border: 1px solid #999;
    padding: 8px 20px;
	height: 30px;
	text-align: center; 
}

.form-style-2{
	max-width: 500px;
	padding: 20px 12px 10px 20px;
	font: 13px Arial, Helvetica, sans-serif;
}
.form-style-2-heading{
	font-weight: bold;
	font-style: italic;
	border-bottom: 2px solid #ddd;
	margin-bottom: 20px;
	font-size: 15px;
	padding-bottom: 3px;
}
.form-style-2 label{
	display: block;
	margin: 0px 0px 15px 0px;
}
.form-style-2 label > span{
	width: 100px;
	font-weight: bold;
	float: left;
	padding-top: 8px;
	padding-right: 5px;
}
.form-style-2 span.required{
	color:red;
}
.form-style-2 .tel-number-field{
	width: 40px;
	text-align: center;
}
.form-style-2 input.input-field, .form-style-2 .select-field{
	width: 48%;	
}
.form-style-2 input.input-field, 
.form-style-2 .tel-number-field, 
.form-style-2 .textarea-field, 
 .form-style-2 .select-field{
	box-sizing: border-box;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	border: 1px solid #C2C2C2;
	box-shadow: 1px 1px 4px #EBEBEB;
	-moz-box-shadow: 1px 1px 4px #EBEBEB;
	-webkit-box-shadow: 1px 1px 4px #EBEBEB;
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	padding: 7px;
	outline: none;
}
.form-style-2 .input-field:focus, 
.form-style-2 .tel-number-field:focus, 
.form-style-2 .textarea-field:focus,  
.form-style-2 .select-field:focus{
	border: 1px solid #0C0;
}
.form-style-2 .textarea-field{
	height:100px;
	width: 55%;
}
.form-style-2 input[type=submit],
.form-style-2 input[type=reset],
.form-style-2 input[type=button]{
	border: none;
	padding: 8px 15px 8px 15px;
	background: #FF8500;
	color: #fff;
	box-shadow: 1px 1px 4px #DADADA;
	-moz-box-shadow: 1px 1px 4px #DADADA;
	-webkit-box-shadow: 1px 1px 4px #DADADA;
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
}
.form-style-2 input[type=submit]:hover,
.form-style-2 input[type=button]:hover{
	background: #EA7B00;
	color: #fff;
}

	</style>


</head>
<body>


<div class="judul" id="myHeader">	
				<h3>ONE PAGE CRUD PHP PDO & MYSQL</h3>
	</div>

	
	<br/>
	<br/>
	<br/>
	<br/>
<?php
// Prasarat
// Harus ada database bernama "latihan".
// Di dalam database "latihan" ada tabel bernama "mhs".
// Tabel "mhs" terdiri dari kolom nim, nama, lahir, nilai

$dbname = 'latihan';
$dbuser = 'root';
$dbpass ='matadewa008';
$dbhost = 'localhost';
$dbchar = 'utf8mb4';
$dbcoll = '';

$dsn = "mysql:host=$dbhost; dbname=$dbname; charset=$dbchar";

$options = [
PDO::ATTR_ERRMODE                 => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE      => PDO::FETCH_ASSOC,
PDO::ATTR_EMULATE_PREPARES        => false,

];
$pdo = new PDO($dsn, $dbuser, $dbpass, $options);

// awal fungsi tampil
function tampil_data($pdo){
$sql = "SELECT * FROM mhs";
$stmt = $pdo->query($sql);
$didapat = $stmt->rowCount();

if($didapat == 0) {
    echo "Record Tidak Di Temukan";
}
else {
$no_urut=0;
	echo "<div style=overflow-x:auto;>";
echo "<table class=table1>";
echo "<tr class=tr1>
<th>No</th>
<th>NIM</th>
<th>NAMA</th>
<th>LAHIR</th>
<th>NILAI</th>
<th>Action</th>

</tr>";
while ($buff = $stmt->fetch()){
	echo "<tr>";
	$no_urut++;
	echo "<td>$no_urut</td>";
    echo "<td>" . htmlentities($buff['nim']) . "</td>";
    echo "<td>" . htmlentities($buff['nama']) . "</td>";
    echo "<td>" . htmlentities($buff['lahir']) . "</td>";
	echo "<td>" . htmlentities($buff['nilai']) . "</td>";

	 
	echo "<td><a href=index.php?aksi=update&nim=$buff[nim]><input type=button name=Ubah value=Ubah></a>
			   <a href=index.php?aksi=delete&nim=$buff[nim]><input type=button name=Hapus value=Hapus></a>

	</td>";
    echo "</tr>";
};
echo "</tr>";
echo "</table>";
echo "</div>";
echo "<p>Di Temukan $didapat record (baris).</p>";
};
}
// akhir fungsi tampil

// --- Fngsi tambah data (Create)
function tambah($pdo){
	
	if (isset($_POST['btn_simpan'])){
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $lahir = $_POST['lahir'];
        $nilai = $_POST['nilai'];
		
		
		if(!empty($nim) && !empty($nama) && !empty($lahir) && !empty($nilai)){
			$sql = "INSERT INTO mhs (nim,nama,lahir,nilai) VALUES(".$nim.",'".$nama."','".$lahir."','".$nilai."')";
			$simpan = $pdo->query($sql);
			if($simpan && isset($_GET['aksi'])){
				if($_GET['aksi'] == 'create'){
					header('location: index.php');
				}
			}
		} else {
			$pesan = "Tidak dapat menyimpan, data belum lengkap!";
		}
	}

echo "
<div class=form-style-2>
<div class=form-style-2-heading></div>
<form action='' method=post>
<label for=field1><span>Nim <span class=required>*</span></span><input type=text class=input-field name=nim value=></label>
<label for=field1><span>Nama <span class=required>*</span></span><input type=text class=input-field name=nama value= ></label>
<label for=field1><span>Lahir <span class=required>*</span></span><input type=text class=input-field name=lahir value= ></label>
<label for=field1><span>Nilai <span class=required>*</span></span><input type=text class=input-field name=nilai value= ></label>
<label><span> </span><input type=submit name=btn_simpan value=Simpan>
					<input type=reset name=reset value=Besihkan></label>
</form>
</div>
";

}
// --- Tutup Fngsi tambah data


// --- Fungsi Delete
function hapus($pdo){

	if(isset($_GET['nim']) && isset($_GET['aksi'])){
		$nim = $_GET['nim'];
		$sql = "DELETE FROM mhs WHERE nim=" . $nim;
		$hapus = $pdo->query($sql);
		
		if($hapus){
			if($_GET['aksi'] == 'delete'){
				header('location: index.php');
			}
		}
	}
	
}
// --- Tutup Fungsi Hapus


// --- Fungsi Ubah Data (Update)
function ubah($pdo){

	// ubah data
	if(isset($_POST['btn_ubah'])){
		$nim = $_POST['nim'];
		$nama = $_POST['nama'];
		$lahir = $_POST['lahir'];
		$nilai = $_POST['nilai'];
		
		
		if(!empty($nim) && !empty($nama) && !empty($lahir) && !empty($nilai)){
			$perubahan = "nama='".$nama."',lahir='".$lahir."',nilai='".$nilai."'";
			$sql = "UPDATE mhs SET ".$perubahan." WHERE nim=$nim";
			
			$update = $pdo->query($sql);
			if($update && isset($_GET['aksi'])){
				if($_GET['aksi'] == 'update'){
					header('location: index.php');
				}
			}
		} else {
			$pesan = "Data tidak lengkap!";
		}
	}
	
	// tampilkan form ubah
	if(isset($_GET['nim'])){
		$nim = $_GET['nim'];

		$sql = "SELECT * FROM mhs WHERE nim=$nim";
		$stmt = $pdo->query($sql);
		$buff = $stmt->fetch();
		$nama = $buff['nama'];
		$namax = htmlentities($nama);
		$lahir = $buff['lahir'];
		$nilai = $buff['nilai'];

		
	
			
			echo "
			<div class=form-style-2>
			<div class=form-style-2-heading></div>
			<form action='' method=post>
			<label for=field1><span>Nim <span class=required>*</span></span><input type=text class=input-field name=nim value='$nim' readonly></label>
			<label for=field1><span>Nama <span class=required>*</span></span><input type=text class=input-field name=nama value='$namax' ></label>
			<label for=field1><span>Lahir <span class=required>*</span></span><input type=text class=input-field name=lahir value='$lahir' ></label>
			<label for=field1><span>Nilai <span class=required>*</span></span><input type=text class=input-field name=nilai value='$nilai' ></label>
			<label><span> </span><input type=submit name=btn_ubah value=Ubah>
								
			</form>
			</div>
";
		
	}
	
}
// --- Tutup Fungsi Update


// --- Program Utama
if (isset($_GET['aksi'])){
	switch($_GET['aksi']){
		case "create":
			echo '<a href="index.php"><input type=button name=Beranda value=Beranda></a>';
			echo '<br>';
			echo '<br>';
            tambah($pdo);
           // tampil_data($pdo);
			break;
		case "read":
			echo '<a href="index.php?aksi=create"><input type=button name="Tambah Data" value="Tambah Data"></a>';
			echo '<br>';
			echo '<br>';
			tampil_data($pdo);
			break;
		case "update":
			ubah($pdo);
			//tampil_data($pdo);
			break;
		case "delete":
			hapus($pdo);
			break;
		default:
			echo "<h3>Aksi <i>".$_GET['aksi']."</i> tidaka ada!</h3>";
			echo '<a href="index.php?aksi=create"><input type=button name="Tambah Data" value="Tambah Data"></a>';
			echo '<br>';
			echo '<br>';
			tampil_data($pdo);
	}
} else {
	//tambah($pdo);
	echo '<a href="index.php?aksi=create"><input type=button name="Tambah Data" value="Tambah Data"></a>';
	echo '<br>';
	echo '<br>';
	
	tampil_data($pdo);
}
?>

</body>
</html>