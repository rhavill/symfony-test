<?php

namespace Acme\DemoBundle\Listener;

use Doctrine\ORM\Event\OnFlushEventArgs;
use Acme\DemoBundle\Entity\Comment;

class CommentListener {
    public function onFlush(OnFlushEventArgs $args)
    {
        $em = $args->getEntityManager();
        $uow = $em->getUnitOfWork();
    
        $entities = array_merge(
            $uow->getScheduledEntityInsertions(),
            $uow->getScheduledEntityUpdates()
        );
        foreach ($uow->getScheduledEntityInsertions() as $entity) {
            if (!($entity instanceof Comment)) {
                continue;
            }
    
            $post = $entity->getPost();
            $post->setCommentCount($post->getCommentCount()+1);
    
            $em->persist($post);
            $md = $em->getClassMetadata('Acme\DemoBundle\Entity\Post');
            $uow->computeChangeSet($md, $post);
            //$uow->recomputeSingleEntityChangeSet($md, $post);
        }
    }
}