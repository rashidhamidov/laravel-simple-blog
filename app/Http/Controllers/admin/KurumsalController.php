<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

function slugOlustur($string)
            {
                //Türkçeye özgü harfleri değiştirme
                $string = str_replace('ü','u',$string);
                $string = str_replace('Ü','U',$string);
             
                $string = str_replace('ğ','g',$string);
                $string = str_replace('Ğ','G',$string);
             
                $string = str_replace('ş','s',$string);
                $string = str_replace('Ş','S',$string);
             
                $string = str_replace('ç','c',$string);
                $string = str_replace('Ç','C',$string);
             
                $string = str_replace('ö','o',$string);
                $string = str_replace('Ö','O',$string);
                
                $string = str_replace('ı','i',$string);
                $string = str_replace('İ','I',$string);
                
                $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
                
             
                return $slug;
            }        
class KurumsalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    //kurumsal listesi
    public function kurumsal_listesi(){
        $kurumsal = DB::select('select *from sayfa');

        return view('admin.kurumsal_listesi', ['kurumsal' => $kurumsal]);
    }

    


    //kurumsal ekleme
    public function kurumsal_ekleme(){

        return view('admin.kurumsal_ekleme');
    }



    public function kurumsal_save (Request $request){

             $data = $request->input();
            if($request->hasfile('resim')){
                $file=$request->file('resim');
                $name=time().$file->getClientOriginalName();
                $file->move(public_path().'/uploads/images',$name);
            }
            else{
                $name='bos_resim';
            }
            try{
            DB::table('sayfa')->insert([
                [
                'keywords'=>$data['keywords'],
                'description'=>$data['description'],
                'title'=>$data['title'],
                'content'=>$data['content'].' ',
                'image'=>$name,
                'status'=>$data['status'],
                'slug'=>slugOlustur($data['title'])
                ]
            ]);
            return redirect('/admin/kurumsal_listesi')->with('success',"Kurumsal Sayfa başarıyla eklendi");
        }catch(Exception $e){
            return redirect('/admin/kurumsal_ekleme')->with('failed',"Kurumsal Sayfa eklenemedi");
        }

    }


    
    public function kurumsal_duzenle_save (Request $request,$id){

        $data = $request->input();
       if($request->hasfile('resim')){
            $kurumsals = DB::select('select * from sayfa where id = ?',[$id]);
            $kurumsal_yolu=public_path().'/uploads/images/'.$kurumsals[0]->image;
            if(file_exists($kurumsal_yolu)){
                unlink($kurumsal_yolu);
            }
            
           $file=$request->file('resim');
           $name=time().$file->getClientOriginalName();
           $file->move(public_path().'/uploads/images',$name);
       }
       else{
        try{
            DB::update('update sayfa set keywords=?,description=?,title=?,content=?,status=?,slug=? where id = ?',
            [$data['keywords'],$data['description'],$data['title'],$data['content'],$data['status'],slugOlustur($data['title']),$id]);
        
            return redirect('/admin/kurumsal_listesi')->with('success',"Kurumsal sayfa başarıyla güncellendi");
            }catch(Exception $e){
                return redirect('/admin/kurumsal_listesi')->with('failed',"Kurumsal sayfa güncellenemedi");
            }
            
         }
       try{
            DB::update('update sayfa set keywords=?,description=?,title=?,content=?,image=?,status=?,slug=? where id = ?',
            [$data['keywords'],$data['description'],$data['title'],$data['content'],$name,$data['status'],slugOlustur($data['title']),$id ]);
        
            return redirect('/admin/kurumsal_listesi')->with('success',"Kurumsal sayfa başarıyla güncellendi");
   }catch(Exception $e){
       return redirect('/admin/kurumsal_listesi')->with('failed',"Kurumsal sayfa güncellenemedi");
   }

}

    public function kurumsal_duzenle($id) {
        $kurumsal = DB::select('select * from sayfa where id=? ',[$id]);
        
        return view('admin.kurumsal_duzenle',[
            'kurumsal' => $kurumsal
             ]);
        }
    public function kurumsal_sil($id) {
        $kurumsals = DB::select('select * from sayfa where id = ?',[$id]);

        $kurumsal_yolu=public_path().'/uploads/images/'.$kurumsals[0]->image;
        try{
            if(file_exists($kurumsal_yolu))
            unlink($kurumsal_yolu);
        }catch(Exception $es){

        }
        
        $kurumsals = DB::delete('delete  from sayfa where id = ?',[$id]);
        if($kurumsals){
            return redirect('/admin/kurumsal_listesi')->with('success',"Kurumsal Sayfa başarıyla silindi");
        }
        
        else{
            return redirect('/admin/kurumsal_listesi')->with('failed',"Kurumsal Sayfa silinemedi!!!");    
        }
        } 
        
        public function kurumsal_listesi_sil(Request $request) {

            if (isset($_POST['sub'])) {
                //connection string
                $checkbox1 = $_POST['techno'];
                foreach ($checkbox1 as $chk1) {
                    $kurumsals = DB::select('select * from sayfa where id = ?',[$chk1]);
                    $silindimi = DB::delete('delete  from sayfa where id = ?',[$chk1]);
                    $kurumsal_yolu=public_path().'/uploads/images/'.$kurumsals[0]->image;
                    try{
                        if(file_exists($kurumsal_yolu))
                        unlink($kurumsal_yolu);
                    }catch(Exception $es){

                    }
                }
                if($silindimi){
                    return redirect('/admin/kurumsal_listesi')->with('success',"Seçilmiş sayfalar başarıyla silindi");
                }
                else{
                    return redirect('/admin/kurumsal_listesi')->with('failed',"Seçilmiş sayfalar silinemedi!!!");    
                }
                } 
                    return redirect('/admin/kurumsal_listesi')->with('failed',"Yanlış işlem!!!");   
                }
                
        


    
}
