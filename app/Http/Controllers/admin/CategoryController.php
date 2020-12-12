<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
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

    //kategori_listesi
    public function kategori_listesi(){
        $category = DB::select('select *from category');

        return view('admin.kategori_listesi', ['category' => $category]);
    }

//kategori_ekleme
public function kategori_ekleme(){

    return view('admin.kategori_ekleme');
}



public function kategori_save (Request $request){

        $data = $request->input();

        try{
        DB::table('category')->insert([
            [
            'keywords'=>$data['keywords'],
            'description'=>$data['description'],
            'title'=>$data['title'],
            'status'=>$data['status']
            ]
        ]);
        return redirect('/admin/kategori_listesi')->withSuccess(" Kategori başarıyla eklendi");
    }catch(Exception $e){
        return redirect('/admin/kategori_listesi')->with('failed',"Kategori Eklenemedi!!!");
    }

}


//kategori duzenleme 
public function kategori_duzenle_save (Request $request,$id){

    $data = $request->input();
   
    try{
        DB::update('update category set keywords=?,description=?,title=?,status=? where id = ?',
        [$data['keywords'],$data['description'],$data['title'],$data['status'],$id ]);
    
        return redirect('/admin/kategori_listesi')->with('success',"Kategori başarıyla güncellendi");
        }
        catch(Exception $e){
            return redirect('/admin/kategori_listesi')->with('failed',"Kategori güncellenemedi");
        }
        

}

public function kategori_duzenle($id) {
    $category = DB::select('select * from category where id=? ',[$id]);

    return view('admin.kategori_duzenle',[

        'category' => $category
         ]);
    }


public function kategori_sil($id) {

    $silindimi = DB::delete('delete  from category where id = ?',[$id]);
    if($silindimi){
        return redirect('/admin/kategori_listesi')->with('success',"Kategori Başarıyla silindi");
    }
    
    else{
        return redirect('/admin/kategori_listesi')->with('failed',"Kategori silinemedi!!!");    
    }
    }    

public function kategori_listesi_sil(Request $request) {

    if (isset($_POST['sub'])) {
        //connection string
        $checkbox1 = $_POST['techno'];
        foreach ($checkbox1 as $chk1) {
            
            $silindimi = DB::delete('delete  from category where id = ?',[$chk1]);
        }
        if($silindimi){
            return redirect('/admin/kategori_listesi')->with('success',"Seçilmiş kategoriler başarıyla silindi");
        }
        else{
            return redirect('/admin/kategori_listesi')->with('failed',"Kategori silinemedi!!!");    
        }
        }
            return redirect('/admin/kategori_listesi')->with('failed',"Yanlış işlem!!!");  
        }    


}
