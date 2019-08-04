<?php

namespace JustBetter\AlgoliaWordpressIntegration\Helper\Entity;

use Magento\Store\Model\StoreManagerInterface;

/**
 * Class PageHelper
 *
 * @package JustBetter\AlgoliaWordpressIntegration\Helper\Entity
 */
class PageHelper
{
    /**
     * @var StoreManagerInterface
     */
    protected $storeManager;

    /**
     * PageHelper constructor.
     *
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(StoreManagerInterface $storeManager)
    {
        $this->storeManager = $storeManager;
    }

    /**
     * @param $pages
     * @param $result
     * @return array
     */
    public function afterGetPages($pages, $result)
    {
        $postTypes  = ['pages', 'posts'];
        $baseUrl    = $this->storeManager->getStore()->getBaseUrl();

        foreach ($postTypes as $postType) {
            $page   = 1;
            $key    = true;

            while ($key) {
                $apiUrl         = $baseUrl.'wp/?rest_route=/wp/v2/'.$postType.'&per_page=100&page='.$page;
                $wordpressPages = json_decode(file_get_contents($apiUrl, false, stream_context_create([
                    'http' => ['ignore_errors' => true],
                ])));

                foreach ($wordpressPages as $wordpressPage) {
                    $result[] = [
                        'slug'      => $wordpressPage->slug,
                        'name'      => $wordpressPage->title->rendered,
                        'objectID'  => 'wp'.$wordpressPage->id,
                        'url'       => $wordpressPage->link,
                        'content'   => $this->strip($wordpressPage->content->rendered, array('script', 'style'))
                    ];
                }

                $page++;
                $key = !empty($wordpressPages);
            }
        }

        return $result;
    }

    /**
     * @param       $s
     * @param array $completeRemoveTags
     * @return mixed|string
     */
    protected function strip($s, $completeRemoveTags = [])
    {
        if (!empty($completeRemoveTags) && $s) {
            $dom = new \DOMDocument();
            if (@$dom->loadHTML(mb_convert_encoding($s, 'HTML-ENTITIES', 'UTF-8'))) {
                $toRemove = [];
                foreach ($completeRemoveTags as $tag) {
                    $removeTags = $dom->getElementsByTagName($tag);

                    foreach ($removeTags as $item) {
                        $toRemove[] = $item;
                    }
                }

                foreach ($toRemove as $item) {
                    $item->parentNode->removeChild($item);
                }

                $s = $dom->saveHTML();
            }
        }

        $s = html_entity_decode($s, null, 'UTF-8');

        $s = trim(preg_replace('/\s+/', ' ', $s));
        $s = preg_replace('/&nbsp;/', ' ', $s);
        $s = preg_replace('!\s+!', ' ', $s);
        $s = preg_replace('/\{\{[^}]+\}\}/', ' ', $s);
        $s = strip_tags($s);
        $s = trim($s);

        return $s;
    }
}
