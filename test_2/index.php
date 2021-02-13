<?php
    require "./koneksi.php";

    $sql = "SELECT *
    FROM produk p
      JOIN vendor_produk vp ON p.id=vp.id_produk
      JOIN vendor v ON vp.id=v.id";

    $query = mysqli_query($koneksi, $sql) or die($koneksi);
    $res = array();
    while($row = mysqli_fetch_array($query)){
        // $res['vendor'] => $row['nama_vendor'];
        // $res['produk'] => $row['kota'];
        $produk = array(
            'vendor' => $row['nama_vendor'],
            'produk' => $row['kota']
        );

         array_push($res, $produk);
    }

    echo json_encode($res);
?>