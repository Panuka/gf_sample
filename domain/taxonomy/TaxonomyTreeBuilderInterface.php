<?php


namespace app\domain\taxonomy;


use app\domain\taxonomy\dto\TaxonomyTreeDto;

interface TaxonomyTreeBuilderInterface
{

    /**
     * @return TaxonomyTreeDto
     */
    public function getTaxonomyTree();

}