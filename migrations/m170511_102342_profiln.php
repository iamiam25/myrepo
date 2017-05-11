<?php

use yii\db\Migration;

class m170511_102342_profiln extends Migration
{
    public function up()
    {
        $this->createTable('profiln', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'work_day' => $this->integer()->defaultValue(22), //Рабочии дни/мес
            'rest_day' => $this->integer()->defaultValue(14),//отпуск дни
            'work_hour'=> $this->integer()->defaultValue(8),//кол рабочие часы
            'dinner_hour' => $this->integer()->defaultValue(1), //кол часов обеда
            'FIO' => $this->string(255),
            'filial' => $this->string(255)
           // 'general_hour'=> $this->integer()
            ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-profiln-user_id',
            'profiln',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-profiln-user_id',
            'profiln',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        // drops foreign key for table
        $this->dropForeignKey(
            'fk-profiln-user_id',
            'profiln'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-profiln-user_id',
            'profiln'
        );

        $this->dropTable('profiln');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
