<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View
    {

        //get Data db
        $siswas = Siswa::latest()->paginate(5);
        return view('siswa.index', compact('siswas'));
    }

    public function create(): View
    {
        return view('siswa.create');
    }
    public function store(Request $request):RedirectResponse
    {
        //validate form
        $this->validate($request,[
            'nama' =>'required|min:3',
            'jk' =>'required',
            'jurusan' =>'required',
            'kelas' =>'required',
            'image' =>'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        //upload image
        $image =$request->file('image');
        $image->storeAs('public/siswas',$image->hashName());

        //create post
        Siswa::create([
            'nama' =>$request->nama,
            'jk'   =>$request->jk,
            'jurusan' =>$request->jurusan,
            'kelas' =>$request->kelas,
            'image' =>$image->hashName()
        ]);

        //redirect to index
        return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Disimpan!']);

    }
    public function show(string $id): View 
    {
        //get post by ID
       $siswa = Siswa::findOrFail($id);

         //render view with post
       return view('siswa.show', compact('siswa'));
    }
    public function edit(string $id): View
    {
       //get post by ID
       $post = Siswa::findOrFail($id);
   
       //render view with post
       return view('siswa.edit', compact('post'));
   }

   public function update(Request $request, $id): RedirectResponse
   {
       //validate form
       $this->validate($request,[
           'nama' =>'required|min:3',
           'jk' =>'required',
           'jurusan' =>'required',
           'kelas' =>'required',
           'image' =>'image|mimes:jpeg,png,jpg|max:2048'
       ]);
    //get post by ID
    $datas =Siswa::findOrFail($id);

    //check if image is uploaded
    if($request->hasFile('image')){

        //upload new image
        $image =$request->file('image');
        $image->storeAs('public/siswas', $image->hashName());
        //delete old image
        Storage::delete('public/siswas/'. $datas->image);
        //update post with new image
        $datas->update([
            'nama' =>$request->nama,
            'jk'   =>$request->jk,
            'jurusan' =>$request->jurusan,
            'kelas' =>$request->kelas,
            'image' =>$image->hashName()
        ]);

    }else{
        //update post without image
        $datas->update([
            'nama' =>$request->nama,
            'jk'   =>$request->jk,
            'jurusan' =>$request->jurusan,
            'kelas' =>$request->kelas
        ]);
    }
                //redirect to index
                return redirect()->route('siswa.index')->with(['success'=> 'Data Berhasil Diubah!']);
}
        //Hapus Data
        public function destroy($id): RedirectResponse
        {
            //get post by ID
            $post = Siswa::findOrFail($id);

            //delete post
            $post->delete();

            //redirect to index
            return redirect()->route('siswa.index')->with(['success'=> 'Data Berhasil Dihapus!']);
            
        }
    }
  

 
 