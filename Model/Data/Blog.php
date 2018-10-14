<?php

namespace Experius\Blog\Model\Data;

class Blog extends \Magento\Framework\Api\AbstractExtensibleObject implements \Experius\Blog\Api\Data\BlogInterface
{

    /**
     * Get blog_id
     * @return string
     */
    public function getBlogId()
    {
        return $this->_get(self::BLOG_ID);
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
        return $this->_get(self::NAME);
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
        return $this->_get(self::DESCRIPTION);
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

    /**
     * Get extension_attributes
     *
     * @return \Magento\Framework\Api\ExtensionAttributesInterface
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set extension_attributes
     *
     * @param \Magento\Framework\Api\ExtensionAttributesInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(\Magento\Framework\Api\ExtensionAttributesInterface $extensionAttributes)
    {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

}