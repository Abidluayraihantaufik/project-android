<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProductsMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'null'       => false,
                'auto_increment' => true,
            ],
            'kode_produk' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false
            ],
            'nama_produk' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false
            ],
            'harga' => [
                'type'       => 'INT',
                'null'       => false
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('products');
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}
