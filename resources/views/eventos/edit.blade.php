<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mb-3">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <header>
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Atualizar evento') }}
                    </h2>
            
                    <p class="mt-1 text-sm text-gray-600">
                        {{ __("Atualize as informações deste evento") }}
                    </p>
                </header>

                <form method="post" action="{{ route('eventos.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    <input type="hidden" name="id" id="id" value="{{$evento->id}}">
                    <div class="my-3">
                        <x-input-label for="nome" :value="__('Nome')" />
                        <x-text-input id="nome" name="nome" type="text" class="mt-1 block w-full" :value="old('nome', $evento->nome)" required autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('nome')" />
                    </div>
                    <div class="my-3">
                        <x-input-label for="nj" :value="__('Data')" />
                        <div class="mt-6 space-y-6">
                            <div class="relative flex gap-x-3">
                                <input type="datetime-local" id="date_evento" name="date_evento" value="{{old('date_evento', $evento->date_evento)}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                            </div>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('date_evento')" />
                    </div>
                    <div class="my-3">
                        <x-input-label for="nj" :value="__('Estado')" />
                        <div class="mt-6 space-y-6">
                            <div class="relative flex gap-x-3">
                                <select name="estado" id="estado" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                    <option value="AC" {{old('estado', $evento->estado) == "AC" ? "selected" : ""}}>Acre</option>
                                    <option value="AL" {{old('estado', $evento->estado) == "AL" ? "selected" : ""}}>Alagoas</option>
                                    <option value="AP" {{old('estado', $evento->estado) == "AP" ? "selected" : ""}}>Amapá</option>
                                    <option value="AM" {{old('estado', $evento->estado) == "AM" ? "selected" : ""}}>Amazonas</option>
                                    <option value="BA" {{old('estado', $evento->estado) == "BA" ? "selected" : ""}}>Bahia</option>
                                    <option value="CE" {{old('estado', $evento->estado) == "CE" ? "selected" : ""}}>Ceará</option>
                                    <option value="DF" {{old('estado', $evento->estado) == "DF" ? "selected" : ""}}>Distrito Federal</option>
                                    <option value="ES" {{old('estado', $evento->estado) == "ES" ? "selected" : ""}}>Espírito Santo</option>
                                    <option value="GO" {{old('estado', $evento->estado) == "GO" ? "selected" : ""}}>Goiás</option>
                                    <option value="MA" {{old('estado', $evento->estado) == "MA" ? "selected" : ""}}>Maranhão</option>
                                    <option value="MT" {{old('estado', $evento->estado) == "MT" ? "selected" : ""}}>Mato Grosso</option>
                                    <option value="MS" {{old('estado', $evento->estado) == "MS" ? "selected" : ""}}>Mato Grosso do Sul</option>
                                    <option value="MG" {{old('estado', $evento->estado) == "MG" ? "selected" : ""}}>Minas Gerais</option>
                                    <option value="PA" {{old('estado', $evento->estado) == "PA" ? "selected" : ""}}>Pará</option>
                                    <option value="PB" {{old('estado', $evento->estado) == "PB" ? "selected" : ""}}>Paraíba</option>
                                    <option value="PR" {{old('estado', $evento->estado) == "PR" ? "selected" : ""}}>Paraná</option>
                                    <option value="PE" {{old('estado', $evento->estado) == "PE" ? "selected" : ""}}>Pernambuco</option>
                                    <option value="PI" {{old('estado', $evento->estado) == "PI" ? "selected" : ""}}>Piauí</option>
                                    <option value="RJ" {{old('estado', $evento->estado) == "RJ" ? "selected" : ""}}>Rio de Janeiro</option>
                                    <option value="RN" {{old('estado', $evento->estado) == "RN" ? "selected" : ""}}>Rio Grande do Norte</option>
                                    <option value="RS" {{old('estado', $evento->estado) == "RS" ? "selected" : ""}}>Rio Grande do Sul</option>
                                    <option value="RO" {{old('estado', $evento->estado) == "RO" ? "selected" : ""}}>Rondônia</option>
                                    <option value="RR" {{old('estado', $evento->estado) == "RR" ? "selected" : ""}}>Roraima</option>
                                    <option value="SC" {{old('estado', $evento->estado) == "SC" ? "selected" : ""}}>Santa Catarina</option>
                                    <option value="SP" {{old('estado', $evento->estado) == "SP" ? "selected" : ""}}>São Paulo</option>
                                    <option value="SE" {{old('estado', $evento->estado) == "SE" ? "selected" : ""}}>Sergipe</option>
                                    <option value="TO" {{old('estado', $evento->estado) == "TO" ? "selected" : ""}}>Tocantins</option>
                                </select>
                            </div>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('estado')" />
                    </div>
                    <div class="my-3">
                        <x-input-label for="nj" :value="__('Cidade')" />
                        <div class="mt-6 space-y-6">
                            <div class="relative flex gap-x-3">
                                <input type="text" id="cidade" name="cidade" value="{{old('cidade', $evento->cidade)}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="São Paulo, Rio de janeiro..." required />
                            </div>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('cidade')" />
                    </div>
                    <div class="my-3">
                        <x-input-label for="nj" :value="__('CEP')" />
                        <div class="mt-6 space-y-6">
                            <div class="relative flex gap-x-3">
                                <input type="text" id="cep" name="cep" value="{{old('cep', $evento->cep)}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="00000-000" minlength="8" maxlength="9" required />
                            </div>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('cep')" />
                    </div>
                    <div class="my-3">
                        <x-input-label for="nj" :value="__('Endereço')" />
                        <div class="mt-6 space-y-6">
                            <div class="relative flex gap-x-3">
                                <input type="text" id="endereco" name="endereco" value="{{old('endereco', $evento->endereco)}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="rua, avenida.." maxlength="255" required />
                            </div>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('endereco')" />
                    </div>
                    <div class="my-3">
                        <x-input-label for="nj" :value="__('Número')" />
                        <div class="mt-6 space-y-6">
                            <div class="relative flex gap-x-3">
                                <input type="text" id="numero" name="numero" value="{{old('numero', $evento->numero)}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="111" maxlength="20" required />
                            </div>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('numero')" />
                    </div>
                    <div class="my-3">
                        <x-input-label for="nj" :value="__('Complemento')" />
                        <div class="mt-6 space-y-6">
                            <div class="relative flex gap-x-3">
                                <input type="text" id="complemento" name="complemento" value="{{old('complemento', $evento->complemento)}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="100" />
                            </div>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('complemento')" />
                    </div>
                    <div class="my-3">
                        <x-input-label for="nj" :value="__('Telefone')" />
                        <div class="mt-6 space-y-6">
                            <div class="relative flex gap-x-3">
                                <input type="text" id="telefone" name="telefone" value="{{old('telefone', $evento->telefone)}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="17" required />
                            </div>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('telefone')" />
                    </div>
                    <div class="my-3">
                        <x-input-label for="nj" :value="__('Capa')" />
                        <div class="mt-6 space-y-6">
                            <div class="relative flex gap-x-3">
                                <input type="file" id="imagem" name="imagem" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" accept="image/*" />
                            </div>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('imagem')" />
                        @if ($evento->imagem)
                            <div>
                                <img src="{{asset($evento->imagem)}}" width="230px">
                            </div>
                        @endif
                    </div>

                    <div>
                        <x-input-label :value="__('Ativar')" />
                        <div class="mt-6 space-y-6">
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="is_active" value="{{$evento->is_active}}" class="sr-only peer" @if($evento->is_active) checked @endif>
                                <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                <span class="ms-3 text-sm font-medium text-gray-900">Ativo</span>
                            </label>                                  
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('is_goalkeeper')" />
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Salvar') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>