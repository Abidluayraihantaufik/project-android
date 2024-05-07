<?php

namespace App\Controllers;

use App\Models\ProductsModel;

class ProductsController extends RestfullController
{
    protected $productsModel;

    function __construct()
    {
        $this->productsModel = new ProductsModel();
    }

    public function create()
    {
        $kodeProduk = $this->request->getVar('kode_produk');
        $namaProduk = $this->request->getVar('nama_produk');
        $hargaProduk = $this->request->getVar('harga');

        $productId = $this->productsModel->addProducts($kodeProduk, $namaProduk, $hargaProduk);
        $product = $this->productsModel->getProductById($productId);

        return $this->response(200, 'success', [
            ...$product
        ]);
    }

    public function updateProductById($id)
    {
        $kodeProduk = $this->request->getVar('kode_produk');
        $namaProduk = $this->request->getVar('nama_produk');
        $hargaProduk = $this->request->getVar('harga');

        $this->productsModel->editProductById($id, $kodeProduk, $namaProduk, $hargaProduk);

        return $this->response(200, 'success', 'Produk berhasil diubah.');
    }

    public function detailProductById($id)
    {
        $product = $this->productsModel->getProductById($id);

        return $this->response(200, 'success', $product);
    }

    public function removeProductById($id)
    {
        $product = $this->productsModel->getProductById($id);

        if (!$product) {
            return $this->response(404, 'fail', 'Produk gagal dihapus. Id tidak ditemukan');
        }

        $this->productsModel->deleteProductById($id);

        return $this->response(200, 'success', 'Produk berhasil dihapus.');
    }

    public function getAllProducts()
    {
        $products = $this->productsModel->getProducts();

        return $this->response(200, 'success', $products);
    }
}
