<?php

namespace App\Http\Controllers\Admin;

use App\Kelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyKelasRequest;
use App\Http\Requests\StoreKelasRequest;
use App\Http\Requests\UpdateKelasRequest;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('kelas_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kelas = Kelas::all();

        return view('admin.kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('kelas_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKelasRequest $request)
    {
        $kelas = Kelas::create($request->all());

        return redirect()->route('admin.kelas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kelas)
    {
        abort_if(Gate::denies('kelas_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kelas.show', compact('kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kelas)
    {
        abort_if(Gate::denies('kelas_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kelas.edit', compact('kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKelasRequest $request, Kelas $kelas)
    {
        $kelas->update($request->all());

        return redirect()->route('admin.kelas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kelas)
    {
        abort_if(Gate::denies('kelas_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kelas->delete();

        return back();

    }
    public function massDestroy(MassDestroyKelasRequest $request)
    {
        Kelas::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
