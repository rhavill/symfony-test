<?php

namespace Acme\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Post
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Post
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="commentCount", type="integer")
     */
    private $commentCount;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=128)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="post", type="text")
     */
    private $post;

    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="post")
     */
    protected $comments;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
    }

    public function __toString() {
        return $this->title;
    }
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Post
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set post
     *
     * @param string $post
     * @return Post
     */
    public function setPost($post)
    {
        $this->post = $post;
    
        return $this;
    }

    /**
     * Get post
     *
     * @return string 
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * Add comments
     *
     * @param \Acme\DemoBundle\Entity\Comment $comments
     * @return Post
     */
    public function addComment(\Acme\DemoBundle\Entity\Comment $comments)
    {
        $this->comments[] = $comments;
    
        return $this;
    }

    /**
     * Remove comments
     *
     * @param \Acme\DemoBundle\Entity\Comment $comments
     */
    public function removeComment(\Acme\DemoBundle\Entity\Comment $comments)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set commentCount
     *
     * @param integer $commentCount
     * @return Post
     */
    public function setCommentCount($commentCount)
    {
        $this->commentCount = $commentCount;
    
        return $this;
    }

    /**
     * Get commentCount
     *
     * @return integer 
     */
    public function getCommentCount()
    {
        return $this->commentCount;
    }
}