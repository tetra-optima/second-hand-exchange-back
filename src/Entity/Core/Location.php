<?php
/**
 * Created by PhpStorm.
 * User: ypoon
 * Date: 10/11/2018
 * Time: 9:59 AM
 */

namespace App\Entity\Core;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Location
 * @package App\Entity\Core
 * @ORM\Table(name="location")
 * @ORM\Entity()
 */
class Location {
    /**
     * @var int
     * @ORM\Column(type="integer", length=11)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=128)
     */
    private $name;

    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="AbstractModule", mappedBy="location")
     */
    private $modules;

    public function __construct() {
        $this->modules = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Location
     */
    public function setName(string $name): Location {
        $this->name = $name;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getModules(): Collection {
        return $this->modules;
    }


}