<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Posts
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                    role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <div class="grid grid-flow-row grid-cols-3  gap-4">
                    <button wire:click="create()" class="relative block w-full border-2 border-gray-300 border-dashed rounded-lg p-12 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg class="mx-auto h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v20c0 4.418 7.163 8 16 8 1.381 0 2.721-.087 4-.252M8 14c0 4.418 7.163 8 16 8s16-3.582 16-8M8 14c0-4.418 7.163-8 16-8s16 3.582 16 8m0 0v14m0-4c0 4.418-7.163 8-16 8S8 28.418 8 24m32 10v6m0 0v6m0-6h6m-6 0h-6" />
                        </svg>
                        <span class="mt-2 block text-sm font-medium text-gray-900">
                        Créer un nouvel article
                        </span>
                    </button>
                @if ($isOpen)
                    @include('livewire.posts.create')
                @endif
                @foreach ($posts as $post)
                    <div class="max-w-sm rounded overflow-hidden shadow-lg">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">{{ $post->title }}</div>
                            <p class="text-gray-700 text-base">
                                {{ Str::words($post->content, 20, '...') }}
                            </p>
                            Catégorie : <a href="{{ url('dashboard/categories/' . $post->category->id . '/posts') }}"
                        class="underline">{{ $post->category->title }}</a>
                            <div class="flex">
                                @php
                                $tags=$post->tags->pluck('id', 'title');
                                @endphp
                                @if (count($tags) > 0)
                                    Tags:
                                    @foreach ($tags as $key => $tag)
                                        <a href="{{ url('dashboard/tags/' . $tag . '/posts') }}"
                                            class="underline px-1">{{ $key }}</a>
                                    @endforeach
                                @endif
                            </div>
                            <div class="flex">
                                @php
                                $salons=$post->salons->pluck('id', 'title');
                                @endphp
                                @if (count($salons) > 0)
                                    Salons:
                                    @foreach ($salons as $key => $salon)
                                        <a href="{{ url('dashboard/salons/' . $salon . '/posts') }}"
                                            class="underline px-1">{{ $key }}</a>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="px-6 pt-4 pb-2">
                            <a href="{{ url('dashboard/posts', $post->id) }}"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Voir l'article
                            </a>
                            <button wire:click="edit({{ $post->id }})"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Editer
                            </button>
                            <button wire:click="delete({{ $post->id }})"
                                class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150">
                                Supprimer
                            </button>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
        <div class="py-4">
            {{ $posts->links() }}
        </div>
    </div>
</div>
