<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Goutte\Client;
use App\Topic;
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
            // 'http://baohatinh.vn/rss/xa-hoi.xml',
            // 'http://baohatinh.vn/rss/chinh-tri.xml',
            // 'http://baohatinh.vn/rss/phap-luat.xml',
            // 'http://baohatinh.vn/rss/kinh-te.xml',
            // 'http://baohatinh.vn/rss/quoc-phong-an-ninh.xml',
            'http://baohatinh.vn/rss/van-hoa-giai-tri.xml'];

        foreach ($urlArray as $url) {

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

                        $Topic->details_vi = $details;
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

                });

            } else {

                echo "No item found ";
            }
        };

        return redirect()->route('topics',11);

    }

    public function getCDDH()
    {

//        VanBan::where('loaitin_id','38')->delete();

        for ($i=1;$i<10;$i++) {

            $url = "http://dhtn.hatinh.gov.vn/dhtn/portal/folder/cong-van/" . $i . ".html";;

            $client = new Client();

            $crawler = $client->request('GET', $url);

            $crawler->filter('table>tbody>tr')->each(function ($node) {

                if ($node->filter('td')->count() > 0) {

                    if (strlen(trim($node->filter('td')->eq(0)->text())) > 0){

                        $exist = VanBan::where('kihieuvb',trim($node->filter('td')->eq(0)->text()))->where('slug',str_slug(trim($node->filter('td')->eq(1)->text())))->first();

                        if (empty($exist)) {

                            $vb = new VanBan();
                            $vb->user_id = Auth::user()->id;
                            $vb->loaitin_id = '38';
                            $vb->kihieuvb = trim($node->filter('td')->eq(0)->text());
                            $vb->ngaybanhanh = Carbon::now();
                            $vb->trichyeu = trim($node->filter('td')->eq(1)->text());
                            $vb->slug = str_slug(trim($node->filter('td')->eq(1)->text()));
                            $vb->daduyet = '1';
                            $vb->save();

                            $vbid = $vb->id;

                            $tvbn = new TepVanBan;

                            $tvbn->vanban_id = $vbid;

                            $tvbn->path = 'http://dhtn.hatinh.gov.vn' . trim($node->filter('a.icon_preview')->attr('href'));

                            $tvbn->save();
                        }

                    }

//                    print $node->filter('a.icon_preview')->attr('href')."<br>";

                }
            });
        }

        return redirect()->back();
    }

    public function getVBM()
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

            }

        });

        return redirect()->back();
    }
}
