
        <header class="max-w-xl mx-auto mt-20 text-center">
            <h1 class="text-4xl">
                Latest <span class="text-blue-500">Laravel From Scratch</span> News
            </h1>
            <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4">
                <!--  Category -->
                <x-dropdown>
                    <x-slot name="trigger">
                        <button 
                            @click="show = !show" 
                            class="py-2 pl-3 pr-9 text-sm font-semibold w-32 text-left flex lg:inline-flex"
                            >
                            {{ isset($currentCatalogue) ? $currentCatalogue->name : 'Catalogues'}}
                            <x-icon name="arrow-down" class="pointer-events-none" style="right: 12px;"/>
                        </button>  
                    </x-slot>

                    <x-dropdown-item href="/" :active="request()->routeIs('home')">All</x-dropdown-item>                        
                    @foreach ($catalogues as $catalogue)
                        <x-dropdown-item 
                            href="?catalogue={{ $catalogue->name }}"
                            :active="request()->is('catalogue/'.$catalogue->name)"
                            >
                            {{ ucwords($catalogue->name) }}
                        </x-dropdown-item>
                    @endforeach
                </x-dropdown>
                
                <!-- Search -->
                <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
                    <form method="GET" action="#">
                        <input type="text" name="search" placeholder="Find something"
                                class="bg-transparent placeholder-black font-semibold text-sm">
                    </form>
                </div>
            </div>
        </header>