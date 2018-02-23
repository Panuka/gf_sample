<?php


namespace app\models\gf;

use app\domain\roadmap\Operation;
use app\domain\roadmap\Taxonomy;


/**
 * Class represent step of Roadmap - single action \w Stuff&Operation
 */
class Step
{

    /** @var Taxonomy */
    private $stuff;

    /** @var Operation[] */
    private $operations;

    /** @var Taxonomy[] */
    private $stuffAddiction;

    public $qwe = '123';

    /**
     * Step constructor.
     * @param Taxonomy $stuff
     * @param Operation[] $operations
     * @param Taxonomy[] $stuffAddiction
     */
    public function __construct(Taxonomy $stuff=null, array $operations=[], array $stuffAddiction=[])
    {
        $this->stuff = $stuff;
        $this->operations = $operations;
        $this->stuffAddiction = $stuffAddiction;
    }

    public function toArray()
    {
        return [
            'stuff'=> $this->stuff?$this->stuff->toArray():null,
            'operations' => array_map(function(Operation $el) {return $el->toArray();}, $this->operations),
            'stuffAddiction' => array_map(function(Taxonomy $el) {return $el->toArray();}, $this->stuffAddiction),
        ];
    }


}