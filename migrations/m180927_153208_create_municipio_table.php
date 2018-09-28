<?php

use yii\db\Migration;

/**
 * Handles the creation of table `municipio`.
 * Has foreign keys to the tables:
 *
 * - `estado`
 */
class m180927_153208_create_municipio_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('municipio', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string()->notNull(),
            'id_estado' => $this->integer()->notNull(),
        ]);

        // creates index for column `id_estado`
        $this->createIndex(
            'idx-municipio-id_estado',
            'municipio',
            'id_estado'
        );

        // add foreign key for table `estado`
        $this->addForeignKey(
            'fk-municipio-id_estado',
            'municipio',
            'id_estado',
            'estado',
            'id',
            'CASCADE'
        );
        $this->batchInsert('municipio', ['id', 'nombre', 'id_estado'], [
                    [1, 'Libertador', 1],
                    [2, 'Urdaneta', 2]
                    ]);
        $this->execute('ALTER SEQUENCE municipio_id_seq RESTART 3');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `estado`
        $this->dropForeignKey(
            'fk-municipio-id_estado',
            'municipio'
        );

        // drops index for column `id_estado`
        $this->dropIndex(
            'idx-municipio-id_estado',
            'municipio'
        );

        $this->dropTable('municipio');
    }
}
