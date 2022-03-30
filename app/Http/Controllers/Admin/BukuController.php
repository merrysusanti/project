<?php

namespace App\Http\Controllers\Admin;

use App\Buku;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBukuRequest;
use App\Http\Requests\StoreBukuRequest;
use App\Http\Requests\UpdateBukuRequest;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('buku_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bukus = Buku::all();

        return view('admin.bukus.index', compact('bukus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('buku_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bukus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBukuRequest $request)
    {
        $buku = Buku::create($request->all());

        return redirect()->route('admin.bukus.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $buku)
    {
        abort_if(Gate::denies('buku_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bukus.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit(Buku $buku)
    {
        abort_if(Gate::denies('buku_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bukus.edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBukuRequest $request, Buku $buku)
    {
        $buku->update($request->all());

        return redirect()->route('admin.bukus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buku $buku)
    {
        abort_if(Gate::denies('buku_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $buku->delete();

        return back();
    }
    public function massDestroy(MassDestroyBukuRequest $request)
    {
        Buku::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
