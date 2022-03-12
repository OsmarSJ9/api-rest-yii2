<?php

use yii\db\Migration;

/**
 * Class m220312_183655_create_table_usuarios
 */
class m220312_183655_create_table_usuarios extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
            'lastname' => $this->string()->notNull(),
            'age' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220312_183655_create_table_usuarios cannot be reverted.\n";

        return false;
    }
    */
}
