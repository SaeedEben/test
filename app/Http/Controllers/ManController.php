<?php

namespace App\Http\Controllers;

use App\Crawl;
use App\Exports\ManExport;
use App\Http\TestController;
use App\Man;
use App\Observers\FirstCrawl;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Crawler\Crawler;
use Sunra\PhpSimple\HtmlDomParser;

class ManController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index()
    {
//        dump(TestController::process());
//        dump(TestController::process());
//        dump(TestController::process());
//        return 1;
//
//        $man   = Man::select('status')
//            ->selectRaw('count(*) as Count')
//            ->groupBy('status')
//            ->get();
//        $scop  = Man::active();
//        $value = 1;
//        $filt  = Man::filter($value);
//        return $filt;


//        $url = '';
//        $class = new FirstCrawl();
//
//        Crawler::create()
//            ->addCrawlObserver($class)
//            ->startCrawling('www.varzesh3.com');

//        $image = [];
//        $url   = 'https://www.varzesh3.com/';
//
//        $dom = HtmlDomParser::str_get_html($url);
//
//        $findImg = $dom->find('img');
//
//        foreach ($findImg as $img) {
//            $image[] = $img->getAttribute('src');
//        }
//
//        $client = new Client();
//
//        $response = $client->request('GET', 'http://www.varzesh3.com');
//
//        echo $response->getStatusCode();
//        echo $response->getHeaderLine('content-type');
//        echo $response->getBody();
//
//        return [
//            'html' => json_decode($dom, true),
//            'img'  => $image,
//        ];

        $client = new \Goutte\Client();


        $crawler = $client->request('GET', 'http://www.varzesh3.com');

        $url = [];

        $crawler->filter('a')->each(function ($node) use (&$url) {
            $url[] = $node->attr('href');
        });

        $client = new Client();


        $end = new \Goutte\Client();

        $end = $end->request('GET', $url[0]);

        $end->filter('a')->each(function ($node) use (&$url) {
            $url[] = $node->attr('href');
        });

        $response = $client->request('GET', $url[0]);


//        echo $response->getStatusCode();
//        echo $response->getHeaderLine('content-type');
        echo $response->getBody();


//        return $url;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $request->session()->push('user', 'hi');
        $sess = $request->session()->get('user');
        return $sess;
    }

    /**
     * Display the specified resource.
     *
     * @param Man $man
     *
     * @return int
     */
    public function show(Man $man)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Man $man
     *
     * @return Response
     */
    public function edit(Man $man)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Man     $man
     *
     * @return Response
     */
    public function update(Request $request, Man $man)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Man $man
     *
     * @return void
     */
    public function destroy(Man $man)
    {
        //
    }

    public function export()
    {
        return Excel::download(new ManExport(), 'Man.xlsx');
    }
}
