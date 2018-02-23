<?php


namespace app\domain\operations;


use app\domain\operations\dto\OperationsDto;

interface OperationsBuilderInterface
{

    /**
     * @return OperationsDto[]
     */
    public function getAllOperations();

}