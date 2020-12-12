<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;
class HomeController extends Controller
{
    public function index(){
            $category= DB::select('select * from category where status = ?', ['Kategori']);
            $icerik=DB::select('select * from content where status = ?', ['Açık']);
            $setting= DB::select('select * from setting where id = ?', [1]);
            $kurumsal=DB::select('select *from sayfa where status=?',['Açık']);
            $slider=DB::select('select * from slider where status = ?', ['Açık']);
            $video=DB::select('select * from video where status = ?', ['Açık']);
            $galery=DB::select('select * from galery where status = ?', ['Açık']);
            $uygulama=DB::select('select c.id , c.title,c.keywords,c.description,c.tarih,c.image,c.status, k.title as category from content c LEFT JOIN category k ON k.status="Kategori" where c.category_id=k.id ORDER BY id DESC LIMIT 10');
            $uzman=DB::select('select c.id , c.title,c.keywords,c.description,c.tarih,c.image, c.content,c.status, k.title as category from content c LEFT JOIN category k ON k.title="Uzman" where c.category_id=k.id Order By id ASC');
            $musteri=DB::select('select c.id , c.title,c.keywords,c.description,c.tarih,c.image, c.content,c.status, k.title as category from content c LEFT JOIN category k ON k.title="Müşteri" where c.category_id=k.id Order By id ASC');
            $uzman=$uzman[0];
            //Artisan::call('view:clear');
            //return 'View cache cleared.';
            //Artisan::call('route:cache');
            //return 'Routes cache cleared.';

        return view('home.home',[
            'category'=>$category,
            'setting'=>$setting,
            'kurumsal'=>$kurumsal,
            'slider'=>$slider,
            'icerik'=>$icerik,
            'video'=>$video,
            'galery'=>$galery,
            'uygulama'=>$uygulama,
            'uzman'=>$uzman,
            'musteri'=>$musteri
            
        ]);
    }

    public function iletisim()
    {
        $setting= DB::select('select * from setting where id = ?', [1]);
        return view('home.iletisim',[
            'setting'=>$setting
        ]);
        
    }
    public function referans()
    {   
        $setting= DB::select('select * from setting where id = ?', [1]);
        $referans= DB::select('select * from referans where status = ?', ['Açık']);
        return view('home.referans',[
            'referans'=>$referans,
            'setting'=>$setting
        ]);
        
    }
    public function iletisim_send(Request $request)
    {
       $data=$request->input();
       $setting= DB::select('select *from setting where id = ?', [1]);
        Mail::send("home.mail_icerik",["data"=>$data
                        ],function ($message){
                            $setting= DB::select('select *from setting where id = ?', [1]);
                            $mail_address=$setting[0]->email;
                            $message->to( $mail_address,"Hazal Güller Emir")->subject("İletişim Form Mesajı");
        });
      return redirect('/iletisim')->with('success','Mailiniz '.$setting[0]->email .' adresine gönderilmiştir. ');
    }
    public function kurumsal_sayfa($slug)
    {
        
        $kurumsal=DB::select('select * from sayfa where slug = ? and status=?', [$slug,'Açık']);
        $kurumsal=$kurumsal[0];

        return view('home.kurumsal',[
            'kurumsal'=>$kurumsal
        ]);
        
    }
    public function icerik_sayfa($id)
    {
        
        $icerik=DB::select('select * from content where id = ? and status=?', [$id,'Açık']);
        $icerik=$icerik[0];
        $kategori=DB::select('select * from category where id = ?', [$icerik->category_id])[0];

        return view('home.icerik',[
            'kategori'=>$kategori,
            'icerik'=>$icerik
        ]);
        
    }
    public function kategori_sayfa($id)
    {   $menu=DB::select('select * from category where status = ?', ["Kategori"]);
        $setting= DB::select('select * from setting where id = ?', [1]);
        $kategori=DB::select('select * from category where id = ?', [$id] );
        $kategori=$kategori[0];
        $iceriks=DB::select('select*from content where category_id=? and status=? ORDER BY id DESC', [$id,'Açık']);
        $son_iceriks=DB::table('content')->orderBy('id', 'desc')->take(5)->get();
        return view('home.categories',[
            'kategori'=>$kategori,
            'setting'=>$setting,
            'iceriks'=>$iceriks,
            'menu'=>$menu,
            'son_iceriks'=>$son_iceriks
        ]);
        
    }
    public function kategori()
    {   

        $kategori=DB::table('category')->get();
        $kategori=$kategori[0];
        $kategori->title="Tüm Kategoriler";
        $kategori->keywords="Tüm Kategoriler";
        $kategori->description="Tüm Kategoriler";
    
        $menu=DB::select('select * from category where status = ?', ["Kategori"]);
        $setting= DB::select('select * from setting where id = ?', [1]);
        $iceriks=DB::select('select c.id,c.title,c.description,c.image,c.keywords,c.tarih from content c LEFT JOIN category k ON k.status="Kategori" WHERE c.category_id=k.id and c.status="Açık"  ORDER BY id DESC');
        $son_iceriks=DB::table('content')->orderBy('id', 'desc')->take(5)->get();
        return view('home.categories',[
            'kategori'=>$kategori,
            'setting'=>$setting,
            'iceriks'=>$iceriks,
            'menu'=>$menu,
            'son_iceriks'=>$son_iceriks
        ]);
        
    }
    public function search(Request $request)

    {   
        $data=$request->input();
        $aranan_kelime=$data['aranan_kelime'];
        $menu=DB::select('select * from category where status = ?', ["Kategori"]);
        $setting= DB::select('select * from setting where id = ?', [1]);
        $iceriks= DB::table('content')
                ->where([
                    ['title', 'like','%'.$aranan_kelime.'%'],
                    ['status','=','Açık']
                ])
                ->get();
        $son_iceriks=DB::table('content')->orderBy('id', 'desc')->take(5)->get();
        return view(
            'home.search',[
            'aranan_kelime'=>$aranan_kelime,
            'setting'=>$setting,
            'iceriks'=>$iceriks,
            'menu'=>$menu,
            'son_iceriks'=>$son_iceriks
        ]);
        
    }
    
}
