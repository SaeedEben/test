<?php

namespace App\Observers;

use App\Crawl;
use DOMDocument;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;
use Spatie\Crawler\CrawlObserver;

class FirstCrawl extends CrawlObserver
{
    /**
     * @var array
     */
    private $pages = [];

    /**
     * @param UriInterface $uri
     */
    public function willCrawl(UriInterface $uri)
    {
        echo "Now crawling: " . (string)$uri . PHP_EOL;
    }

    /**
     * @param UriInterface      $url
     * @param ResponseInterface $response
     * @param UriInterface|null $foundOnUrl
     */
    public function crawled(UriInterface $url, ResponseInterface $response, ?UriInterface $foundOnUrl = NULL)
    {
        $path = $url->getPath();
        $doc  = new DOMDocument();
        @$doc->loadHTML($response->getBody());
        $title = $doc->getElementsByTagName("title")[0]->nodeValue;

        $this->pages[] = [
            'path'  => $path,
            'title' => $title,
        ];

        dd($this->pages);

        exit;
    }

    /**
     * Called when the crawler had a problem crawling the given url.
     *
     * @param UriInterface      $url
     * @param RequestException  $requestException
     * @param UriInterface|null $foundOnUrl
     */
    public function crawlFailed(UriInterface $url, RequestException $requestException, ?UriInterface $foundOnUrl = NULL)
    {
        echo 'failed';
    }

    /**
     *
     */
    public function finishedCrawling()
    {
        echo 'crawled ' . count($this->pages) . ' urls' . PHP_EOL;
        foreach ($this->pages as $page) {
            echo sprintf("Url  path: %s Page title: %s%s", $page['path'], $page['title'], PHP_EOL);
        }
    }
}
