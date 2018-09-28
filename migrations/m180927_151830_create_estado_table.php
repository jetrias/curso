<?php

use yii\db\Migration;

/**
 * Handles the creation of table `estado`.
 */
class m180927_151830_create_estado_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('estado', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string()->notNull()->unique(),
        ]);
        $this->batchInsert('estado', ['nombre'], [
                                ['Distrito Capital'],
                                ['Miranda']
                                ]);
        $this->execute('ALTER SEQUENCE estado_id_seq RESTART 3');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('estado');
    }
}