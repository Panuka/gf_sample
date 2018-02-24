<?php


namespace app\infrastructure\assemblers;


use app\application\roadmap\dto\CatalogsDto;
use app\application\roadmap\dto\CatalogsDtoAssemblerInterface;
use app\domain\operations\OperationsBuilderInterface;
use app\domain\taxonomy\TaxonomyTreeBuilderInterface;

class CatalogsDtoAssembler implements CatalogsDtoAssemblerInterface
{
    /** @var TaxonomyTreeBuilderInterface  */
    private $taxonomyTreeDtoBuilder;

    /** @var OperationsBuilderInterface  */
    private $operationsBuilder;

    /**
     * @param TaxonomyTreeBuilderInterface $taxonomyTreeBuilder
     * @param OperationsBuilderInterface $operationsBuilder
     */
    public function __construct(TaxonomyTreeBuilderInterface $taxonomyTreeBuilder, OperationsBuilderInterface $operationsBuilder)
    {
        $this->taxonomyTreeDtoBuilder = $taxonomyTreeBuilder;
        $this->operationsBuilder = $operationsBuilder;
    }

    /**
     * @inheritdoc
     */
    public function build()
    {
        return new CatalogsDto($this->operationsBuilder->getAllOperations(), $this->taxonomyTreeDtoBuilder->getTaxonomyTree());
    }
}