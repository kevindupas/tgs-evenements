<x-app-layout>
    <div class="col-span-12 xxl:col-span-9">
        <div class="grid grid-cols-12 gap-6">
            <!-- BEGIN: General Report -->
            <div class="col-span-12">
                <div class="intro-y flex items-center h-10 my-8">
                        <h2 class="text-lg font-medium truncate mr-5">
                            {{ __('Dashboard') }}
                        </h2>
                        <a href="" class="ml-auto flex items-center text-theme-1 dark:text-theme-10"> <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
                </div>

                <x-jet-welcome />

            </div>
        </div>
    </div>
</x-app-layout>
