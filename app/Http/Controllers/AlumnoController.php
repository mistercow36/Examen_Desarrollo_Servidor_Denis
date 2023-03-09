<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAlumnoRequest;
use App\Http\Requests\UpdateAlumnoRequest;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the componentes.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $alumnos = Alumno::all();
        $campos = $alumnos[0]->getAttributes();
        $campos = array_keys($campos);
        $campos = json_encode($campos);

        $alumnos = json_encode($alumnos);

        return view('crud/alumno',['alumnos' => $alumnos, "campos" => $campos, "nombres" => $alumnos]);
    }
    /**
     * Show the form for creating a new componentes.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud/create');
    }

    /**
     * Store a newly created componentes in storage.
     *
     * @param  \App\Http\Requests\StoreAlumnoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlumnoRequest $request)
    {
        $alumno = new Alumno($request->input());
        $alumno->saveOrFail();
        $alumnos = Alumno::all();
        return view('crud/alumnos',['alumnos' => $alumnos]);
    }

    /**
     * Display the specified componentes.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified componentes.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno $alumno)
    {

        return view('crud.editar',['alumno' => $alumno]);
        //
    }

    /**
     * Update the specified componentes in storage.
     *
     * @param  \App\Http\Requests\UpdateAlumnoRequest  $request
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAlumnoRequest $request, Alumno $alumno)
    {
        $valores = $request->input();
        $alumno->update($valores);
        $alumnos = Alumno::all();
        return view('crud.alumnos',['alumnos' => $alumnos]);
        //
    }

    /**
     * Remove the specified componentes from storage.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        $alumnos = Alumno::all();
        return view('crud/alumnos',['alumnos' => $alumnos]);
        //
    }
}
