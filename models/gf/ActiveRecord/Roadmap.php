<?php

namespace app\models\gf\ActiveRecord;

use app\domain\roadmap\Taxonomy;
use app\models\gf\Step;
use MongoDB\BSON\ObjectID;
use yii\mongodb\ActiveRecord;

/**
 * Class represents Roadmap entity as AR
 *
 * @property ObjectID|string $_id
 * @property Step[] $steps
 * @property int $outVolume
 * @property string $uid
 * @property string $title
 */
class Roadmap extends ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function collectionName()
    {
        return ['gf', 'roadmap'];
    }

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            '_id',
            'steps',
            'title',
            'outVolume',
            'uid',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['steps', 'outVolume', 'title', 'uid'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'steps' => 'Steps',
            'title' => 'Title',
            'outVolume' => 'Out Volume',
            'uid' => 'Uid',
        ];
    }
}



























