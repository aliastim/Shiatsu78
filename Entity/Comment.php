<?php
/**
 * Created by PhpStorm.
 * User: timotheecorrado
 * Date: 15/12/2017
 * Time: 17:23
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Entity(repositoryClass="App\Repository\CommentRepository")
 * @ORM\Table(name="comment")
 */
class Comment
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $commenter;
    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    private $text;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $validate;

    const MAX_PER_PAGE       = 5;

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Comment
     *
     * @param int $id
     */
    public function setId($id): Comment
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getCommenter(): ?string
    {
        return $this->commenter;
    }

    /**
     * @return Comment
     * @param string $commenter
     */
    public function setCommenter($commenter): Comment
    {
        $this->commenter = $commenter;

        return $this;
    }

    /**
     * @return string
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return Comment
     */
    public function setText($text): Comment
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return string
     */
    public function getValidate(): ?string
    {
        return $this->validate;
    }

    /**
     * @param string $validate
     * @return Comment
     */
    public function setValidate($validate): Comment
    {
        $this->validate = $validate;

        return $this;
    }

}