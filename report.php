<?php
include('koneksi.php');
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$sql = mysqli_query($connsiswa,"select* from tb_siswa");
$html = '<center><h3>Daftar Nama Siswa</h3></center><hr/><br>';
$html .= '<table border="1" width="100%">
<tr>
<th> No. </th>
<th> Nama </th>
<th> kelas </th>
<th> Alamat </th>
</tr>';

$no = 1;
while($row=mysqli_fetch_array($sql)){
	$html .= "<tr>
	<td>".$row['nama']."</td>
	<td>".$row['kelas']."</td>
	<td>".$row['alamat']."</td>
	</tr>";
	$no++;
}
$html .= "</html>";
$dompdf -> loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf -> setPaper('A4','potrait');
// rendering dari html ke pdf
$dompdf -> render();
// melakukan output file pdf
$dompdf -> stream('laporan_siswa.pdf');
?>