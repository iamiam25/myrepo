<?php

use yii\db\Migration;

class m170511_102407_tabel extends Migration
{
    public function up()
    {

        $this->createTable('tabel', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11), //польз
			'date1' => $this->integer(11),// дата			
            'start_d' => $this->integer(11), //приход
            'end_d' => $this->integer(11),// уход
			'worked' => $this->integer(11),// отработано
			'type_d' => $this->integer(3), //тип дня раб
			'dop_time' => $this->integer(11), //
           // 'description' => $this->string(250) //описание
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-tabel-user_id',
            'tabel',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-tabel-user_id',
            'tabel',
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
            'fk-tabel-user_id',
            'tabel'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-tabel-user_id',
            'tabel'
        );

        $this->dropTable('tabel');
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
