<?php

namespace App\Http\Controllers;

use App\Models\Eventos;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;
use Illuminate\View\View;

class EventosController extends Controller
{
    /**
     * Listar os eventos.
     */
    public function index(Request $request): View
    {
        $eventos = Eventos::orderBy('created_at','DESC')->get() ?? [];

        return view('eventos.list',[
            'eventos' => $eventos
        ]);
    }

    /**
     * Abrir informações de um evento pelo id.
     */
    public function open($id): view
    {
        $evento = (new Eventos())->where('id', $id)->with('users')->first() ?? [];

        return view('eventos.edit', [
            'evento' => $evento,
        ]);
    }

    /**
     * Atualizar dados do evento.
     */
    public function update(Request $request): RedirectResponse
    {
        try
        {
            $request->merge([
                'is_active' => $request->is_active ? 1 : 0,
            ]);

            $evento = (new Eventos())->where('id', $request->id)->first();

			// Capa
			if( $request->hasFile('imagem') )
			{
                // se tiver uma capa anterior, exclui
                if($evento->imagem)
                {
                    // Exclua a imagem do storage
                    $filePathName = storage_path('app/public' . str_replace("/images", "", $evento->imagem));
                    if (file_exists($filePathName)) {
                        unlink($filePathName);
                    }

                    // Exclua a imagem do public path
                    if (file_exists(public_path($evento->imagem))) {
                        unlink(public_path($evento->imagem));
                    }
                }
                // salva a nova capa
                $file = $request->file('imagem');
				$file_name = time() . '.jpg';
				$file_path = storage_path('app/public/eventos/' . $file_name);
                $path = "/images/eventos/" . $file_name;

				// Save image
				Image::make($request->file('imagem'))->save($file_path);

                $destinationPath = public_path('images/eventos'); // Pasta de destino

                // Move a imagem para a pasta de destino
                $file->move($destinationPath, $file_name);

				$evento->imagem = $path;
			}
            $evento->fill($request->only(['nome','date_evento','estado','cidade','cep','endereco','numero','complemento','telefone']));
            $evento->save();
            
            return Redirect::route('eventos.open',['id'=>$evento->id])->with('status', 'Evento atualizado com sucesso');
        }
        catch (\Throwable $th)
        {
            // return Redirect::route('eventos.open',['id'=>$evento->id])->with('status', 'Erro ao atualizar. Contacte o suporte');
            return Redirect::route('eventos.open',['id'=>$evento->id])->with('status', $th->getMessage());
        }
    }

    /**
     * Formulario para criar um evento.
     */
    public function form(): view
    {
        return view('eventos.create');
    }

    /**
     * Metodo para criar um evento
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function create(Request $request): RedirectResponse
    {
        try
        {
            $newevento = (new Eventos($request->only(['nome','date_evento','estado','cidade','cep','endereco','numero','complemento','telefone'])));
            $newevento->is_active = true;
            $newevento->user_id = auth()->user()->id;

			// Capa
			if( $request->hasFile('imagem') )
			{
                $file = $request->file('imagem');
				$file_name = time() . '.jpg';
				$file_path = storage_path('app/public/eventos/' . $file_name);
                $path = "/images/eventos/" . $file_name;

				// Save image
				Image::make($request->file('imagem'))->save($file_path);

                $destinationPath = public_path('images/eventos'); // Pasta de destino

                // Move a imagem para a pasta de destino
                $file->move($destinationPath, $file_name);

				$newevento->imagem = $path;
			}

            $newevento->save();

            DB::commit();
            return Redirect::route('eventos.list');
        }
        catch (\Throwable $th)
        {
            return Redirect::route('eventos.form')->with('status', 'Erro ao criar. Contacte o suporte');
        }
    }

    /**
     * Excluir um evento
     */
    public function delete($id): RedirectResponse
    {
        $evento = Eventos::where('id',$id)->first();

        $evento->delete();

        // retoma para a listagem
        $eventos = Eventos::orderBy('created_at','DESC')->get() ?? [];

        return Redirect::route('eventos.list', [
            'eventos' => $eventos,
        ]);
    }
}