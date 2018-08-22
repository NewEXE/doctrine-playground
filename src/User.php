<?php
/**
 * Created by PhpStorm.
 * User: newexe
 * Date: 21.08.18
 * Time: 18:11
 */

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity @Table(name="users")
 */
class User
{
    /**
     * @Id @GeneratedValue @Column(type="integer")
     * @var int
     */
    protected $id;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $name;

    /**
     * @OneToMany(targetEntity="Bug", mappedBy="reporter")
     * @var Bug[]
     */
    protected $reportedBugs;

    /**
     * @OneToMany(targetEntity="Bug", mappedBy="engineer")
     * @var Bug[]
     */
    protected $assignedBugs;

    /**
     * User constructor.
     * @param string $name
     */
    public function __construct($name = null)
    {
        if (is_string($name)) {
            $this->setName($name);
        }
        $this->reportedBugs = new ArrayCollection();
        $this->assignedBugs = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param Bug $bug
     */
    public function addReportedBug(Bug $bug)
    {
        $this->reportedBugs[] = $bug;
    }

    /**
     * @param Bug $bug
     */
    public function assignedToBug(Bug $bug)
    {
        $this->assignedBugs[] = $bug;
    }
}