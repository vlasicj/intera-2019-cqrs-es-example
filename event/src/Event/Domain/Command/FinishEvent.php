<?php

use Prooph\Common\Messaging\Command;

use Event\Domain\Value\EventId;
use Event\Domain\Value\EventType;


final class FinishEvent extends Command
{

    /**
     * @var \Event\Domain\Value\EventId
     */
    private $id;

    /**
     * @var \Event\Domain\Value\EventType
     */
    private $type;


    private function __construct(EventId $id, EventType $type)
    {
        $this->init();

        $this->id = $id;
        $this->type = $type;
    }

    public static function fromFeedEntry(EventId $id, EventType $type) : self
    {
        return new self($id, $type);
    }

    /**
     * @return EventId
     */
    public function id(): EventId
    {
        return $this->id;
    }

    /**
     * @return EventType
     */
    public function type(): EventType
    {
        return $this->type;
    }

    /**
     * {@inheritDoc}
     */
    public function payload() : array
    {
        return [
            'id' => $this->id->toString(),
            'type' => $this->type->toString(),
        ];
    }
}
