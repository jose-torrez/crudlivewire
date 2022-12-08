<x-slot name="header">
    <h2 class="text-gray-900">CRUD LARAVEL y LIVEWIRE</h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            <button wire:click="crear()" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 my-3">Nuevo</button>
            @if($modal)
            @include('livewire.crear');
            @endif
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-indigo-600 text-white">
                        <th class="px-4 py-2">#</th>
                        <th class="px-4 py-2">Descripcion</th>
                        <th class="px-4 py-2">Cantidad</th>
                        <th class="px-4 py-2">Opc</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $pro)
                    <tr>
                        <td class="border px-4 py-2">{{$pro->id}}</td>
                        <td class="border px-4 py-2">{{$pro->descripcion}}</td>
                        <td class="border px-4 py-2">{{$pro->cantidad}}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>