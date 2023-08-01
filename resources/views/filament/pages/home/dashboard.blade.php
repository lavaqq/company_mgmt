<x-filament-panels::page class="fi-dashboard-page">

    <h1 class="text-3xl font-extrabold">Hello, {{ auth()->user()->first_name }}</h1>

    <a href="/crm">crm</a>
    <a href="/pm">pm</a>

</x-filament-panels::page>
