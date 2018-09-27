<?php

use yii\db\Migration;

/**
 * Handles the creation of table `parroquia`.
 * Has foreign keys to the tables:
 *
 * - `municipioid`
 */
class m180927_153332_create_parroquia_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('parroquia', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string()->notNull(),
            'id_municipio' => $this->integer()->notNull(),
        ]);

        // creates index for column `id_municipio`
        $this->createIndex(
            'idx-parroquia-id_municipio',
            'parroquia',
            'id_municipio'
        );

        // add foreign key for table `municipioid`
        $this->addForeignKey(
            'fk-parroquia-id_municipio',
            'parroquia',
            'id_municipio',
            'municipioid',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `municipioid`
        $this->dropForeignKey(
            'fk-parroquia-id_municipio',
            'parroquia'
        );

        // drops index for column `id_municipio`
        $this->dropIndex(
            'idx-parroquia-id_municipio',
            'parroquia'
        );

        $this->dropTable('parroquia');
    }
}
