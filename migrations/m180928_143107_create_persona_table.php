<?php

use yii\db\Migration;

/**
 * Handles the creation of table `persona`.
 * Has foreign keys to the tables:
 *
 * - `parroquia`
 */
class m180928_143107_create_persona_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('persona', [
            'id' => $this->primaryKey(),
            'cedula' => $this->integer()->unique()->notNull(),
            'nombre' => $this->string(50)->notNull(),
            'apellido' => $this->string(50)->notNull(),
            'id_parroquia' => $this->integer()->notNull(),
            'fecha' => $this->timestamp(),
        ]);

        // creates index for column `id_parroquia`
        $this->createIndex(
            'idx-persona-id_parroquia',
            'persona',
            'id_parroquia'
        );

        // add foreign key for table `parroquia`
        $this->addForeignKey(
            'fk-persona-id_parroquia',
            'persona',
            'id_parroquia',
            'parroquia',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `parroquia`
        $this->dropForeignKey(
            'fk-persona-id_parroquia',
            'persona'
        );

        // drops index for column `id_parroquia`
        $this->dropIndex(
            'idx-persona-id_parroquia',
            'persona'
        );

        $this->dropTable('persona');
    }
}
