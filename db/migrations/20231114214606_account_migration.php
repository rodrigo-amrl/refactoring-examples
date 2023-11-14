<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class AccountMigration extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $table = $this->table('accounts', ['id' => false, 'primary_key' => ['account_id']]);
        $table->addColumn('account_id', 'uuid', ['null' => false])
            ->addColumn('name', 'string', ['limit' => 100])
            ->addColumn('email', 'string', ['limit' => 100])
            ->addColumn('cpf', 'string', ['limit' => 20])
            ->addColumn('car_plate', 'string', ['limit' => 20])
            ->addColumn('is_passenger', 'boolean')
            ->addColumn('is_driver', 'boolean')
            ->addColumn('is_verified', 'boolean')
            ->addColumn('verification_code', 'string', ['limit' => 70])
            ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->create();
    }
}
