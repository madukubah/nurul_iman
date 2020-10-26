<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<table>
    <tr>
        <td style="text-align:center;font-size: 14px;font-weight: bold ">Pendaftaran Santri Baru</td>
    </tr>
</table>
<br>
<br>
<table>
    <tr>
        <td style="text-align:center;font-size: 13px;font-weight: bold ">No Induk : ______________</td>
    </tr>
    <tr>
        <td style="text-align:center;font-size: 13px;font-weight: bold ">Tanggal Registrasi :  <?= $entry_date ?></td>
    </tr>
</table>
<br>
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<style>
    table, th, td {
        border: none;
        border-collapse: collapse;
        font-size: 12px;
    }

    p, ol, li {
        font-size: 12px;
    }

    th {
        /* font-weight: bold; */
    }
</style>
<h2>A. <u>Santri</u></h2>
<table style="width: 100%;"  >
    <tr >
        <th Masjid>Nama Pendaftar</th>
        <td>: <?= $name ?></td>
    </tr>
    <tr >
        <th Masjid>Tempat, Tanggal Lahir</th>
        <td>: <?= $ttl ?></td>
    </tr>
    <tr >
        <th Masjid>Jenis Kelamin</th>
        <td>: <?= $gender ?></td>
    </tr>
    <tr >
        <th Masjid>Nomor Telepon</th>
        <td>: <?= $phone ?></td>
    </tr>
    <tr >
        <th Masjid>Pendidikan</th>
        <td>: <?= $study ?></td>
    </tr>
    <tr >
        <th Masjid>Alamat</th>
        <td>: <?= $address ?></td>
    </tr>
    <!-- <tr >
        <th Masjid>Tanggal Registrasi</th>
        <td>: <?= $entry_date ?></td>
    </tr> -->
    <!-- <tr >
        <th Masjid>Status</th>
        <td>: <?= $status ?></td>
    </tr> -->
</table>

<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<h2>B. <u>Orang Tua Wali</u></h2>
<table style="width: 100%;"  >
    <tr >
        <th Masjid>Nama Orang Tua/Wali</th>
        <td>: <?= $parent_name ?></td>
    </tr>
    <tr >
        <th Masjid>Tempat, Tanggal Lahir</th>
        <td>: <?= $parent_ttl ?></td>
    </tr>
    <tr >
        <th Masjid>Pekerjaan Orang Tua/Wali</th>
        <td>: <?= $parent_job ?></td>
    </tr>
    <tr >
        <th Masjid>Pendidikan Terakhir</th>
        <td>: <?= $parent_study ?></td>
    </tr>
    <tr >
        <th Masjid>Alamat Orang Tua/Wali</th>
        <td>: <?= $parent_address ?></td>
    </tr>
    <tr >
        <th Masjid>Nomor Telepon Orang Tua/Wali</th>
        <td>: <?= $parent_phone ?></td>
    </tr>
</table>
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<p>
    Dengan ini Memohon didaftar sebagai santri TPA Nurul Iman dan sanggup memenuhi syarat syarat sebagai berikut : 
</p>
<ol>
    <li>
        Menbayar Uang Pendaftaran sebesar Rp. 75.000,-
    </li>
    <li>
        Membayar Uang SPP sebesar Rp. 300.000,- / Semester atau Rp. 50.000,- / Bulan
    </li>
    <li>
        Meyerahkan pas foto ukuran 3 X 4 cm 2 Lembar
    </li>
    <li>
        Mematuhi tata tertib yang berlaku
    </li>
</ol>

<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<br>
<br>
<br>
<table style="width: 100%;"  >
    <tr >
        <td style="width: 30%;" ></td>
        <td style="width: 20%;" > </td>
        <td style="width: 40%;" >Kendari, _________________________</td>
    </tr>
</table>
<br>
<br>
<table style="width: 100%;"  >
    <tr >
        <td style="width: 30%;" >Pengurus TPS Nurul Iman</td>
        <td style="width: 30%;" > </td>
        <td style="width: 30%;" >Orang Tua/Wali Santri</td>
    </tr>
</table>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<table style="width: 100%;"  >
    <tr >
        <td style="width: 30%;" >_________________________</td>
        <td style="width: 30%;" > </td>
        <td style="width: 30%;" >_________________________</td>
    </tr>
</table>
<br><br>
<p>
    Catatan : 
</p>
<ol>
    <li>
        Calon santri baru diantar oleh orang tua / wali pada saat pertama masuk mengaji 
    </li>
    <li>
        Perlengkapan yang harus disiapkan berupa Buku Iqra,  Alat Tulis dan  Alat Menggambar
    </li>
</ol>