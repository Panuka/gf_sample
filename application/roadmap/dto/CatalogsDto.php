<?php

namespace app\application\roadmap\dto;

class CatalogsDto
{

    public $operationsDto;

    public $taxonomyDto;

    /**
     * CatalogsDto constructor.
     * @param \app\domain\operations\dto\OperationsDto $operationsDto
     * @param \app\domain\taxonomy\dto\TaxonomyTreeDto $taxonomyDto
     */
    public function __construct($operationsDto, $taxonomyDto)
    {
        $this->operationsDto = $operationsDto;
        $this->taxonomyDto = $taxonomyDto;
    }

}