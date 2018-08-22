<?php
/**
 * Created by PhpStorm.
 * User: newexe
 * Date: 22.08.18
 * Time: 16:27
 */

/**
 * @Entity(repositoryClass="TaskRepository")
 * @Table(name="tasks")
 */
class Task
{
    /**
     * Task statuses.
     */

    /** @var int */
    const STATUS_OPEN = 1;
    /** @var int */
    const STATUS_COMPLETED = 2;

    /**
     * Formats for status getting.
     */

    /** @var int  */
    const STATUS_FORMAT_READABLE = 1;
    /** @var int */
    const STATUS_FORMAT_CONSTANT = 2;

    /**
     * @Id @Column(type="integer") @GeneratedValue
     * @var int
     */
    protected $id;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $description;

    /**
     * @Column(type="datetime")
     * @var DateTime
     */
    protected $created_at;

    /**
     * @Column(type="datetime")
     * @var DateTime
     */
    protected $complete_at;

    /**
     * @Column(type="integer")
     * @var int
     */
    protected $status;

    /**
     * @ManyToOne(targetEntity="User", inversedBy="tasks")
     * @var User
     */
    protected $user;

    /**
     * Task constructor.
     * @param string|null $description
     * @param DateTime|null $complete_at
     * @param User|null $user
     */
    public function __construct($description = null, $complete_at = null, $user = null)
    {
        if (! is_null($description)) {
            $this->setDescription($description);
        }

        if (! is_null($user)) {
            $this->setUser($user);
        }

        if (! is_null($complete_at)) {
            $this->setCompleteAt($complete_at);
        }

        $this->created_at = new DateTime();
        $this->setStatus(self::STATUS_OPEN);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param DateTime $complete_at
     */
    public function setCompleteAt(DateTime $complete_at)
    {
        $this->complete_at = $complete_at;
    }

    /**
     * @return DateTime
     */
    public function getCompleteAt()
    {
        return $this->complete_at;
    }

    /**
     * @param int $status
     * @throws Exception
     */
    public function setStatus($status)
    {
        if (! in_array($status, array_keys($this->statusesMap()))) {
            throw new Exception('Incorrect status passed!');
        }
        $this->status = $status;
    }

    /**
     * @param int|null $format Task::STATUS_FORMAT_READABLE (by default) or Task::STATUS_FORMAT_CONSTANT
     * @return int
     * @throws Exception
     */
    public function getStatus($format = null)
    {
        if (is_null($format)) {
            $format = self::STATUS_FORMAT_READABLE;
        }

        if ($format === self::STATUS_FORMAT_READABLE) {
            $statuses = $this->statusesMap();
            return $statuses[$this->status];
        }

        if ($format === self::STATUS_FORMAT_READABLE) {
            return $this->status;
        }

        throw new Exception('Incorrect status format passed!');
    }

    /**
     * @param User $user
     */
    public function setUser(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return array
     */
    protected function statusesMap()
    {
        return [
            self::STATUS_OPEN => 'open',
            self::STATUS_COMPLETED => 'completed',
        ];
    }
}