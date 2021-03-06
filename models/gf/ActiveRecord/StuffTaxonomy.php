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
 * @property bool $is_group
 * @property StuffTaxonomy $parent
 * @property int $parent_id
 */
class StuffTaxonomy extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function collectionName()
    {
        return ['gf', 'stuff'];
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
            'parent_id',
            'is_group',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'measure', 'parent_id', 'is_group'], 'safe'],
            ['is_group', 'boolean']
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
            'is_group' => 'Is group',
        ];
    }

    /**
     * @return array
     */
    public static function getCategories() {
        return self::find()->select(['_id', 'title'])->where(['is_group'=>true])->all();
    }

    /**
     * @return array
     */
    public static function getCategoriesComplit() {
        /** @var StuffTaxonomy[] $cats */
        $cats = self::getCategories();
        $result = [];
        foreach ($cats as $cat) {
            $result[(string)$cat->_id] = $cat->title;
        }
        return $result;
    }

    public function getParent() {
        return $this->hasOne(StuffTaxonomy::class, ['_id' => 'parent_id']);
    }

    /**
     * @return StuffTaxonomy
     */
    public function getParentEntity() {
        return $this->parent;
    }

    public function __toString()
    {
        return $this->title;
    }

    public function beforeValidate()
    {
        $this->is_group = (bool)$this->is_group;
        return parent::beforeValidate(); // TODO: Change the autogenerated stub
    }

    public function getPublicFields() {
        return [
            'title' => $this->title,
            'measure' => $this->measure,
            '_id' => (string)$this->_id,
            'is_group' => $this->is_group,
        ];
    }

}
