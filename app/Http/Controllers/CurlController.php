<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Goutte\Client;
use App\Topic;
use App\TopicCategory;
use App\Section;
use Helper;
use Storage;

class CurlController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function getBaoHaTinh()
    {

        $urlArray = [
            'http://baohatinh.vn/rss/xa-hoi.xml',
            'http://baohatinh.vn/rss/chinh-tri.xml',
        ];

        foreach ($urlArray as $url) {

            $this->baoHaTinh($url);
            
        };
        
        return redirect()->route('topics',11);
       
    }

    public function baoHaTinh($url="")
    {

        $client = new Client();

        $crawler = $client->request('GET', $url);

        $links_count = $crawler->filter('item')->count();

        if ($links_count > 0) {

            $crawler->filter('item')->each(function ($node) {

                $name = $node->filter('title')->text(); // String. You have extracted description part from your feed

                $count = Topic::where('title_vi',$name)->first();

                if (empty($count)){

                    $next_nor_no = TopicCategory::where('section_id', '=', 28)->count();
                    if ($next_nor_no < 1) {
                        $next_nor_no = 1;
                    } else {
                        $next_nor_no++;
                    }

                    //

                    $name = $node->filter('title')->text(); // String. You have extracted description part from your feed

                    $slug = str_slug($name);

                    $url = $node->filter('link')->text(); // String. You have extracted description part from your feed

                    $desc = $node->filter('description')->text();

                    $details = substr($desc,strpos($desc,'<br />') + 6);

                    // create new topic
                    $Topic = new Topic;

                    // Save topic details
                    $Topic->row_no = $next_nor_no;
                    $Topic->title_vi = $name;
                    $Topic->title_en = $name;

                    $Topic->details_vi = $details.'<br><a href="'.$url.'" class="pull-right" target="_blank">Nguồn: baohatinh.vn</a>';

                    $Topic->details_en = $details.'<br><a href="'.$url.'" class="pull-right" target="_blank">Nguồn: baohatinh.vn</a>';

                    $Topic->date = Carbon::parse($node->filter('pubDate')->text());

                    $start = strpos($desc,'src="') + 15;
                    $end = strpos($desc,'" />');
                    
                    //Storefile
                    $url = 'http://i.baohatinh.vn'.substr($desc,$start,$end-$start);
                    $contents = file_get_contents($url);
                    $filename = substr($url, strrpos($url, '/') + 1);
                    // Storage::put($filename, $contents);

                    $path = public_path().'/uploads/topics/'.$filename;

                    file_put_contents($path,$contents);
                    
                    $Topic->photo_file = $filename;
                    
                    $Topic->webmaster_id = 11;
                    
                    $Topic->created_by = Auth::user()->id;
                    $Topic->visits = 0;
                    $Topic->status = 0;

                    // Meta title
                    $Topic->seo_title_vi = $name;
                    $Topic->seo_title_en = $name;

                    // URL Slugs
                    $slugs = Helper::URLSlug($name, $name, "topic", 0);
                    $Topic->seo_url_slug_vi = $slugs['slug_vi'];
                    $Topic->seo_url_slug_en = $slugs['slug_en'];

                    // Meta Description
                    $Topic->seo_description_vi = mb_substr(strip_tags(stripslashes($details)), 0, 165, 'UTF-8');
                    $Topic->seo_description_en = mb_substr(strip_tags(stripslashes($details)), 0, 165, 'UTF-8');
                    
                    $Topic->save();

                    $TopicCategory = new TopicCategory;
                    $TopicCategory->topic_id = $Topic->id;
                    $TopicCategory->topic_date = Carbon::parse($node->filter('pubDate')->text());
                    $TopicCategory->section_id = 28;
                    $TopicCategory->save();

                    //Thong tin tuyen truyen
                    // create new topic
                    $Topic = new Topic;

                    // Save topic details
                    $Topic->row_no = $next_nor_no;
                    $Topic->title_vi = $name;
                    $Topic->title_en = $name;

                    $Topic->details_vi = $details.'<br><a href="'.$url.'" class="pull-right" target="_blank">Chi tiết</a>';

                    $Topic->details_en = $details.'<br><a href="'.$url.'" class="pull-right" target="_blank">Chi tiết</a>';

                    $Topic->date = Carbon::parse($node->filter('pubDate')->text());

                    $Topic->photo_file = $filename;
                    
                    $Topic->webmaster_id = 12;
                    $Topic->created_by = Auth::user()->id;
                    $Topic->visits = 0;
                    $Topic->status = 0;

                    // Meta title
                    $Topic->seo_title_vi = $name;
                    $Topic->seo_title_en = $name;

                    // URL Slugs
                    $slugs = Helper::URLSlug($name, $name, "topic", 0);
                    $Topic->seo_url_slug_vi = $slugs['slug_vi'];
                    $Topic->seo_url_slug_en = $slugs['slug_en'];

                    // Meta Description
                    $Topic->seo_description_vi = mb_substr(strip_tags(stripslashes($details)), 0, 165, 'UTF-8');
                    $Topic->seo_description_en = mb_substr(strip_tags(stripslashes($details)), 0, 165, 'UTF-8');
                    
                    $Topic->save();


                }

            });        
        }

    }


    public function getBaoChinhPhu()
    {
        
        $url ='http://baochinhphu.vn/Rss/Feed.aspx?EventID=115';

        $this->baoChinhPhu($url);

        return redirect()->route('topics',11);

    }

    public function baoChinhPhu($url="")
    {
        
        $rss=simplexml_load_file($url);

        foreach ($rss->channel->item as $item) {

            $name = $item->title; // String. You have extracted description part from your feed
            
            $details = $item->description;
            
            $image = $item->enclosure['url'];

            $url = $item->link;

            $file = file_get_contents($image);

            if (!empty($file)){

                $next_nor_no = TopicCategory::where('section_id', '=', 29)->count();

                if ($next_nor_no < 1) {
                    $next_nor_no = 1;
                } else {
                    $next_nor_no++;
                }

                

                $count = Topic::where('title_vi',$name)->first();

                if (empty($count)){

                    

                    $filename = substr($image, strrpos($image, '/') + 1);

                    $folder = 'uploads/topics/';
                    
                    $datefilename = Carbon::now()->year . '_' . Carbon::now()->month;

                    $filename = $datefilename."_".$filename;

                    file_put_contents($folder.$filename,$file);

                    $Topic = new Topic;

                    $Topic->row_no = $next_nor_no;

                    $Topic->title_vi = $name;

                    $Topic->title_en = $name;

                    $Topic->details_vi = $details.'<br><a href="'.$url.'" class="pull-right" target="_blank">Nguồn: baochinhphu.vn</a>';

                    $Topic->details_en = $details.'<br><a href="'.$url.'" class="pull-right" target="_blank">Nguồn: baochinhphu.vn</a>';

                    $Topic->date = date("Y-m-d H:i:s");
                    
                    $Topic->photo_file = $filename;
                        
                    $Topic->webmaster_id = 11;
                    
                    $Topic->created_by = Auth::user()->id;

                    $Topic->visits = 0;

                    $Topic->status = 0;

                    $Topic->save();
                
                }

            }

                
           
        }

    }

    public function getCongBao()
    {
        
        $url = 'http://congbao.hatinh.gov.vn/vbpq_hatinh.nsf/VwAllDocNew';

        $this->congBao($url);

        return redirect()->route('topics',10);

    }

    public function congBao($url="")
    {

        $client = new Client();

        $crawler = $client->request('GET', 'http://congbao.hatinh.gov.vn/vbpq_hatinh.nsf/VwAllDocNew');

        $crawler->filter('td > table > tr')->each(function ($node) {

            if ($node->filter('td')->count() >0){

                $next_nor_no = TopicCategory::where('section_id', '=', 25)->count();
                if ($next_nor_no < 1) {
                    $next_nor_no = 1;
                } else {
                    $next_nor_no++;
                }

                $name = trim($node->filter('td')->eq(1)->text());
                $desc = trim($node->filter('td')->eq(4)->text());

                $count = Topic::where('title_vi',$name)->first();

                if (empty($count)){

            
                    // create new topic
                    $Topic = new Topic;

                    // Save topic details
                    $Topic->row_no = $next_nor_no;
                    $Topic->title_vi = $name;
                    $Topic->title_en = $name;

                    $Topic->details_vi = $desc;
                    $Topic->details_en = $desc;

                    $Topic->date = Carbon::parse(trim( str_replace("/","-", $node->filter('td')->eq(2)->text())  )  );

                    $start = strpos($desc,'src="') + 5;
                    $end = strpos($desc,'" />');
                
                    //Storefile

                    $url = 'http://qppl.hatinh.gov.vn'.trim($node->filter('a')->attr('href'));
                    // $contents = file_get_contents($url);
                    // $filename = substr($url, strrpos($url, '/') + 1);

                    // $path = public_path().'/uploads/topics/'.$filename;

                    // file_put_contents($path,$contents);
                    
                    // $Topic->attach_file = $filename;
                    $Topic->attach_file = $url;
                    
                    $Topic->webmaster_id = 10;
                    
                    $Topic->created_by = Auth::user()->id;
                    $Topic->visits = 0;
                    $Topic->status = 0;

                    // Meta title
                    $Topic->seo_title_vi = $name;
                    $Topic->seo_title_en = $name;

                    // URL Slugs
                    $slugs = Helper::URLSlug($name, $name, "topic", 0);
                    $Topic->seo_url_slug_vi = $slugs['slug_vi'];
                    $Topic->seo_url_slug_en = $slugs['slug_en'];

                    // Meta Description
                    $Topic->seo_description_vi = mb_substr(strip_tags(stripslashes($desc)), 0, 165, 'UTF-8');
                    $Topic->seo_description_en = mb_substr(strip_tags(stripslashes($desc)), 0, 165, 'UTF-8');
                    
                    $Topic->save();
                
                }
                
            }

        });

        return redirect()->back();
    }

    public function getDHTN()
    {
        
        $url = 'http://dhtn.hatinh.gov.vn/dhtn/portal/folder/cong-van/1.html';

        $this->dhtn($url);

        return redirect()->route('topics',10);

    }

    public function dhtn($url="")
    {
        $client = new Client();

        $crawler = $client->request('GET', $url);

        $crawler->filter('table>tbody>tr')->each(function ($node) {

            if ($node->filter('td')->count() > 0) {

                if (strlen(trim($node->filter('td')->eq(0)->text())) > 0){

                    $next_nor_no = TopicCategory::where('section_id', '=', 24)->count();
                        if ($next_nor_no < 1) {
                            $next_nor_no = 1;
                        } else {
                            $next_nor_no++;
                        }

                        $name = trim($node->filter('td')->eq(0)->text()); // String. You have extracted description part from your feed

                        $slug = str_slug($name);

                        $url = $node->filter('link')->text(); // String. You have extracted description part from your feed

                        $desc = trim($node->filter('td')->eq(1)->text());

                        $attach_file = trim($node->filter('td')->eq(2)->text());

                        $count = Topic::where('title_vi',$name)->first();

                        if (empty($count)){

                            // create new topic
                            $Topic = new Topic;

                            // Save topic details
                            $Topic->row_no = $next_nor_no;
                            $Topic->title_vi = $name;
                            $Topic->title_en = $name;

                            $Topic->details_vi = $desc;
                            $Topic->details_en = $desc;

                            $Topic->date = Carbon::now()->toDateTimeString();

                            $start = strpos($desc,'src="') + 5;
                            $end = strpos($desc,'" />');

                            $url = 'http://dhtn.hatinh.gov.vn'.trim($node->filter('a')->attr('href'));

                            $Topic->attach_file = $url;
                            
                            $Topic->webmaster_id = 10;
                            
                            $Topic->created_by = Auth::user()->id;
                            $Topic->visits = 0;
                            $Topic->status = 0;

                            // Meta title
                            $Topic->seo_title_vi = $name;
                            $Topic->seo_title_en = $name;

                            // URL Slugs
                            $slugs = Helper::URLSlug($name, $name, "topic", 0);
                            $Topic->seo_url_slug_vi = $slugs['slug_vi'];
                            $Topic->seo_url_slug_en = $slugs['slug_en'];

                            // Meta Description
                            $Topic->seo_description_vi = mb_substr(strip_tags(stripslashes($desc)), 0, 165, 'UTF-8');
                            $Topic->seo_description_en = mb_substr(strip_tags(stripslashes($desc)), 0, 165, 'UTF-8');
                            
                            $Topic->save();
                           
                        }

                }

            }
        });
    }

    public function getLLV()
    {
        
        $url = 'http://dhtn.hatinh.gov.vn/dhtn/portal/folder/chuong-trinh-cong-tac/1.html';

        $this->llv($url);

        return redirect()->route('topics',10);

    }

    public function llv($url="")
    {
        $client = new Client();

        $crawler = $client->request('GET', $url);

        $crawler->filter('table>tbody>tr')->each(function ($node) {

            if ($node->filter('td')->count() > 0) {

                if (strlen(trim($node->filter('td')->eq(0)->text())) > 0){

                    $next_nor_no = TopicCategory::where('section_id', '=', 23)->count();
                    if ($next_nor_no < 1) {
                        $next_nor_no = 1;
                    } else {
                        $next_nor_no++;
                    }

                    $name = trim($node->filter('td')->eq(1)->text()); // String. You have extracted description part from your feed

                    $slug = str_slug($name);

                    $url = $node->filter('link')->text(); // String. You have extracted description part from your feed

                    $desc = trim($node->filter('td')->eq(1)->text());

                    $attach_file = trim($node->filter('td')->eq(2)->text());

                    $count = Topic::where('title_vi',$name)->first();

                    if (empty($count)){

                        // create new topic
                        $Topic = new Topic;

                        // Save topic details
                        $Topic->row_no = 21 - $next_nor_no;
                        $Topic->title_vi = $name;
                        $Topic->title_en = $name;

                        $Topic->details_vi = $desc;
                        $Topic->details_en = $desc;

                        $Topic->date = Carbon::now()->toDateTimeString();

                        $start = strpos($desc,'src="') + 5;
                        $end = strpos($desc,'" />');
                        
                        //Storefile

                        $url = 'http://dhtn.hatinh.gov.vn'.trim($node->filter('a')->attr('href'));

                        // $contents = file_get_contents($url);
                        // $filename = substr($url, strrpos($url, '/') + 1);
                        // $path = public_path().'/uploads/topics/'.$filename;
                        // file_put_contents($path,$contents);
                        // $Topic->attach_file = $filename;

                        $Topic->attach_file = $url;
                        
                        $Topic->webmaster_id = 10;
                        
                        $Topic->created_by = Auth::user()->id;
                        $Topic->visits = 0;
                        $Topic->status = 1;

                        // Meta title
                        $Topic->seo_title_vi = $name;
                        $Topic->seo_title_en = $name;

                        // URL Slugs
                        $slugs = Helper::URLSlug($name, $name, "topic", 0);
                        $Topic->seo_url_slug_vi = $slugs['slug_vi'];
                        $Topic->seo_url_slug_en = $slugs['slug_en'];

                        // Meta Description
                        $Topic->seo_description_vi = mb_substr(strip_tags(stripslashes($desc)), 0, 165, 'UTF-8');
                        $Topic->seo_description_en = mb_substr(strip_tags(stripslashes($desc)), 0, 165, 'UTF-8');
                        
                        $Topic->save();
                    
                    }

                }

            }
        });
    }
  
}
