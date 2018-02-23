<?php


namespace app\domain\taxonomy\dto;


use app\models\gf\ActiveRecord\StuffTaxonomy;

class TaxonomyTreeDto
{

    /** @var StuffTaxonomy */
    public $stuffTaxonomy;

    /** @var TaxonomyTreeDto[] */
    public $childs;

    public function __construct($stuffTaxonomy, $childs = [])
    {
        $this->stuffTaxonomy = $stuffTaxonomy;
        $this->childs = $childs;
    }

    public function getId()
    {
        return (string)$this->stuffTaxonomy->_id;
    }

    public function getParentId()
    {
        return (string)($this->stuffTaxonomy->parent_id ? $this->stuffTaxonomy->parent_id : '');
    }

    public static function fromStuffTaxonomy(StuffTaxonomy $stuffTaxonomy)
    {
        return new self($stuffTaxonomy);
    }

    public function toInlineArray()
    {
        $line = [];
        $line = $this->internalInlineArray($this, $line);
        return $line;
    }

    public function toArray()
    {
        return $this->internalArray($this);
    }

    public function printDto()
    {
        $this->out($this);
    }


    private function out($dto)
    {
        echo "Категория: " . $dto->stuffTaxonomy->title;
        foreach ($dto->childs as $child) {
            $this->out($child);
        }
    }

    private function internalInlineArray(self $dto, array &$line, $level = 0)
    {
        $fields = $dto->stuffTaxonomy->getPublicFields();;
        $fields['level'] = $level;
        $line[] = $fields;
        foreach ($dto->childs as $child) {
            $this->internalInlineArray($child, $line, ($level + 1));
        }
        return $line;

    }

    private function internalArray(self $dto)
    {
        return [
            'element' => $dto->stuffTaxonomy->getPublicFields(),
            'childs' => array_map(function ($childs) {
                $newChilds = [];
                $newChilds[] = $this->internalArray($childs);
                return $newChilds;
            }, $dto->childs)
        ];
    }

}