<?php

namespace Oasis\CustomizeApi\Entities;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;
use Oasis\Mlib\Doctrine\CascadeRemovableInterface;
use Oasis\Mlib\Doctrine\CascadeRemoveTrait;

/**
 * Class VoteRecords
 *
 * @package Oasis\CustomizeApi\Entities
 * @ORM\Entity(repositoryClass="Oasis\CustomizeApi\Entities\Repositories\VoteRecordsRepository")
 * @ORM\Table(name="vote_records", indexes={
 *     @ORM\index(name="game_code", columns={"game_code"}),
 *     @ORM\index(name="language", columns={"language"})
 *     }, uniqueConstraints={
 *     @ORM\uniqueConstraint()})
 * @ORM\Cache(usage="NONSTRICT_READ_WRITE")
 * @ORM\HasLifecycleCallbacks()
 */
class VoteRecords implements JsonSerializable, CascadeRemovableInterface
{
    use CascadeRemoveTrait;
    
    /**
     * @var integer
     * @ORM\Id()
     * @ORM\Column(name="id", type="integer", options={"unsigned":true})
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @var string
     * @ORM\Column(name="game_code", type="string", length=32)
     */
    protected $gameCode;
    
    /**
     * @var string
     * @ORM\Column(type="string", length=32)
     */
    protected $language;
    
    /**
     * @var string
     * @ORM\Column(type="string", length=128)
     */
    protected $uuid;
    
    /**
     * @var integer
     * @ORM\Column(type="integer", options={"unsigned":true})
     */
    protected $type;
    
    /**
     * @var integer
     * @ORM\Column(type="integer", options={"unsigned":true})
     */
    protected $counts;
    
    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $ip;
    
    /**
     * @var integer
     * @ORM\Column(name="created_at", type="integer", options={"unsigned":true})
     */
    protected $createdAt;
    
    public function __construct()
    {
        $this->createdAt = time();
    }
    
    /**
     * @return array an array of entities asscociated to the calling entity, which should be detached when calling
     *               entity is removed.
     */
    public function getDirtyEntitiesOnInvalidation()
    {
        return [];
    }
    
    /**
     * @return array an array of entities which will also be removed when the calling entity is remvoed
     */
    public function getCascadeRemoveableEntities()
    {
        return [];
    }
    
    public function jsonSerialize()
    {
        return [
        ];
    }
}