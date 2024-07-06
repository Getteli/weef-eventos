<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center gap-4 ms-5 mb-3">
                <a href="{{route('promoter.form')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" type="button">{{ __('Criar novo Promoter') }}</a>
            </div>

            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nome
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Criado em
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Ações
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($promoters as $promoter)
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap">
                                    {{$promoter->name}}
                                </th>
                                <td class="px-6 py-3">
                                    {{$promoter->email}}
                                </td>
                                <td class="px-6 py-3">
                                    {{$promoter->created_at->format('d/m/Y H:i:s')}}
                                </td>
                                <td class="px-6 py-3">
                                    <a href="{{route('promoter.open',['id' => $promoter->id])}}">editar</a> |
                                    <form method="POST" action="{{ route('promoter.delete',['id' => $promoter->id]) }}">
                                        @csrf
                                        @method('delete')
                                        <a href="{{route('promoter.delete',['id' => $promoter->id])}}" onclick="event.preventDefault(); this.closest('form').submit();">
                                            {{ __('desativar') }}
                                        </a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>