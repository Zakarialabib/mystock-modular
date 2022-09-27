<x-perfect-scrollbar as="nav" aria-label="main" class="flex flex-col flex-1 gap-4 px-3 overflow-auto">

    <x-sidebar.link title="{{ __('Dashboard') }}" href="{{ route('admin.dashboard') }}" :isActive="request()->routeIs('admin.dashboard')">
        <x-slot name="icon">
            <x-icons.dashboard class="flex-shrink-0 w-8 h-8 block my-0 mx-auto" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>

    <x-sidebar.link title="{{ __('Contact') }}" href="{{ route('admin.contact') }}" :isActive="request()->routeIs('admin.contact')">
        <x-slot name="icon">
            <x-heroicon-o-mail class="flex-shrink-0 w-8 h-8 block my-0 mx-auto" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>

    <x-sidebar.dropdown title="{{ __('Pages') }}" :active="Str::startsWith(
        request()
            ->route()
            ->uri(),
        'Pages',
    )">
        <x-sidebar.sublink title="{{ __('Sections') }}" href="{{ route('admin.sections.index') }}" 
            :active="request()->routeIs('admin.sections.index')" />
        <x-sidebar.sublink title="{{ __('Services') }}" href="{{ route('admin.services.index') }}" 
            :active="request()->routeIs('admin.services.index')" />
        <x-sidebar.sublink title="{{ __('Partners') }}" href="{{ route('admin.partners.index') }}" 
            :active="request()->routeIs('admin.partners.index')" />
        <x-sidebar.sublink title="{{ __('About') }}" href="{{ route('admin.about.index') }}" 
            :active="request()->routeIs('admin.about.index')" />
    </x-sidebar.dropdown>

    <x-sidebar.dropdown title="{{ __('Blogs') }}" :active="Str::startsWith(
        request()
            ->route()
            ->uri(),
        'Blogs',
    )">
        <x-sidebar.sublink title="{{ __('Blog list') }}" href="{{ route('admin.blogs.index') }}" 
            :active="request()->routeIs('admin.blogs.index')" />
        <x-sidebar.sublink title="{{ __('Blog Categories') }}" href="{{ route('admin.bcategories.index') }}"
            :active="request()->routeIs('admin.bcategories.index')" />
    </x-sidebar.dropdown>

    <x-sidebar.link title="{{ __('Users') }}" href="{{ route('admin.users.index') }}" :isActive="request()->routeIs('admin.users.index')">
        <x-slot name="icon">
            <x-heroicon-o-users class="flex-shrink-0 w-8 h-8 block my-0 mx-auto" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>

    <x-sidebar.dropdown title="{{ __('Settings') }}" :active="Str::startsWith(
        request()
            ->route()
            ->uri(),
        'Settings',
    )">
        <x-sidebar.sublink title="{{ __('Permission') }}" href="{{ route('admin.permissions.index') }}"
            :active="request()->routeIs('admin.permissions.index')" />
        <x-sidebar.sublink title="{{ __('Roles') }}" href="{{ route('admin.roles.index') }}" :active="request()->routeIs('admin.roles.index')" />

        <x-sidebar.sublink title="{{ __('General Settings') }}" href="{{ route('admin.settings.index') }}"
            :active="request()->routeIs('admin.settings.index')" />

        <x-sidebar.sublink title="{{ __('Languages') }}" href="{{ route('admin.language.index') }}"
            :active="request()->routeIs('admin.language.index')" />
    </x-sidebar.dropdown>

    <x-sidebar.link title="{{ __('Logout') }}" onclick="event.preventDefault();
                    document.getElementById('logoutform').submit();" href="#">
                <x-slot name="icon">
                        <x-heroicon-o-logout class="flex-shrink-0 w-8 h-8 block my-0 mx-auto" aria-hidden="true" />
                </x-slot>
    </x-sidebar.link>

</x-perfect-scrollbar>