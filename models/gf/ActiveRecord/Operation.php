<?php

namespace app\models\gf\ActiveRecord;

use MongoDB\BSON\ObjectID;
use yii\mongodb\ActiveRecord;

/**
 * Class represents Operation entity as AR
 *
 * @property ObjectID|string $_id
 * @property string $title
 */
class Operation extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function collectionName()
    {
        return ['operations', 'Operations'];
    }

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            '_id',
            'title',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'title' => 'Title',
        ];
    }
}
