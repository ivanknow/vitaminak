<?php
declare(strict_types=1);

namespace App\Domain\Food;

use JsonSerializable;

class Food implements JsonSerializable
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string
     */
    private $desc;

    /**
     * @var string
     */
    private $link;

    /**
     * @var double
     */
    private $vitaminak;

    /**
     * @param int|null  $id
     * @param string    $desc
     * @param string    $link
     * @param double    $vitaminak
     */
    public function __construct(?int $id, string $desc, string $link, double $vitaminak)
    {
        $this->id = $id;
        $this->desc = strtolower($desc);
        $this->link = ucfirst($link);
        $this->vitaminak = ucfirst($vitaminak);
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getDesc(): string
    {
        return $this->desc;
    }

    /**
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * @return string
     */
    public function getVitaminak(): double
    {
        return $this->vitaminak;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'desc' => $this->desc,
            'link' => $this->link,
            'vitaminak' => $this->vitaminak,
        ];
    }
}
