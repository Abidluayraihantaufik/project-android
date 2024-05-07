<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductsModel extends Model
{
    protected $table            = 'products';
    protected $allowedFields    = ['kode_produk', 'nama_produk', 'harga'];

    function addProducts($kode, $nama, $harga)
    {
        $data = [
            'kode_produk' => $kode,
            'nama_produk' => $nama,
            'harga'       => $harga
        ];

        return $this->insert($data, true);
    }

    function getProductById($productId)
    {
        return $this->where('id', $productId)->first();
    }

    function editProductById($productId, $kodeProduk, $namaProduk, $hargaProduk)
    {
        $data = [
            'kode_produk' => $kodeProduk,
            'nama_produk' => $namaProduk,
            'harga'       => $hargaProduk
        ];

        $this->set($data)->where('id', $productId)->update();
    }

    function deleteProductById($productId)
    {
        $this->delete($productId);
    }

    function getProducts()
    {
        return $this->findAll();
    }
}
