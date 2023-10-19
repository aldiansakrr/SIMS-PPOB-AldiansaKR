<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableService extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'service_code' => [
                'type' => 'VARCHAR',
                'constraint' => '20'
            ],
            'service_name' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'service_icon' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'service_tariff' => [
                'type' => 'INT',
                'constraint' => '11'
            ]
        ]);

        $this->forge->addPrimaryKey('service_code');
        $this->forge->createTable('service');
    }

    public function down()
    {
        $this->forge->dropTable('service');
    }
}
