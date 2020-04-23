<?php
include('koneksitugas.php');
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;

$dompdf = new Dompdf();
$sql = mysqli_query($connprak,"select* from daftarmhs");
$html = '<center><h3>Daftar Nama Siswa</h3></center><hr/><br>';
$html .= '<table border="1" width="100%">
<tr>
<th> No. </th>
<th> Nama </th>
<th> NISN </th>
<th> Email </th>
<th> Tgl. Registrasi </th>
<th> No. Telepon </th>
<th> Jenis Kelamin </th>
<th> NIK </th>
<th> Tempat Tgl. Lahir </th>
<th> No. Akta </th>
<th> Kewarganegaraan </th>
<th> Asal Negara </th>
<th> Agama </th>
<th> Anak ke- </th>
<th> Berkebutuhan Khusus </th>
<th> Jenis Kebutuhan Khusus </th>
<th> Alamat </th>
<th> RT/RW </th>
<th> Dusun, Desa </th>
<th> Kecamatan </th>
<th> Kode Pos </th>
<th> Tempat Tinggal </th>
<th> Moda Transportasi </th>
<th> No. KKS </th>
<th> Penerima KPS </th>
<th> No. KPS </th>
</tr>';

$no = 1;
while($row=mysqli_fetch_array($sql)){
	$html .= "<tr>
	<td>".$no."</td>
	<td>".$row['nama']."</td>
	<td>".$row['nisn']."</td>
	<td>".$row['email']."</td>
	<td>".$row['tglregis']."</td>
	<td>".$row['no_telp']."</td>
	<td>".$row['jeniskel']."</td>
	<td>".$row['nik']."</td>
	<td>".$row['tempat_lahir'].", ".$row['tgl_lahir']."</td>
	<td>".$row['no_akta']."</td>
	<td>".$row['kewarganegaraan']."</td>
	<td>".$row['negara']."</td>
	<td>".$row['agama']."</td>
	<td>".$row['anak']."</td>
	<td>".$row['kebutuhan_khusus']."</td>
	<td>".$row['jeniskebutuhan']."</td>
	<td>".$row['alamat']."</td>
	<td>".$row['rt']."/".$row['rw']."</td>
	<td>".$row['dusun'].", ".$row['desa']."</td>
	<td>".$row['kecamatan']."</td>
	<td>".$row['kdpos']."</td>
	<td>".$row['kepemilikan']."</td>
	<td>".$row['transport']."</td>
	<td>".$row['no_kks']."</td>
	<td>".$row['kps']."</td>
	<td>".$row['no_kps']."</td>
	</tr>";
	$no++;
}

$html .= "</html>";
$dompdf -> loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf -> setPaper('A3','landscape');
// rendering dari html ke pdf
$dompdf -> render();
// melakukan output file pdf
$dompdf -> stream('laporan_siswa.pdf');

header("location:index.php");
?>