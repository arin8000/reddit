<?php
/**
 * Created by PhpStorm.
 * User: arin
 * Date: 4/22/18
 * Time: 10:02 PM
 */
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Class RedditPost
 * @package AppBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="reddit_posts")
 */
class RedditPost
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @ORM\Column(type="string")
     *
     */
    protected $title;

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }



}

