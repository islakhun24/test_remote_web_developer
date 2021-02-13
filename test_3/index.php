<?php
$data = [
    ["id" => 1,
    "nama_produk" => "Love is on the way",
    "vendor" => "Henry",
    "id_kota" => 1,
    "kota" => "Semarang",
    "id_kategori" => 2,
    "kategori" => "Hand Bouquet"],
    ["id" => 2,
    "nama_produk" => "Love is the first sight",
    "vendor" => "Ariani",
    "id_kota" => 1,
    "kota" => "Semarang",
    "id_kategori" => 2,
    "kategori" => "Hand Bouquet"],
    ["id" => 3,
    "nama_produk" => "Love Birds",
    "vendor" => "Siti",
    "id_kota" => 1,
    "kota" => "Semarang",
    "id_kategori" => 1,
    "kategori" => "Table Bouquet"],
    ["id" => 4,
    "nama_produk" => "Twisted Sisters",
    "vendor" => "Tami",
    "id_kota" => 1,
    "kota" => "Semarang",
    "id_kategori" => 1,
    "kategori" => "Table Bouquet"],
    ["id" => 5,
    "nama_produk" => "Floral Fancy",
    "vendor" => "Retno",
    "id_kota" => 2,
    "kota" => "Jogja",
    "id_kategori" => 1,
    "kategori" => "Table Bouquet"],
    ["id" => 6,
    "nama_produk" => "The Perfection",
    "vendor" => "Maya",
    "id_kota" => 2,
    "kota" => "Jogja",
    "id_kategori" => 1,
    "kategori" => "Table Bouquet"],
];

 function groupArray(array $arr, $group, $subgroup): array
{
    $result = [];
    foreach ($arr as $key => $value) {
        $result[$value[$group]][$value[$subgroup]][] = $arr[$key];
    }
    return $result;
}
print_r(json_encode(groupArray($data, 'kota', 'kategori')));

?>