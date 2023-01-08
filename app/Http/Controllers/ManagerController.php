<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use App\Models\transaksi;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\PDF;


class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manajer = Manager::latest()->paginate(5);

        return view('Manajer.index',compact('manajer'))
        ->with('i', (request()->input('page', 1)- 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $manajer = Manager::all();
        return view('Manajer.create',compact('manajer'));
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
            'nama_menu'=>'required',
            'harga'=>'required|min:0',
            'deskripsi'=>'required',
            'ketersediaan' => 'required|min:1'
        ]);

        Manager::create($request->all());
        return redirect()->route('Manajer.index')->with('Success','Berhasil Menyimpan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function show(Manager $manager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Manager::findOrFail($id);
        return view('Manajer.edit', compact('menu'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data= Manager::find($id);

        $store= $data->update($request->all());

        if($store){
            return redirect()->route('Manajer.index')
            ->with('Success','Berhasil Mengedit !');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $manajer = Manager::findOrFail($id);
        $manajer->delete();

        if ($manajer) {
            return redirect()
                ->route('Manajer.index')
                ->with([
                    'Success' => 'Post has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('Manajer.index')
                ->with([
                    'Error' => 'Some problem has occurred, please try again'
                ]);
        }
    }


    public function laporan(){
        $report = transaksi::latest()->paginate(20);
        $total = transaksi::select(DB::raw('SUM(total_harga) as total'))->get()->first()->total;
        return view('Manajer.laporan', compact('report','total'));
    }

    public function search(Request $request){
        $from = $request->from;
        $to = $request->to;
        $report = transaksi::whereBetween('tanggal', array($from,$to))->paginate(20);
        $total = transaksi::select(DB::raw('SUM(total_harga) as total'))->whereBetween('tanggal', array($from,$to))->get()->first()->total;
        return view('Manajer.laporan', compact('report','total'));
    }

    public function cetak(){
        $transaksi = transaksi::all();
        $total = transaksi::select(DB::raw('SUM(total_harga) as total'))->get()->first()->total;
            return view('Manajer.laporan_pdf',compact('transaksi','total'));
    }
}
