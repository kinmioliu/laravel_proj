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
                href="?catalogue={{ $catalogue->name }}&{{http_build_query(request()->except('catalogue', 'page')) }}"
                :active="request()->is('catalogue/'.$catalogue->name)"
                >
                {{ ucwords($catalogue->name) }}
            </x-dropdown-item>
        @endforeach
    </x-dropdown>