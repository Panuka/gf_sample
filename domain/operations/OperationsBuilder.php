<?php


namespace app\domain\operations;


use app\domain\operations\dto\OperationsDto;
use app\models\gf\ActiveRecord\Operation;

class OperationsBuilder implements OperationsBuilderInterface
{

    /**
     * @inheritdoc
     */
    public function getAllOperations()
    {
        $operations = Operation::find()->all();
        foreach ($operations as &$operation) {
            $operation = OperationsDto::fromAr($operation);
        }

        return $operations;
    }
}