<?php
/**
 * Created by PhpStorm.
 * User: ypoon
 * Date: 23/11/2018
 * Time: 3:53 PM
 */

namespace App\Entity\Core;

use App\Entity\Base\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
/**
 * Class WeChatUser
 * @package App\Entity\Core
 * @ORM\Table()
 * @ORM\Entity()
 */
class WeChatUser extends User implements \JsonSerializable {

    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="\App\Entity\Core\AbstractStoreFront", mappedBy="owner");
     */
    private $storeFronts;

    /**
     * @var string
     * @ORM\Column(type="string", length=512, nullable=true, unique=true, name="we_chat_open_id")
     */
    private $weChatOpenId;

    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="App\Entity\Core\StickyTicket", mappedBy="user")
     */
    private $tickets;

    public function __construct() {
        parent::__construct();
        $this->storeFronts = new ArrayCollection();
        $this->tickets = new ArrayCollection();
    }

    /**
     * @return Collection
     */
    public function getStoreFronts(): Collection {
        return $this->storeFronts;
    }

    /**
     * @return string
     */
    public function getWeChatOpenId(): string {
        return $this->weChatOpenId;
    }

    /**
     * @param string $weChatOpenId
     * @return WeChatUser
     */
    public function setWeChatOpenId(string $weChatOpenId): WeChatUser {
        $this->weChatOpenId = $weChatOpenId;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getTickets(): Collection {
        return $this->tickets;
    }

    public function jsonSerialize() {
        $rtn = parent::jsonSerialize();
        $rtn["openId"] = $this->getWeChatOpenId();
        return $rtn;
    }


}