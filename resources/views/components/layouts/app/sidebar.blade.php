@php
    // Determine the currently logged in user based on guards
    $currentUser = auth('admin')->user() ?? auth('technician')->user() ?? auth()->user();
@endphp

@if ($currentUser)

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-[#000000] text-[#1F2937]">
        <flux:sidebar sticky stashable class="border-e border-[#E5E7EB] bg-[#FFFFFF]">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
                <x-app-logo />
            </a>

            <flux:navlist variant="outline">
                {{-- <flux:navlist.group :heading="('Platform')" class="grid">
                    <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>{{ __('Dashboard') }}</flux:navlist.item>
                </flux:navlist.group> --}}

                {{-- <flux:navlist.group :heading="('Dummy')" class="grid">
                    <flux:navlist.item icon="clipboard-list" :href="route('result.score')" :current="request()->routeIs('result.score')" wire:navigate>{{ __('Result Score') }}</flux:navlist.item>
                    <flux:navlist.item icon="edit" :href="route('result.form')" :current="request()->routeIs('result.form')" wire:navigate>{{ __('Add Result') }}</flux:navlist.item>
                    <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>{{ __('Sport') }}</flux:navlist.item>
                </flux:navlist.group>

                <flux:navlist.group :heading="('Sport')" class="grid">
                    <flux:navlist.item icon="clipboard-list" :href="route('technician.resultscore')" :current="request()->routeIs('technician.resultscore')" wire:navigate>{{ __('Result Score') }}</flux:navlist.item>
                    <flux:navlist.item icon="edit" :href="route('technician-resultform')" :current="request()->routeIs('technician-resultform')" wire:navigate>{{ __('Add Result') }}</flux:navlist.item>
                    <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>{{ __('Sport') }}</flux:navlist.item>
                </flux:navlist.group> --}}



                {{-- @if (auth('admin')->check())
                <flux:navlist.group :heading="('Admin Panel')" class="grid">
                    <flux:navlist.item icon="clipboard-list" :href="route('admin.result.score')" :current="request()->routeIs('admin.result.score')" wire:navigate>{{ __('Result Score') }}</flux:navlist.item>
                    <flux:navlist.item icon="edit" :href="route('admin.result.form')" :current="request()->routeIs('admin.result.form')" wire:navigate>{{ __('Add Result') }}</flux:navlist.item>
                </flux:navlist.group>
                @elseif (auth('technician')->check())
                    <flux:navlist.group :heading="('Technician Tools')" class="grid">
                        <flux:navlist.item icon="clipboard-list" :href="route('technician.resultscore')" :current="request()->routeIs('technician.resultscore')" wire:navigate>{{ __('Result Score') }}</flux:navlist.item>
                        <flux:navlist.item icon="edit" :href="route('technician.resultform')" :current="request()->routeIs('technician.resultform')" wire:navigate>{{ __('Add Result') }}</flux:navlist.item>
                    </flux:navlist.group>
                @endif --}}

                @if ($currentUser->hasRole('admin'))
                    <flux:navlist.group :heading="('General Panel')" class="grid">
                        <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>{{ __('Dashboard') }}</flux:navlist.item>
                    </flux:navlist.group>
                    <flux:navlist.group :heading="('Admin Panel')" class="grid">
                        <flux:navlist.item icon="home" :href="route('adminteam')" :current="request()->routeIs('adminteam')" wire:navigate>{{ __('Team') }}</flux:navlist.item>
                        <flux:navlist.item icon="home" :href="route('adminsport')" :current="request()->routeIs('adminsport')" wire:navigate>{{ __('Sport') }}</flux:navlist.item>
                        {{-- <flux:navlist.item icon="clipboard-list" :href="route('admin.result.score')" :current="request()->routeIs('admin.result.score')" wire:navigate>{{ __('Sport Detail') }}</flux:navlist.item> --}}
                        <flux:navlist.item icon="home" :href="route('adminrule')" :current="request()->routeIs('adminrule')" wire:navigate>{{ __('Rules') }}</flux:navlist.item>
                        {{-- <flux:navlist.item icon="edit" :href="route('admin.result.form')" :current="request()->routeIs('admin.result.form')" wire:navigate>{{ __('Rules') }}</flux:navlist.item> --}}
                        <flux:navlist.item icon="home" :href="route('adminschedule')" :current="request()->routeIs('adminschedule')" wire:navigate>{{ __('Schedule') }}</flux:navlist.item>
                    </flux:navlist.group>

                @elseif ($currentUser->hasRole('technician'))
                    <flux:navlist.group :heading="('General Panel')" class="grid">
                        <flux:navlist.item icon="home" :href="route('techniciandashboard')" :current="request()->routeIs('techniciandashboard')" wire:navigate>{{ __('Dashboard') }}</flux:navlist.item>
                    </flux:navlist.group>
                    <flux:navlist.group :heading="('Technician Tools')" class="grid">
                        <flux:navlist.item icon="clipboard-list" :href="route('technicianrule')" :current="request()->routeIs('technicianrule')" wire:navigate>{{ __('Rules') }}</flux:navlist.item>
                        <flux:navlist.item icon="clipboard-list" :href="route('technicianschedule')" :current="request()->routeIs('technicianschedule')" wire:navigate>{{ __('Schedule') }}</flux:navlist.item>
                        {{-- <flux:navlist.item icon="clipboard-list" :href="route('result.score')" :current="request()->routeIs('result.score')" wire:navigate>{{ __('Technician Result Score') }}</flux:navlist.item> --}}
                        {{-- <flux:navlist.item icon="edit" :href="route('result.form')" :current="request()->routeIs('result.form')" wire:navigate>{{ __('Technician Add Result') }}</flux:navlist.item> --}}
                        {{-- <flux:navlist.item icon="clipboard-list" :href="route('technician.resultscore')" :current="request()->routeIs('technician.resultscore')" wire:navigate>{{ __('Result Score') }}</flux:navlist.item>
                        <flux:navlist.item icon="edit" :href="route('technician.resultform')" :current="request()->routeIs('technician.resultform')" wire:navigate>{{ __('Add Result') }}</flux:navlist.item> --}}
                    </flux:navlist.group>
                @endif
                
            </flux:navlist>

            <flux:spacer />

            <flux:navlist variant="outline">
                <flux:navlist.item icon="folder-git-2" href="https://github.com/laravel/livewire-starter-kit" target="_blank">
                {{ __('Repository') }}
                </flux:navlist.item>

                <flux:navlist.item icon="book-open-text" href="https://laravel.com/docs/starter-kits#livewire" target="_blank">
                {{ __('Documentation') }}
                </flux:navlist.item>
            </flux:navlist>

            <!-- User Menu -->
            <flux:dropdown position="bottom" align="start">
                <flux:profile :name="$currentUser->name" :initials="$currentUser->initials()" icon-trailing="chevrons-up-down" />
                <flux:menu class="w-[220px]">
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                        {{ $currentUser->initials() }}
                                    </span>
                                </span>
                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ $currentUser->name }}</span>
                                    <span class="truncate text-xs">{{ $currentUser->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>

            <!-- Desktop User Menu -->
            {{-- <flux:dropdown position="bottom" align="start">
                <flux:profile
                    :name="auth()->user()->name"
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevrons-up-down"
                />

                <flux:menu class="w-[220px]">
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown> --}}
        </flux:sidebar>

        <!-- Mobile User Menu -->
        {{-- <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevron-down"
                />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header> --}}

        {{ $slot }}

        @fluxScripts
    </body>
</html>
@endif