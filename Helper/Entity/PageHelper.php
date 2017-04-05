<?php

namespace JustBetter\AlgoliaWordpressIntegration\Helper\Entity;

class PageHelper extends \Algolia\AlgoliaSearch\Helper\Entity\PageHelper
{
    public function getPages( $storeId )
    {
        $pages      = parent::getPages($storeId);
        $postTypes  = ['pages', 'posts'];
        $baseUrl    = $this->storeManager->getStore()->getBaseUrl();

        foreach($postTypes as $postType) {
            $page   = 1;
            $key    = true;

            while($key) {
                $apiUrl         = $baseUrl.'wp/?rest_route=/wp/v2/'.$postType.'&per_page=100&page='.$page;
                $wordpressPages = json_decode(file_get_contents( $apiUrl ));

                foreach($wordpressPages as $wordpressPage) {
                    $pages[] = [
                        'slug'      => $wordpressPage->slug,
                        'name'      => $wordpressPage->title->rendered,
                        'objectID'  => 'wp'.$wordpressPage->id,
                        'url'       => $wordpressPage->link,
                        'content'   => $this->strip($wordpressPage->content->rendered, array('script', 'style'))
                    ];
                }

                $page++;
                $key = !empty( $wordpressPages );
            }
        }

        return $pages;
    }
}
