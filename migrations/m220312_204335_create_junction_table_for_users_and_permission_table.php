<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users_permission}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%users}}`
 * - `{{%permission}}`
 */
class m220312_204335_create_junction_table_for_users_and_permission_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users_permission}}', [
            'users_id' => $this->integer(),
            'permission_id' => $this->integer(),
            'PRIMARY KEY(users_id, permission_id)',
        ]);

        // creates index for column `users_id`
        $this->createIndex(
            '{{%idx-users_permission-users_id}}',
            '{{%users_permission}}',
            'users_id'
        );

        // add foreign key for table `{{%users}}`
        $this->addForeignKey(
            '{{%fk-users_permission-users_id}}',
            '{{%users_permission}}',
            'users_id',
            '{{%users}}',
            'id',
            'CASCADE'
        );

        // creates index for column `permission_id`
        $this->createIndex(
            '{{%idx-users_permission-permission_id}}',
            '{{%users_permission}}',
            'permission_id'
        );

        // add foreign key for table `{{%permission}}`
        $this->addForeignKey(
            '{{%fk-users_permission-permission_id}}',
            '{{%users_permission}}',
            'permission_id',
            '{{%permission}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%users}}`
        $this->dropForeignKey(
            '{{%fk-users_permission-users_id}}',
            '{{%users_permission}}'
        );

        // drops index for column `users_id`
        $this->dropIndex(
            '{{%idx-users_permission-users_id}}',
            '{{%users_permission}}'
        );

        // drops foreign key for table `{{%permission}}`
        $this->dropForeignKey(
            '{{%fk-users_permission-permission_id}}',
            '{{%users_permission}}'
        );

        // drops index for column `permission_id`
        $this->dropIndex(
            '{{%idx-users_permission-permission_id}}',
            '{{%users_permission}}'
        );

        $this->dropTable('{{%users_permission}}');
    }
}
