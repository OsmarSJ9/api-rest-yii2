<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%permission}}`.
 */
class m220312_201409_create_permission_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%permission}}', [
            'id' => $this->primaryKey(),
            'description' => $this->string(255),
            'is_staff' => $this->boolean(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%permission}}');
    }
}
