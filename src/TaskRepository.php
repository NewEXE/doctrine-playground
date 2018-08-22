<?php
/**
 * Created by PhpStorm.
 * User: newexe
 * Date: 22.08.18
 * Time: 15:52
 */

use Doctrine\ORM\EntityRepository;

class TaskRepository extends EntityRepository
{
    public function getAllTasksByUser($userId)
    {
        $dql = 'SELECT t, u FROM Task t JOIN t.user u' .
            ' WHERE u.id = ?1' .
            ' ORDER BY t.complete_at DESC';

        return $this->getEntityManager()->createQuery($dql)
            ->setParameter(1, $userId)
            ->getResult();
    }

    public function getOpenTasksByUser($userId)
    {
        $dql = 'SELECT t, u FROM Task t JOIN t.user u' .
            ' WHERE u.id = ?1 AND t.status = ' . Task::STATUS_OPEN . ' ORDER BY t.complete_at DESC';

        return $this->getEntityManager()->createQuery($dql)
            ->setParameter(1, $userId)
            ->getResult();
    }

    public function getExpiredTasksByUser($userId)
    {
        $dql = 'SELECT t, u FROM Task t JOIN t.user u' .
            ' WHERE u.id = ?1 AND t.status = ' . Task::STATUS_OPEN . ' AND CURRENT_DATE() > t.complete_at ORDER BY t.complete_at DESC';

        return $this->getEntityManager()->createQuery($dql)
            ->setParameter(1, $userId)
            ->getResult();
    }
}