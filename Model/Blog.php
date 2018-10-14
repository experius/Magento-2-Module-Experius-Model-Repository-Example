<?php


namespace Experius\Blog\Model;

use Experius\Blog\Api\Data\BlogInterface;

class Blog extends \Magento\Framework\Model\AbstractModel implements BlogInterface
{

    protected $_eventPrefix = 'experius_blog_blog';

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Experius\Blog\Model\ResourceModel\Blog::class);
    }

    /**
     * Get blog_id
     * @return string
     */
    public function getBlogId()
    {
        return $this->getData(self::BLOG_ID);
    }

    /**
     * Set blog_id
     * @param string $blogId
     * @return \Experius\Blog\Api\Data\BlogInterface
     */
    public function setBlogId($blogId)
    {
        return $this->setData(self::BLOG_ID, $blogId);
    }

    /**
     * Get name
     * @return string
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * Set name
     * @param string $name
     * @return \Experius\Blog\Api\Data\BlogInterface
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Get description
     * @return string
     */
    public function getDescription()
    {
        return $this->getData(self::DESCRIPTION);
    }

    /**
     * Set description
     * @param string $description
     * @return \Experius\Blog\Api\Data\BlogInterface
     */
    public function setDescription($description)
    {
        return $this->setData(self::DESCRIPTION, $description);
    }
}
