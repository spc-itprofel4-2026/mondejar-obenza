<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBeneficiaryTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'full_name' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => false],
            'address' => ['type' => 'TEXT', 'null' => true],
            'birth_date' => ['type' => 'DATE', 'null' => false],
            'monthly_income' => ['type' => 'DECIMAL', 'constraint' => '10,2', 'null' => false],
            'is_verified' => ['type' => 'TINYINT', 'constraint' => 1, 'null' => true],
            'registered_at' => ['type' => 'DATETIME', 'null' => false],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('beneficiarys');
    }

    public function down()
    {
        $this->forge->dropTable('beneficiarys');
    }
}
