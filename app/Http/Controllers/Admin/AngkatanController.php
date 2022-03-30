<?php

namespace App\Http\Controllers\Admin;

use App\Angkatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAngkatanRequest;
use App\Http\Requests\StoreAngkatanRequest;
use App\Http\Requests\UpdateAngkatanRequest;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class AngkatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('angkatan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $angkatans = Angkatan::all();

        return view('admin.angkatans.index', compact('angkatans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('angkatan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.angkatans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAngkatanRequest $request)
    {
        $angkatan = Angkatan::create($request->all());

        return redirect()->route('admin.angkatans.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Angkatan  $angkatan
     * @return \Illuminate\Http\Response
     */
    public function show(Angkatan $angkatan)
    {
        abort_if(Gate::denies('angkatan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.angkatans.show', compact('angkatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Angkatan  $angkatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Angkatan $angkatan)
    {
        abort_if(Gate::denies('angkatan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.angkatans.edit', compact('angkatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Angkatan  $angkatan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAngkatanRequest $request, Angkatan $angkatan)
    {
        $angkatan->update($request->all());

        return redirect()->route('admin.angkatans.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Angkatan  $angkatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Angkatan $angkatan)
    {
        abort_if(Gate::denies('angkatan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $angkatan->delete();

        return back();
    }
    public function massDestroy(MassDestroyAngkatanRequest $request)
    {
        Angkatan::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
