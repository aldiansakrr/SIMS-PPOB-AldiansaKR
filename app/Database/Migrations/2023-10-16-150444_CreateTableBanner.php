<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableBanner extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'banner_id' => [
                'type' => 'INT',
                'constraint' => '11',
                'auto_increment' => true
            ],
            'banner_name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'banner_image' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'description' => [
                'type' => 'TEXT'
            ]
        ]);

        $this->forge->addPrimaryKey('banner_id');
        $this->forge->createTable('banner');
    }

    public function down()
    {
        $this->forge->dropTable('banner');
    }
}
