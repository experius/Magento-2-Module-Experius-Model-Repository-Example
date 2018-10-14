<?php


namespace Experius\Blog\Api\Data;

interface BlogInterface
{

    const DESCRIPTION = 'description';
    const BLOG_ID = 'blog_id';
    const NAME = 'name';

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
}
