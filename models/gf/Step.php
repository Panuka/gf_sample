<?php


namespace app\models\gf;
use app\models\gf\ActiveRecord\Operation;


/**
 * Class represent step of Roadmap - single action \w Stuff&Operation
 */
class Step
{

    /** @var Stuff */
    private $stuff;

    /** @var Operation */
    private $operation;

    /** @var Stuff[] */
    private $stuffAddiction;

    /** @var string */
    private $comment;

    /** @var int */
    private $time;

    /** @var int */
    private $volume;


}