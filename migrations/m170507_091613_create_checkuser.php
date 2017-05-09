<?php

use yii\db\Migration;

class m170507_091613_create_checkuser extends Migration
{
    public function up()
    {
        $this->createTable('checkuser', [
            'id' => $this->primaryKey(),
            'user_id' =>$this->integer(),
            'comment' =>$this->string(250),
            'checkin' =>$this->integer(11),
            'status' => $this->integer(3)->defaultValue(0)
        ]);


        // creates index for column `user_id`
        $this->createIndex(
            'idx-checkuser-user_id',
            'checkuser',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-checkuser-user_id',
            'checkuser',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-checkuser-user_id',
            'checkuser'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-checkuser-user_id',
            'checkuser'
        );

        $this->dropTable('checkuser');
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
