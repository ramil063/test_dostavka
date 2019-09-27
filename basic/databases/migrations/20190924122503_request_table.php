<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Util\Literal;

class RequestTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    addCustomColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Any other destructive changes will result in an error when trying to
     * rollback the migration.
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $exists = $this->hasTable('users');
        $service = $this->table('service');
        $service->addColumn('name', 'string', ['limit' => 500])
            ->addColumn('code', 'string', ['limit' => 500])
            ->create();

        $request = $this->table('request');
        $request->addColumn('from', 'string', ['limit' => 500])
            ->addColumn('from_geo', 'string', ['limit' => 50])
            ->addColumn('to', 'string', ['limit' => 500])
            ->addColumn('to_geo', 'string', ['limit' => 50])
            ->addColumn('date', 'timestamp')
            ->addColumn('name', 'string', ['limit' => 30])
            ->addColumn('telephone', 'datetime')
            ->addColumn('service_id', 'datetime', ['null' => true])
            // ->addForeignKey(['service_id'], 'service', 'id', [
            //     'delete'=> 'NO_ACTION',
            //     'update'=> 'NO_ACTION'
            // ])
            ->create();
    }
}
