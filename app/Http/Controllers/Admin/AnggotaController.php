<?php

namespace App\Http\Controllers\Admin;

use App\Anggota;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAnggotaRequest;
use App\Http\Requests\StoreAnggotaRequest;
use App\Http\Requests\UpdateAnggotaRequest;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('anggota_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $anggotas = Anggota::all();

        return view('admin.anggotas.index', compact('anggotas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('anggota_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.anggotas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnggotaRequest $request)
    {
        $anggota = Anggota::create($request->all());

        return redirect()->route('admin.anggotas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function show(Anggota $anggota)
    {
        abort_if(Gate::denies('anggota_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.anggotas.show', compact('anggota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function edit(Anggota $anggota)
    {
        abort_if(Gate::denies('anggota_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.anggotas.edit', compact('anggota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnggotaRequest $request, Anggota $anggota)
    {
        $anggota->update($request->all());

        return redirect()->route('admin.anggotas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anggota $anggota)
    {
        abort_if(Gate::denies('anggota_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $anggota->delete();

        return back();
    }
    public function massDestroy(MassDestroyAnggotaRequest $request)
    {
        Anggota::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
