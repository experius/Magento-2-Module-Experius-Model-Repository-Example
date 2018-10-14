<?php


namespace Experius\Blog\Api\Data;

interface BlogInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const BLOG_ID = 'blog_id';
    const NAME = 'name';
    const DESCRIPTION = 'description';

    /**
     * Get blog_id
     * @return string|null
     */
    public function getBlogId();

    /**
     * Set blog_id
     * @param string $blogId
     * @return \Experius\Blog\Api\Data\BlogInterface
     */
    public function setBlogId($blogId);

    /**
     * Get name
     * @return string|null
     */
    public function getName();

    /**
     * Set name
     * @param string $name
     * @return \Experius\Blog\Api\Data\BlogInterface
     */
    public function setName($name);

    /**
     * Get description
     * @return string|null
     */
    public function getDescription();

    /**
     * Set description
     * @param string $description
     * @return \Experius\Blog\Api\Data\BlogInterface
     */
    public function setDescription($description);

    /**
     * Retrieve existing extension attributes object or create a new one.
     *
     * @return \Magento\Framework\Api\ExtensionAttributesInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     *
     * @param \Magento\Framework\Api\ExtensionAttributesInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(\Magento\Framework\Api\ExtensionAttributesInterface $extensionAttributes);
}
