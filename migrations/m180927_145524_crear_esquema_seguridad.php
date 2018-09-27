<?php

use yii\db\Migration;

/**
 * Class m180927_145524_crear_esquema_seguridad
 */
class m180927_145524_crear_esquema_seguridad extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('CREATE SCHEMA seguridad');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->execute('DROP SCHEMA seguridad');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180927_145524_crear_esquema_seguridad cannot be reverted.\n";

        return false;
    }
    */
}
