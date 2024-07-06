<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Atualizar promoter') }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __("Atualize os dados do(a) promoter") }} {{$promoter->name}}
                        </p>
                    </header>
                
                    <form method="post" action="{{ route('promoter.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')

                        <input type="hidden" name="id" id="id" value="{{$promoter->id}}">
                        <div>
                            <x-input-label for="name" :value="__('Nome')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $promoter->name)" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                        <div>
                            <x-input-label for="name" :value="__('Email')" />
                            <x-text-input id="email" name="email" type="text" class="mt-1 block w-full" :value="old('email', $promoter->email)" required autofocus autocomplete="email" />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Salvar') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>