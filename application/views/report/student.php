<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<table>
    <tr>
        <td style="text-align:center;font-size: 14px;font-weight: bold ">Pendaftaran Santri</td>
    </tr>
</table>
<br>
<br>
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        font-size: 12px;
    }
    th {
        font-weight: bold;
    }
</style>

<table style="width: 100%;">
    <tr >
        <th style="font-weight: bold;">Nama Pendaftar</th>
        <td><?= $name ?></td>
    </tr>
    <tr >
        <th style="font-weight: bold;">Jenis Kelamin</th>
        <td><?= $gender ?></td>
    </tr>
    <tr >
        <th style="font-weight: bold;">Tempat, Tanggal Lahir</th>
        <td><?= $ttl ?></td>
    </tr>
    <tr >
        <th style="font-weight: bold;">Alamat</th>
        <td><?= $address ?></td>
    </tr>
    <tr >
        <th style="font-weight: bold;">Nomor Telepon</th>
        <td><?= $phone ?></td>
    </tr>
    <tr >
        <th style="font-weight: bold;">Pendidikan</th>
        <td><?= $study ?></td>
    </tr>
    <tr >
        <th style="font-weight: bold;">Nama Orang Tua/Wali</th>
        <td><?= $parent_name ?></td>
    </tr>
    <tr >
        <th style="font-weight: bold;">Pekerjaan Orang Tua/Wali</th>
        <td><?= $parent_job ?></td>
    </tr>
    <tr >
        <th style="font-weight: bold;">Tanggal Registrasi</th>
        <td><?= $entry_date ?></td>
    </tr>
    <tr >
        <th style="font-weight: bold;">Status</th>
        <td><?= $status ?></td>
    </tr>
    <tr >
        <th style="font-weight: bold;">Nomor Induk</th>
        <td><?= $registration_number ?></td>
    </tr>

</table>

<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////// -->