<?php

use yii\db\Migration;

/**
 * Class m191223_144514_create_yemak
 */
class m191223_144514_create_yemak extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%restaurant}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'start_time' => $this->time(),
            'end_time' => $this->time(),
            'phone' => $this->string(),
            'address' => $this->string(),
            'file_name' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);


        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);

        $this->createTable('{{%restaurant_cat}}', [
            'id' => $this->primaryKey(),
            'rest_id' => $this->integer(),
            'cat_id' => $this->integer(),
        ]);


        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'rest_id' => $this->integer(),
            'name' => $this->string(),
            'price' => $this->double(),
            'file_name' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->createTable('{{%product_type}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(),
            'name' => $this->string(),
            'type' => $this->integer(),
            'price' => $this->integer(),
        ]);

        $this->createTable('{{%product_additives}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(),
            'name' => $this->string(),
            'price' => $this->integer(),
        ]);

        // creates index for column `category_id`
        $this->createIndex(
            'idx-restaurand_cat-rest_id',
            '{{%restaurant_cat}}',
            'rest_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-restaurand_cat-rest_id',
            '{{%restaurant_cat}}',
            'rest_id',
            '{{%restaurant}}',
            'id',
            'CASCADE'
        );

        // creates index for column `category_id`
        $this->createIndex(
            'idx-restaurand_cat-cat_id',
            '{{%restaurant_cat}}',
            'cat_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-restaurand_cat-cat_id',
            '{{%restaurant_cat}}',
            'cat_id',
            '{{%category}}',
            'id',
            'CASCADE'
        );

        // creates index for column `category_id`
        $this->createIndex(
            'idx-product-rest_id',
            '{{%product}}',
            'rest_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-product-rest_id',
            '{{%product}}',
            'rest_id',
            '{{%restaurant}}',
            'id',
            'CASCADE'
        );

        // creates index for column `category_id`
        $this->createIndex(
            'idx-product_type-product_id',
            '{{%product_type}}',
            'product_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-product_type-product_id',
            '{{%product_type}}',
            'product_id',
            '{{%product}}',
            'id',
            'CASCADE'
        );

        // creates index for column `category_id`
        $this->createIndex(
            'idx-product_additives-product_id',
            '{{%product_additives}}',
            'product_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-product_additives-product_id',
            '{{%product_additives}}',
            'product_id',
            '{{%product}}',
            'id',
            'CASCADE'
        );




    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191223_144514_create_yemak cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191223_144514_create_yemak cannot be reverted.\n";

        return false;
    }
    */
}
