<?php

namespace app\application\roadmap\dto;

use app\domain\operations\dto\OperationsDto;
use app\domain\taxonomy\dto\TaxonomyTreeDto;

class CatalogsDto
{

    /** @var OperationsDto[]  */
    public $operationsDto;

    /** @var TaxonomyTreeDto  */
    public $taxonomyDto;

    /**
     * CatalogsDto constructor.
     * @param OperationsDto[] $operationsDto
     * @param TaxonomyTreeDto $taxonomyDto
     */
    public function __construct($operationsDto, TaxonomyTreeDto $taxonomyDto)
    {
        $this->operationsDto = $operationsDto;
        $this->taxonomyDto = $taxonomyDto;
    }

}