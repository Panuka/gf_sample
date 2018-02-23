<?php


namespace app\domain\roadmap;


use app\models\gf\ActiveRecord\StuffTaxonomy;

class Taxonomy
{

    /** @var Taxonomy  */
    private $taxonomy;

    /** @var int */
    public $count;

    /**
     * Taxonomy constructor.
     * @param $id
     */
    public function __construct($id)
    {
        $this->taxonomy = StuffTaxonomy::findOne($id);
    }

    public function toArray()
    {
        return [
            'stuff_id' => $this->taxonomy->_id,
            'count' => $this->count,
            'title' => $this->taxonomy->title,
            'measure' => $this->taxonomy->measure,
        ];
    }
}