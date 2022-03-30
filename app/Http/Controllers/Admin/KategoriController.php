<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyKategoriRequest;
use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;
use App\Kategori;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('kategori_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kategoris = Kategori::all();

        return view('admin.kategoris.index', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('kategori_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kategoris.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKategoriRequest $request)
    {
        $category = Kategori::create($request->all());

        return redirect()->route('admin.kategoris.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        abort_if(Gate::denies('kategori_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kategoris.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        abort_if(Gate::denies('kategori_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kategoris.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKategoriRequest $request, Kategori $kategori)
    {
        $kategori->update($request->all());

        return redirect()->route('admin.kategoris.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        abort_if(Gate::denies('kategori_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kategori->delete();

        return back();
    }

    public function massDestroy(MassDestroyKategoriRequest $request)
    {
        Kategori::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
