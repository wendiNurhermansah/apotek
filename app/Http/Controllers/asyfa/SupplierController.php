<?php

namespace App\Http\Controllers\asyfa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Yajra\DataTables\Facades\DataTables;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('supplier.index');
    }

    public function api(){
        $supplier = Supplier::all();
        return DataTables::of($supplier)
       

            ->addColumn('action', function ($p) {
                return "
                    <a href='#' onclick='edit(" . $p->id . ")' title='Edit'><i class='icon-pencil mr-1'></i></a>
                    <a href='#' onclick='remove(" . $p->id . ")' class='text-danger' title='Hapus'><i class='icon-remove'></i></a>";
            })

           

            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'n_supplier' => 'required'
        ]);
       
        $supplier = new Supplier();
        $supplier->n_supplier =$request->n_supplier;
        $supplier->no_hp =$request->no_hp;
        $supplier->alamat =$request->alamat;
        $supplier->save();

        return response()->json([
            'message' => 'Data berhasil tersimpan.'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Supplier::find($id);
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
        $supplier = Supplier::find($id);
        $request->validate([
            'n_supplier' => 'required'
        ]);
        $sup = $request->n_supplier;
        $hp = $request->no_hp;
        $alamat = $request->alamat;
        $supplier->update([
            'n_supplier' => $sup,
            'no_hp' => $hp,
            'alamat' => $alamat,
        ]);

        return response()->json([
            'message' => 'Data berhasil dirubah.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Supplier::destroy($id);
        return response()->json([
            'message' => 'Data berhasil di hapus.'
        ]);
    }
}
