<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Organizar evento') }}
                        </h2>
                    </header>
                </div>
            </div>
        </div>

        <form method="post" action="{{ route('eventos.create') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mt-3">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="my-3">
                            <x-input-label for="nj" :value="__('Nome')" />
                            <div class="mt-6 space-y-6">
                                <div class="relative flex gap-x-3">
                                    <input type="text" id="nome" name="nome" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Evento, Festa, Choppada.." step="1" min="3" required />
                                </div>
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('nome')" />
                        </div>
                        <div class="my-3">
                            <x-input-label for="nj" :value="__('Data')" />
                            <div class="mt-6 space-y-6">
                                <div class="relative flex gap-x-3">
                                    <input type="datetime-local" id="date_evento" name="date_evento" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                                </div>
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('date_evento')" />
                        </div>
                        <div class="my-3">
                            <x-input-label for="nj" :value="__('Estado')" />
                            <div class="mt-6 space-y-6">
                                <div class="relative flex gap-x-3">
                                    <select name="estado" id="estado" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                        <option value="AC">Acre</option>
                                        <option value="AL">Alagoas</option>
                                        <option value="AP">Amapá</option>
                                        <option value="AM">Amazonas</option>
                                        <option value="BA">Bahia</option>
                                        <option value="CE">Ceará</option>
                                        <option value="DF">Distrito Federal</option>
                                        <option value="ES">Espírito Santo</option>
                                        <option value="GO">Goiás</option>
                                        <option value="MA">Maranhão</option>
                                        <option value="MT">Mato Grosso</option>
                                        <option value="MS">Mato Grosso do Sul</option>
                                        <option value="MG">Minas Gerais</option>
                                        <option value="PA">Pará</option>
                                        <option value="PB">Paraíba</option>
                                        <option value="PR">Paraná</option>
                                        <option value="PE">Pernambuco</option>
                                        <option value="PI">Piauí</option>
                                        <option value="RJ">Rio de Janeiro</option>
                                        <option value="RN">Rio Grande do Norte</option>
                                        <option value="RS">Rio Grande do Sul</option>
                                        <option value="RO">Rondônia</option>
                                        <option value="RR">Roraima</option>
                                        <option value="SC">Santa Catarina</option>
                                        <option value="SP">São Paulo</option>
                                        <option value="SE">Sergipe</option>
                                        <option value="TO">Tocantins</option>
                                    </select>
                                </div>
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('estado')" />
                        </div>
                        <div class="my-3">
                            <x-input-label for="nj" :value="__('Cidade')" />
                            <div class="mt-6 space-y-6">
                                <div class="relative flex gap-x-3">
                                    <input type="text" id="cidade" name="cidade" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="São Paulo, Rio de janeiro..." required />
                                </div>
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('cidade')" />
                        </div>
                        <div class="my-3">
                            <x-input-label for="nj" :value="__('CEP')" />
                            <div class="mt-6 space-y-6">
                                <div class="relative flex gap-x-3">
                                    <input type="text" id="cep" name="cep" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="00000-000" minlength="8" maxlength="9" required />
                                </div>
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('cep')" />
                        </div>
                        <div class="my-3">
                            <x-input-label for="nj" :value="__('Endereço')" />
                            <div class="mt-6 space-y-6">
                                <div class="relative flex gap-x-3">
                                    <input type="text" id="endereco" name="endereco" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="rua, avenida.." maxlength="255" required />
                                </div>
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('endereco')" />
                        </div>
                        <div class="my-3">
                            <x-input-label for="nj" :value="__('Número')" />
                            <div class="mt-6 space-y-6">
                                <div class="relative flex gap-x-3">
                                    <input type="text" id="numero" name="numero" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="111" maxlength="20" required />
                                </div>
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('numero')" />
                        </div>
                        <div class="my-3">
                            <x-input-label for="nj" :value="__('Complemento')" />
                            <div class="mt-6 space-y-6">
                                <div class="relative flex gap-x-3">
                                    <input type="text" id="complemento" name="complemento" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="100" />
                                </div>
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('complemento')" />
                        </div>
                        <div class="my-3">
                            <x-input-label for="nj" :value="__('Telefone')" />
                            <div class="mt-6 space-y-6">
                                <div class="relative flex gap-x-3">
                                    <input type="text" id="telefone" name="telefone" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="17" required />
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
                        </div>
                        <div class="flex items-center gap-4 mt-5">
                            <x-primary-button>{{ __('Criar evento') }}</x-primary-button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>