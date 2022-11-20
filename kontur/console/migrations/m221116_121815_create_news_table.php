<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m221116_121815_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%kontur_users}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(100),
            'phone' => $this->string(11),
            'email' => $this->string(100),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%kontur_users}}');
    }
}
