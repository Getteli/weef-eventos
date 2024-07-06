<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PromoterController extends Controller
{
    /**
     * Listar promoters.
     */
    public function index(): View
    {
        $promoters = User::orderBy('created_at','DESC')->get() ?? [];

        return view('promoter.list', [
            'promoters' => $promoters,
        ]);
    }

    /**
     * Pegar informações de um promoter pelo id.
     */
    public function open($id): view
    {
        $promoter = (new User())->where('id', $id)->first() ?? [];

        return view('promoter.edit', [
            'promoter' => $promoter,
        ]);
    }

    /**
     * Atualizar promoter
     */
    public function update(Request $request): RedirectResponse
    {
        try
        {
            $promoter = (new User())->where('id', $request->id)->first();
            $promoter->fill($request->only(['name','email']));
            $promoter->save();

            return Redirect::route('promoter.open',['id' => $request->id])->with('status', 'Promoter atualizado com sucesso!');
        }
        catch (\Throwable $th)
        {
            return Redirect::route('promoter.open',['id' => $request->id])->with('status', 'Erro ao atualizar. Contacte o suporte');
        }
    }

    /**
     * cria um novo promoter
     */
    public function create(Request $request): RedirectResponse
    {
        try
        {
            $request->merge([
                'password' => Hash::make(mt_rand(1000000,99999999))
            ]);

            $promoter = User::create($request->all());

            return Redirect::route('promoter.open',['id' => $promoter->id])->with('status', 'Promoter criado com sucesso!');
        }
        catch (\Throwable $th)
        {
            return Redirect::route('promoter.form')->with('status', 'Erro ao criar. Contacte o suporte');
        }
    }

    /**
     * Form para criar promoter
     */
    public function form(): view
    {
        return view('promoter.create');
    }

    /**
     * Delete promoter
     */
    public function delete($id): RedirectResponse
    {
        $promoter = User::where('id',$id)->first();

        $promoter->delete();

        // retoma para a listagem
        $promoters = User::orderBy('created_at','DESC')->get() ?? [];

        return Redirect::route('promoter.list', [
            'promoters' => $promoters,
        ]);
    }
}