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
            // 'http://baohatinh.vn/rss/phap-luat.xml',
            // 'http://baohatinh.vn/rss/kinh-te.xml',
            // 'http://baohatinh.vn/rss/quoc-phong-an-ninh.xml',
            // 'http://baohatinh.vn/rss/van-hoa-giai-tri.xml',
            // 'http://vietnamnet.vn/rss/tin-noi-bat.rss'
            ];

        foreach ($urlArray as $url) {

            // $this->TinTrongTinh($url);
            
        };

        $url = 'http://vietnamnet.vn/rss/tin-noi-bat.rss';

        // $this->TinTrongNuoc($url);

        $url = 'http://vietnamnet.vn/rss/the-gioi.rss';

        // $this->TinQuocTe($url);

        $url = 'http://dhtn.hatinh.gov.vn/dhtn/portal/folder/cong-van/1.html';

        // $this->dhtn($url);

        $url = 'http://congbao.hatinh.gov.vn/vbpq_hatinh.nsf/VwAllDocNew';

        $this->congbao($url);

        return redirect()->route('topics',10);

    }

    public function TinTrongTinh($url=""){

        $client = new Client();

        $crawler = $client->request('GET', $url);

        $links_count = $crawler->filter('item')->count();

        if ($links_count > 0) {

            $crawler->filter('item')->each(function ($node) {
                
                //thu tu

                $next_nor_no = Topic::where('webmaster_id', '=', 11)->max('row_no');
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

                $Topic->details_vi = $details.'<br><a href="'.$url.'" class="pull-right" target="_blank">Chi tiết</a>';

                $Topic->details_en = $details;

                $Topic->date = Carbon::parse($node->filter('pubDate')->text());

                $start = strpos($desc,'src="') + 5;
                $end = strpos($desc,'" />');
                
                //Storefile
                $url = 'http://baohatinh.vn'.substr($desc,$start,$end-$start);
                $contents = file_get_contents($url);
                $filename = substr($url, strrpos($url, '/') + 1);
                // Storage::put($filename, $contents);

                $path = public_path().'/uploads/topics/'.$filename;

                file_put_contents($path,$contents);
                
                $Topic->photo_file = $filename;
                
                $Topic->webmaster_id = 11;
                
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
                $Topic->seo_description_vi = mb_substr(strip_tags(stripslashes($details)), 0, 165, 'UTF-8');
                $Topic->seo_description_en = mb_substr(strip_tags(stripslashes($details)), 0, 165, 'UTF-8');
                
                $Topic->save();

                $TopicCategory = new TopicCategory;
                $TopicCategory->topic_id = $Topic->id;
                $TopicCategory->section_id = 28;
                $TopicCategory->save();
                            
            });        
        }

    }

    public function TinTrongNuoc($url=""){

        $client = new Client();

        $crawler = $client->request('GET', $url);

        $links_count = $crawler->filter('item')->count();

        if ($links_count > 0) {

            $crawler->filter('item')->each(function ($node) {
                
                //thu tu

                $next_nor_no = Topic::where('webmaster_id', '=', 11)->max('row_no');
                if ($next_nor_no < 1) {
                    $next_nor_no = 1;
                } else {
                    $next_nor_no++;
                }

                //

                $name = $node->filter('title')->text(); // String. You have extracted description part from your feed

                $slug = str_slug($name);

                $desc = $node->filter('description')->text();

                $details = substr($desc,strpos($desc,'<p>') + 3,strpos($desc,'</p>')-3);

                $url = $node->filter('link')->text(); // String. You have extracted description part from your feed

                // $pubDate = Carbon::parse($node->filter('pubDate')->text());

                $pubDate = Carbon::now()->toDateTimeString();

                $image = $node->filter('image')->text();

                // create new topic
                $Topic = new Topic;

                // Save topic details
                $Topic->row_no = $next_nor_no;
                $Topic->title_vi = $name;
                $Topic->title_en = $name;

                $Topic->details_vi = $details.'<br><a href="'.$url.'" class="pull-right" target="_blank">Chi tiết</a>';

                $Topic->details_en = $details;

                $Topic->date = $pubDate;

                $start = strpos($desc,'src="') + 5;
                $end = strpos($desc,'" />');
                
                //Storefile
                // $url = 'http://baohatinh.vn'.substr($desc,$start,$end-$start);
                $contents = file_get_contents($image);
                $filename = substr($image, strrpos($image, '/') + 1);
                // Storage::put($filename, $contents);

                $path = public_path().'/uploads/topics/'.$filename;

                file_put_contents($path,$contents);
                
                $Topic->photo_file = $filename;
                
                $Topic->webmaster_id = 11;
                
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
                $Topic->seo_description_vi = mb_substr(strip_tags(stripslashes($details)), 0, 165, 'UTF-8');
                $Topic->seo_description_en = mb_substr(strip_tags(stripslashes($details)), 0, 165, 'UTF-8');
                
                $Topic->save();

                $TopicCategory = new TopicCategory;
                $TopicCategory->topic_id = $Topic->id;
                $TopicCategory->section_id = 29;
                $TopicCategory->save();
                            
            });        }

    }

    public function TinQuocTe($url=""){

        $client = new Client();

        $crawler = $client->request('GET', $url);

        $links_count = $crawler->filter('item')->count();

        if ($links_count > 0) {

            $crawler->filter('item')->each(function ($node) {
                
                //thu tu

                $next_nor_no = Topic::where('webmaster_id', '=', 11)->max('row_no');
                if ($next_nor_no < 1) {
                    $next_nor_no = 1;
                } else {
                    $next_nor_no++;
                }

                //

                $name = $node->filter('title')->text(); // String. You have extracted description part from your feed

                $slug = str_slug($name);

                $desc = $node->filter('description')->text();

                $details = substr($desc,strpos($desc,'<p>') + 3,strpos($desc,'</p>')-3);

                $url = $node->filter('link')->text(); // String. You have extracted description part from your feed

                // $pubDate = Carbon::parse($node->filter('pubDate')->text());

                $pubDate = Carbon::now()->toDateTimeString();

                $image = $node->filter('image')->text();

                // create new topic
                $Topic = new Topic;

                // Save topic details
                $Topic->row_no = $next_nor_no;
                $Topic->title_vi = $name;
                $Topic->title_en = $name;

                $Topic->details_vi = $details.'<br><a href="'.$url.'" class="pull-right" target="_blank">Chi tiết</a>';

                $Topic->details_en = $details;

                $Topic->date = $pubDate;

                $start = strpos($desc,'src="') + 5;
                $end = strpos($desc,'" />');
                
                //Storefile
                // $url = 'http://baohatinh.vn'.substr($desc,$start,$end-$start);
                $contents = file_get_contents($image);
                $filename = substr($image, strrpos($image, '/') + 1);
                // Storage::put($filename, $contents);

                $path = public_path().'/uploads/topics/'.$filename;

                file_put_contents($path,$contents);
                
                $Topic->photo_file = $filename;
                
                $Topic->webmaster_id = 11;
                
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
                $Topic->seo_description_vi = mb_substr(strip_tags(stripslashes($details)), 0, 165, 'UTF-8');
                $Topic->seo_description_en = mb_substr(strip_tags(stripslashes($details)), 0, 165, 'UTF-8');
                
                $Topic->save();

                $TopicCategory = new TopicCategory;
                $TopicCategory->topic_id = $Topic->id;
                $TopicCategory->section_id = 30;
                $TopicCategory->save();
                            
            });        }

    }

    public function dhtn($url="")
    {
        $client = new Client();

        $crawler = $client->request('GET', $url);

        $crawler->filter('table>tbody>tr')->each(function ($node) {

            if ($node->filter('td')->count() > 0) {

                if (strlen(trim($node->filter('td')->eq(0)->text())) > 0){

                        $next_nor_no = Topic::where('webmaster_id', '=', 10)->max('row_no');
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
                        
                        //Storefile

                        // $contents = file_get_contents($attach_file);
                        // $filename = substr($url, strrpos($url, '/') + 1);
                        // Storage::put($filename, $contents);

                        // $path = public_path().'/uploads/topics/'.$filename;

                        // file_put_contents($path,$contents);
                        
                        // $Topic->attach_file = $filename;
                        $Topic->attach_file = $attach_file;
                        
                        
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

                        $TopicCategory = new TopicCategory;
                        $TopicCategory->topic_id = $Topic->id;
                        $TopicCategory->section_id = 24;
                        $TopicCategory->save();
                }

//                    print $node->filter('a.icon_preview')->attr('href')."<br>";

            }
        });
    }

    public function congbao($url="")
    {

//        VanBan::where('loaitin_id','90')->delete();

        $client = new Client();

        $crawler = $client->request('GET', 'http://congbao.hatinh.gov.vn/vbpq_hatinh.nsf/VwAllDocNew');

        $crawler->filter('td > table > tr')->each(function ($node) {

            if ($node->filter('td')->count() >0){

                $exist = VanBan::where('kihieuvb',trim($node->filter('td')->eq(1)->text()))->where('slug',str_slug(trim($node->filter('td')->eq(3)->text())))->first();

                if (empty($exist)){

                    $vb = new VanBan;

                    $vb->user_id = Auth::user()->id;

                    $vb->loaitin_id = '90';
                    $vb->kihieuvb = trim($node->filter('td')->eq(1)->text());

                    $vb->ngaybanhanh = Carbon::parse(trim( str_replace("/","-", $node->filter('td')->eq(2)->text())  )  );

                    $vb->trichyeu = trim($node->filter('td')->eq(4)->text());
                    $vb->slug = str_slug(trim($node->filter('td')->eq(4)->text()));
                    $vb->daduyet = '1';
                    $vb->save();

                    $vbid = $vb->id;

                    $tvbn = new TepVanBan;

                    $tvbn->vanban_id = $vbid;

                    $tvbn->path = 'http://qppl.hatinh.gov.vn'.trim($node->filter('a')->attr('href'));

                    $tvbn->save();
                }


                $next_nor_no = Topic::where('webmaster_id', '=', 10)->max('row_no');
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
                
                //Storefile

                // $contents = file_get_contents($attach_file);
                // $filename = substr($url, strrpos($url, '/') + 1);
                // Storage::put($filename, $contents);

                // $path = public_path().'/uploads/topics/'.$filename;

                // file_put_contents($path,$contents);
                
                // $Topic->attach_file = $filename;
                $Topic->attach_file = $attach_file;
                
                
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

                $TopicCategory = new TopicCategory;
                $TopicCategory->topic_id = $Topic->id;
                $TopicCategory->section_id = 25;
                $TopicCategory->save();



            }

        });

        return redirect()->back();
    }
}
