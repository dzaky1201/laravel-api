<?php

namespace App\Http\Controllers;
use App\Toko;
use Illuminate\Http\Request;

class TokosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Toko::latest()->paginate(5);
        return view('index', compact('data'))
        ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image'         =>  'required|image|max:2048',
            'nama_pemilik'  =>  'required',
            'nomor_hp'      =>  'required',
            'alamat'        =>  'required',
        ]);
        $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
            'image'         =>  $new_name,
            'nama_pemilik'  =>  $request->nama_pemilik,
            'nomor_hp'      =>  $request->nomor_hp,
            'alamat'        =>  $request->alamat
        );

        Toko::create($form_data);
        return redirect('toko')->with('success', 'Data Berhasil DiUpload.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Toko::findOrFail($id);
        return view('view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Toko::findOrFail($id);
        return view('edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')
        {
            $request->validate([
                'image'         =>  'image|max:2048',
                'nama_pemilik'  =>  'required',
                'nomor_hp'      =>  'required',
                'alamat'        =>  'required'
            ]);
        $image_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $image_name);
    }
    else
    {
        $request->validate([
            'nama_pemilik'  =>  'required',
            'nomor_hp'      =>  'required',
            'alamat'        =>  'required'
        ]);
    }

    $form_data = array(
            'image'         =>  $image_name,
            'nama_pemilik'  =>  $request->nama_pemilik,
            'nomor_hp'      =>  $request->nomor_hp,
            'alamat'        =>  $request->alamat
    );

    Toko::whereId($id)->update($form_data);
    return redirect('toko')->with('success', 'Data berhasil di update');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Toko::findOrFail($id);
        $data->delete();

        return redirect('toko')->with('success', 'data berhasil di hapus');
    }
}
