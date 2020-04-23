<?php
include('koneksitugas.php');
$nisn = $_POST['nisn'];
$nama = $_POST['nama'];
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;

$dompdf = new Dompdf();
$sql = mysqli_query($connprak,"select* from daftarmhs where nisn='".$nisn."' and nama='".$nama."';");
while($row=mysqli_fetch_array($sql)){

$html = '<html><center><h3>Daftar Nama Siswa</h3></center><hr/><br>';
$html .= '<table width="100%">

<tr><td>Nama Lengkap</td><td>:</td><td>'.$row[1].'</td></tr>
<tr><td>NISN</td><td>:</td><td>'.$row[0].'</td></tr>
<tr><td>Email</td><td>:</td><td>'.$row[2].'</td></tr>
<tr><td>Tgl. Registrasi</td><td>:</td><td>'.$row[3].'</td></tr>
<tr><td>No. Telepon</td><td>:</td><td>'.$row[4].'</td></tr>
<tr><td>Jenis Kelamin</td><td>:</td><td>'.$row[5].'</td></tr>
<tr><td>NIK</td><td>:</td><td>'.$row[6].'</td></tr>
<tr><td>Tempat Tgl. Lahir</td><td>:</td><td>'.$row[7].', '.$row[8].'</td></tr>
<tr><td>No. Akta</td><td>:</td><td>'.$row[9].'</td></tr>
<tr><td>Kewarganegaraan</td><td>:</td><td>'.$row[10].'</td></tr>
<tr><td>Asal Negara</td><td>:</td><td>'.$row[11].'</td></tr>
<tr><td>Agama</td><td>:</td><td>'.$row[12].'</td></tr>
<tr><td>Anak ke-</td><td>:</td><td>'.$row[13].'</td></tr>
<tr><td>Berkebutuhan Khusus	</td><td>:</td><td>'.$row[14].'</td></tr>
<tr><td>Jenis Kebutuhan Khusus</td><td>:</td><td>'.$row[15].'</td></tr>
<tr><td>Alamat	</td><td>:</td><td>'.$row[16].'</td></tr>
<tr><td>RT/RW</td><td>:</td><td>'.$row[17].', '.$row[18].'</td></tr>
<tr><td>Dusun, Desa	</td><td>:</td><td>'.$row[19].', '.$row[20].'</td></tr>
<tr><td>Kecamatan</td><td>:</td><td>'.$row[21].'</td></tr>
<tr><td>Kode Pos</td><td>:</td><td>'.$row[22].'</td></tr>
<tr><td>Tempat Tinggal</td><td>:</td><td>'.$row[23].'</td></tr>
<tr><td>Moda Transportas</td><td>:</td><td>'.$row[24].'</td></tr>
<tr><td>No. KKS	</td><td>:</td><td>'.$row[25].'</td></tr>
<tr><td>Penerima KPS</td><td>:</td><td>'.$row[26].'</td></tr>
<tr><td>No. KPS	</td><td>:</td><td>'.$row[27].'</td></tr>
';
}
$html .= "</html>";
$dompdf -> loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf -> setPaper('A4','potrait');
// rendering dari html ke pdf
$dompdf -> render();
// melakukan output file pdf
$dompdf -> stream('datadirimahasiswa.pdf');

?>