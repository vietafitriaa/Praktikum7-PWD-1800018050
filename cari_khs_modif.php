<?php
include 'koneksi.php';
?>
<h3>Form Pencarian DATA KHS Dengan PHP </h3>
<form action="" method="get">
    <label>Cari :</label>
    <input type="text" name="cari">
    <input type="submit" value="Cari">
</form>
<?php
if (isset($_GET['cari'])) {
    $cari = $_GET['cari'];
    echo "<b>Hasil pencarian : " . $cari . "</b>";
}
?>
<table border="1">
    <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama Mahasiswa</th>
        <th>Kode MK</th>
        <th>Nama MK</th>
        <th>Nilai</th>
    </tr>
    <?php
    if (isset($_GET['cari'])) {
        $cari = $_GET['cari'];
        $sql = "  SELECT * FROM khs INNER JOIN matakuliah ON matakuliah.kode=khs.kodeMK 
        INNER JOIN mahasiswa ON mahasiswa.nim=khs.NIM WHERE khs.NIM like'%" . $cari . "%'";
        $tampil = mysqli_query($koneksi, $sql);
    } else {
        $sql = "SELECT * FROM khs INNER JOIN matakuliah ON matakuliah.kode=khs.kodeMK 
        INNER JOIN mahasiswa ON mahasiswa.nim=khs.NIM";
        $tampil = mysqli_query($koneksi, $sql);
    }
    $no = 1;
    while ($r = mysqli_fetch_array($tampil)) {
    ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $r['nim']; ?></td>
            <td><?php echo $r['nama']; ?></td>
            <td><?php echo $r['kodeMK']; ?></td>
            <td><?php echo $r['namamk']; ?></td>
            <td><?php echo $r['nilai']; ?></td>
        </tr>
    <?php } ?>
</table>