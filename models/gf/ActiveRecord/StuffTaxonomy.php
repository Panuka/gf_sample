<?php

namespace app\models\gf\ActiveRecord;


use MongoDB\BSON\ObjectID;
use yii\mongodb\ActiveRecord;

/**
 * Class represent element of nomenclature as taxonomy
 *
 * @property ObjectID|string $_id
 * @property string $title
 * @property string $measure
 * @property StuffTaxonomy $parent
 */
class StuffTaxonomy extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function collectionName()
    {
        return ['stuff', 'Stuff'];
    }

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            '_id',
            'title',
            'measure',
            'parent',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'measure', 'parent'], 'safe']
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
            'measure' => 'Measure',
            'parent' => 'Parent',
        ];
    }
}
