<?php


namespace app\domain\taxonomy;


use app\domain\taxonomy\dto\TaxonomyTreeDto;
use app\models\gf\ActiveRecord\StuffTaxonomy;

class TaxonomyTreeBuilder implements TaxonomyTreeBuilderInterface
{

    /**
     * @inheritdoc
     */
    public function getTaxonomyTree()
    {
        $terms = StuffTaxonomy::find()->all();
        return $this->buildTree($terms);
    }


    /**
     * @param StuffTaxonomy[] $terms
     * @return TaxonomyTreeDto
     */
    private function buildTree($terms)
    {
        $root = new StuffTaxonomy();
        $root->title = 'Catalog';
        $root->_id = '';
        $root->parent_id = -1;
        $root->is_group = true;

        /** @var TaxonomyTreeDto[] $termsDto */
        $termsDto = [];
        $termsDto[] = TaxonomyTreeDto::fromStuffTaxonomy($root);

        foreach ($terms as $term) {
            $termsDto[] = TaxonomyTreeDto::fromStuffTaxonomy($term);
        }

        $new = array();
        foreach ($termsDto as $a) {
            $new[$a->getParentId()][] = $a;
        }

        $tree = $this->createTree($new, array($termsDto[0]));
        $root = array_pop($tree);
        return $root;
    }

    /**
     * @param $list
     * @param TaxonomyTreeDto[] $parent
     * @return array
     */
    private function createTree(&$list, $parent)
    {
        $tree = array();
        foreach ($parent as $k => $l) {
            if (isset($list[$l->getId()])) {
                $l->childs = $this->createTree($list, $list[$l->getId()]);
            }
            $tree[] = $l;
        }
        return $tree;
    }

}