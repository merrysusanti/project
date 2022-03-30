<?php

namespace App\Http\Controllers\Admin;

use App\Pengunjung;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPengunjungRequest;
use App\Http\Requests\StorePengunjungRequest;
use App\Http\Requests\UpdatePengunjungRequest;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class PengunjungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('pengunjung_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pengunjungs = Pengunjung::all();

        return view('admin.pengunjungs.index', compact('pengunjungs'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('pengunjung_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pengunjungs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePengunjungRequest $request)
    {
        $pengunjung = Pengunjung::create($request->all());

        return redirect()->route('admin.pengunjungs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pengunjung  $pengunjung
     * @return \Illuminate\Http\Response
     */
    public function show(Pengunjung $pengunjung)
    {
        abort_if(Gate::denies('pengunjung_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pengunjungs.show', compact('pengunjung'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengunjung  $pengunjung
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengunjung $pengunjung)
    {
        abort_if(Gate::denies('pengunjung_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pengunjungs.edit', compact('pengunjung'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pengunjung  $pengunjung
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePengunjungRequest $request, Pengunjung $pengunjung)
    {
        $pengunjung->update($request->all());

        return redirect()->route('admin.pengunjungs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengunjung  $pengunjung
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengunjung $pengunjung)
    {
        abort_if(Gate::denies('pengunjung_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pengunjung->delete();

        return back();
    }

    public function massDestroy(MassDestroyPengunjungRequest $request)
    {
        Pengunjung::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
