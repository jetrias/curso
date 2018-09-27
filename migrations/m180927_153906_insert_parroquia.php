<?php

use yii\db\Migration;

/**
 * Class m180927_153906_insert_parroquia
 */
class m180927_153906_insert_parroquia extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('parroquia', ['id', 'nombre', 'id_municipio'], [
        [1, 'Altagracia', 1],
        [2, 'Antimano', 1],
        [3, 'Cúa', 2],
        [4, 'Nueva Cúa', 2],
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180927_153906_insert_parroquia cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180927_153906_insert_parroquia cannot be reverted.\n";

        return false;
    }
    */
}
