<?php


namespace app\domain\operations\dto;


use app\models\gf\ActiveRecord\Operation;

class OperationsDto
{

    /** @var string */
    public $title;

    /** @var string */
    public $id;

    /**
     * OperationsDto constructor.
     * @param string $title
     */
    public function __construct($title, $id)
    {
        $this->title = $title;
        $this->id = $id;
    }

    /**
     * @param Operation $operation
     * @return OperationsDto
     */
    public static function fromAr(Operation $operation)
    {
        return new self($operation->title, (string)$operation->_id);
    }

}
