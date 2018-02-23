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

    /** @var ObjectID|string  */
    public $_id;

    /** @var string */
    public $title;

    /** @var Step[]  */
    public $steps = [];

    /** @var int  */
    public $outVolume = 0;

    /** @var string  */
    public $uid;

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


    public static function getStub() {

    }
}



























