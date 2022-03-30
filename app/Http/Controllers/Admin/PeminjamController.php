<?php

namespace App\Http\Controllers\Admin;

use App\Peminjam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPeminjamRequest;
use App\Http\Requests\StorePeminjamRequest;
use App\Http\Requests\UpdatePeminjamRequest;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class PeminjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('peminjam_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $peminjams = Peminjam::all();

        return view('admin.peminjams.index', compact('peminjams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('peminjam_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.peminjams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePeminjamRequest $request)
    {
        $peminjam = Peminjam::create($request->all());

        return redirect()->route('admin.peminjams.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Peminjam  $peminjam
     * @return \Illuminate\Http\Response
     */
    public function show(Peminjam $peminjam)
    {
        abort_if(Gate::denies('peminjam_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.peminjams.show', compact('peminjam'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Peminjam  $peminjam
     * @return \Illuminate\Http\Response
     */
    public function edit(Peminjam $peminjam)
    {
        abort_if(Gate::denies('peminjam_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.peminjams.edit', compact('peminjam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Peminjam  $peminjam
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePeminjamRequest $request, Peminjam $peminjam)
    {
        $peminjam->update($request->all());

        return redirect()->route('admin.peminjams.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Peminjam  $peminjam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peminjam $peminjam)
    {
        abort_if(Gate::denies('peminjam_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $peminjam->delete();

        return back();
    }
    public function massDestroy(MassDestroyPeminjamRequest $request)
    {
        Peminjam::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
