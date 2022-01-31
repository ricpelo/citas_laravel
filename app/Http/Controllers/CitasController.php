<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Compania;
use App\Models\Especialidad;
use App\Models\Especialista;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CitasController extends Controller
{
    public function index()
    {
        return view('citas.index', [
            'citas' => Auth::user()->citas,
        ]);
    }

    public function destroy(Cita $cita)
    {
        $cita->user_id = null;
        $cita->compania_id = null;
        $cita->save();
        return redirect()->route('ver-citas')
            ->with('success', 'Cita anulada con éxito.');
    }

    public function create()
    {
        return view('citas.create', [
            'companias' => Compania::all(),
            'companias_usuario' => Auth::user()->companias,
        ]);
    }

    public function createEspecialidad(Compania $compania)
    {
        return view('citas.create-especialidad', [
            'compania' => $compania,
            'especialidades' => Especialidad::all(),
        ]);
    }

    public function createEspecialista(Compania $compania, Especialidad $especialidad)
    {
        $especialistas = Especialista::whereHas('especialidad', function (Builder $query) use ($especialidad) {
            $query->where('id', $especialidad->id);
        })->whereHas('companias', function (Builder $query) use ($compania) {
            $query->where('id', $compania->id);
        })->get();

        // $especialistas = Especialista::all()->filter(function ($value, $key) use ($especialidad, $compania) {
        //     return $value->especialidad == $especialidad &&
        //            $value->companias->contains($compania);
        // });

        return view('citas.create-especialista', [
            'compania' => $compania,
            'especialidad' => $especialidad,
            'especialistas' => $especialistas,
        ]);
    }

    public function createFechaHora(Compania $compania, Especialidad $especialidad, Especialista $especialista)
    {
        // La siguiente línea no hace falta porque estamos usando
        // modelos anidados en la ruta:
        // (Ver https://laravel.com/docs/8.x/routing#implicit-model-binding-scoping)
        // abort_if($especialista->especialidad != $especialidad, 404);
        abort_unless($especialista->companias->contains($compania), 404);

        return view('citas.create-fecha-hora', [
            'compania' => $compania,
            'especialidad' => $especialidad,
            'especialista' => $especialista,
            'citas' => $especialista->citas()->where('user_id', null)->get(),
        ]);
    }

    public function createConfirmar(Compania $compania, Cita $cita)
    {
        abort_unless($cita->especialista->companias->contains($compania), 404);

        return view('citas.create-confirmar', [
            'compania' => $compania,
            'cita' => $cita,
        ]);
    }

    public function storeConfirmar(Compania $compania, Cita $cita)
    {
        abort_unless($cita->especialista->companias->contains($compania), 404);

        $cita->compania_id = $compania->id;
        $cita->user_id = Auth::id();
        $cita->save();

        return redirect()->route('ver-citas')
            ->with('success', 'Cita creada con éxito.');
    }
}
