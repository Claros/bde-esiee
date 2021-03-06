<?php

namespace Application\BDEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\VirtualProperty;
use JMS\Serializer\Annotation\Since;

/**
 * Club
 *
 * @ORM\Table(name="bde__club")
 * @ORM\Entity(repositoryClass="Application\BDEBundle\Repository\ClubRepository")
 * @ExclusionPolicy("none")
 */
class Club
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
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="shortcode", type="string", length=255)
     */
    private $shortcode;

    /**
     * @ORM\OneToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media", cascade={"all"})
     * @ORM\JoinColumn(nullable=true)
     * @Exclude
     */
    private $logo;

    /**
     * @var string
     *
     * @ORM\Column(name="abstract", type="text")
     */
    private $abstract;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(name="rawContent", type="text")
     * @Exclude
     */
    private $rawContent;

    /**
     * @var string
     *
     * @ORM\Column(name="contentFormatter", type="string", length=255)
     * @Exclude
     */
    private $contentFormatter;

    public $logoUrl;

    /**
     * @ORM\ManyToOne(targetEntity="Application\BDEBundle\Entity\ClubCategory", inversedBy="clubs")
     * @ORM\JoinColumn(nullable=true)
     * @Exclude
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     * @Since("1.1")
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity="Application\PoudlardBundle\Entity\ClubHasPoints", mappedBy="club")
     * @Exclude
     */
    private $points;

    /**
     * @ORM\ManyToOne(targetEntity="Application\PoudlardBundle\Entity\House", inversedBy="clubs", cascade="persist")
     * @ORM\JoinColumn(name="house_id", referencedColumnName="id")
     * @Exclude
     **/
    private $house;

    /**
     * @var integer
     *
     * @ORM\Column(name="president", type="integer", nullable=true)
     * @Since("1.3")
     */
    private $president;

    /**
     * @var integer
     *
     * @ORM\Column(name="vice_president", type="integer", nullable=true)
     * @Since("1.3")
     */
    private $vice_president;

    /**
     * @var integer
     *
     * @ORM\Column(name="secretary", type="integer", nullable=true)
     * @Since("1.3")
     */
    private $secretary;

    /**
     * @var integer
     *
     * @ORM\Column(name="treasurer", type="integer", nullable=true)
     * @Since("1.3")
     */
    private $treasurer;

    /**
     * @ORM\OneToMany(targetEntity="Application\StudentBundle\Entity\StudentHasClub", cascade={"all"}, mappedBy="club_member")
     * @Exclude
     * @Since("1.4")
     */
    private $members;

    /**
     * @ORM\OneToMany(targetEntity="Application\StudentBundle\Entity\StudentHasClub", cascade={"all"}, mappedBy="club_director")
     * @Exclude
     * @Since("1.4")
     */
    private $directors;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->points    = new \Doctrine\Common\Collections\ArrayCollection();
        $this->members   = new \Doctrine\Common\Collections\ArrayCollection();
        $this->directors = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
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
     * @return Club
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
     * Set shortcode
     *
     * @param string $shortcode
     * @return Club
     */
    public function setShortcode($shortcode)
    {
        $this->shortcode = $shortcode;

        return $this;
    }

    /**
     * Get shortcode
     *
     * @return string 
     */
    public function getShortcode()
    {
        return $this->shortcode;
    }

    /**
     * Set logo
     *
     * @param Application\Sonata\MediaBundle\Entity\Media $logo
     * @return Club
     */
    public function setLogo(\Application\Sonata\MediaBundle\Entity\Media $logo = null)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return Application\Sonata\MediaBundle\Entity\Media
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Club
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set rawContent
     *
     * @param string $rawContent
     * @return Club
     */
    public function setRawContent($rawContent)
    {
        $this->rawContent = $rawContent;

        return $this;
    }

    /**
     * Get rawContent
     *
     * @return string 
     */
    public function getRawContent()
    {
        return $this->rawContent;
    }

    /**
     * Set contentFormatter
     *
     * @param string $contentFormatter
     * @return Club
     */
    public function setContentFormatter($contentFormatter)
    {
        $this->contentFormatter = $contentFormatter;

        return $this;
    }

    /**
     * Get contentFormatter
     *
     * @return string 
     */
    public function getContentFormatter()
    {
        return $this->contentFormatter;
    }

    /**
     * Set abstract
     *
     * @param string $abstract
     * @return Club
     */
    public function setAbstract($abstract)
    {
        $this->abstract = $abstract;

        return $this;
    }

    /**
     * Get abstract
     *
     * @return string 
     */
    public function getAbstract()
    {
        return $this->abstract;
    }

    /**
     * Set category
     *
     * @param \Application\BDEBundle\Entity\ClubCategory $category
     * @return Club
     */
    public function setCategory(\Application\BDEBundle\Entity\ClubCategory $category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Application\BDEBundle\Entity\ClubCategory 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Get category id
     *
     * @return integer
     * @VirtualProperty
     */
    public function getCategoryId()
    {
        return $this->getCategory()->getId();
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Club
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Add points
     *
     * @param \Application\PoudlardBundle\Entity\ClubHasPoints $points
     * @return Club
     */
    public function addPoint(\Application\PoudlardBundle\Entity\ClubHasPoints $points)
    {
        $this->points[] = $points;

        return $this;
    }

    /**
     * Remove points
     *
     * @param \Application\PoudlardBundle\Entity\ClubHasPoints $points
     */
    public function removePoint(\Application\PoudlardBundle\Entity\ClubHasPoints $points)
    {
        $this->points->removeElement($points);
    }

    /**
     * Get points
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPoints()
    {
        return $this->points;
    }

    public function getScore()
    {
        $total = 0;

        foreach($this->points as $clubHasPoints)
        {
            $total += $clubHasPoints->getAmount() + $clubHasPoints->getBonusMalus();
        }

        return $total;
    }

    /**
     * Set house
     *
     * @param \Application\PoudlardBundle\Entity\House $house
     * @return Club
     */
    public function setHouse(\Application\PoudlardBundle\Entity\House $house = null)
    {
        $this->house = $house;

        return $this;
    }

    /**
     * Get house
     *
     * @return \Application\PoudlardBundle\Entity\House 
     */
    public function getHouse()
    {
        return $this->house;
    }

    /**
     * Set president
     *
     * @param integer $president
     * @return Club
     */
    public function setPresident($president)
    {
        $this->president = $president;

        return $this;
    }

    /**
     * Get president
     *
     * @return integer 
     */
    public function getPresident()
    {
        return $this->president;
    }

    /**
     * Set vice_president
     *
     * @param integer $vicePresident
     * @return Club
     */
    public function setVicePresident($vicePresident)
    {
        $this->vice_president = $vicePresident;

        return $this;
    }

    /**
     * Get vice_president
     *
     * @return integer 
     */
    public function getVicePresident()
    {
        return $this->vice_president;
    }

    /**
     * Set secretary
     *
     * @param integer $secretary
     * @return Club
     */
    public function setSecretary($secretary)
    {
        $this->secretary = $secretary;

        return $this;
    }

    /**
     * Get secretary
     *
     * @return integer 
     */
    public function getSecretary()
    {
        return $this->secretary;
    }

    /**
     * Set treasurer
     *
     * @param integer $treasurer
     * @return Club
     */
    public function setTreasurer($treasurer)
    {
        $this->treasurer = $treasurer;

        return $this;
    }

    /**
     * Get treasurer
     *
     * @return integer 
     */
    public function getTreasurer()
    {
        return $this->treasurer;
    }

    /**
     * Add members
     *
     * @param \Application\StudentBundle\Entity\StudentHasClub $members
     * @return Club
     */
    public function addMember(\Application\StudentBundle\Entity\StudentHasClub $members)
    {
        $this->members[] = $members;

        return $this;
    }

    /**
     * Remove members
     *
     * @param \Application\StudentBundle\Entity\StudentHasClub $members
     */
    public function removeMember(\Application\StudentBundle\Entity\StudentHasClub $members)
    {
        $this->members->removeElement($members);
    }

    /**
     * Get members
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMembers()
    {
        return $this->members;
    }

    /**
     * Add directors
     *
     * @param \Application\StudentBundle\Entity\StudentHasClub $directors
     * @return Club
     */
    public function addDirector(\Application\StudentBundle\Entity\StudentHasClub $directors)
    {
        $this->directors[] = $directors;

        return $this;
    }

    /**
     * Remove directors
     *
     * @param \Application\StudentBundle\Entity\StudentHasClub $directors
     */
    public function removeDirector(\Application\StudentBundle\Entity\StudentHasClub $directors)
    {
        $this->directors->removeElement($directors);
    }

    /**
     * Get directors
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDirectors()
    {
        return $this->directors;
    }
}
