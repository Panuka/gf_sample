<?php

namespace app\models\gf\ActiveRecord;

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
 */
class Roadmap extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function collectionName()
    {
        return ['roadmaps', 'Roadmap'];
    }

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            '_id',
            'steps',
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
            [['steps', 'outVolume', 'uid'], 'safe']
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
            'outVolume' => 'Out Volume',
            'uid' => 'Uid',
        ];
    }
}
