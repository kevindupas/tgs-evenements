{{-- @author Kévin Dupas <dupas.dev@gmail.com> --}}

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Salons
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                  <div class="flex">
                    <div>
                      <p class="text-sm">{{ session('message') }}</p>
                    </div>
                  </div>
                </div>
            @endif
            <button
                wire:click="create()"
                class="inline-flex items-center px-4 py-2 my-3 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                Créer un nouveau salon
            </button>
            @if($isOpen)
                @include('livewire.salons.create')
            @endif
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2">Titre</th>
                        <!-- <th class="px-4 py-2">Dernière modification</th> -->
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 1; ?>
                    @foreach($salons as $salon)
                    <tr>
                        <td class="border px-4 py-2"><?php echo $count++; ?></td>
                        <td class="border px-4 py-2">{{ $salon->title }}</td>
                        <!-- <td class="border px-4 py-2">{{ $salon->updated_at->format('d/m/Y') }}</td> -->
                        <td class="border px-4 py-2">
                        <button
                            wire:click="edit({{ $salon->id }})"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            Editer
                        </button>
                        <a href="{{ url('dashboard/salons/'. $salon->id .'/posts') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            Voir tous les articles
                        </a>
                        <button
                            wire:click="delete({{ $salon->id }})"
                            class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150">
                            Supprimer
                        </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
