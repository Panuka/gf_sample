<?php


namespace app\domain\roadmap;


class Operation
{

    /** @var Operation  */
    private $operation;

    /** @var int */
    public $time = null;

    /** @var string  */
    public $comment = '';

    public function __construct($id)
    {
        $this->operation = \app\models\gf\ActiveRecord\Operation::findOne($id);
    }

    /**
     * @return \MongoDB\BSON\ObjectID|string
     */
    public function getOperation()
    {
        return $this->operation;
    }

    public function toArray()
    {
        return ['operation_id' => (string)$this->operation->_id, 'time' => $this->time, 'comment' => $this->comment,
            'title' => $this->operation->title];
    }

}