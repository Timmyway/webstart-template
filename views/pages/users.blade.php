@extends('layouts.app')
@section('content')
    <div id="app" class="min-h-full">
        <div>            
            <main>
                <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                    <h1 class="text-2xl font-bold mb-4">List of users</h1>
                    <article class="bg-slate-200 p-4 shadow-lg">
                        <ul class="flex flex-col gap-4">
                            @foreach ($users as $user)
                            <li>
                                <div class="flex flex-col gap-2">
                                    <span class="font-bold">[ID {{ $user->id }}] - {{ $user->name }}</span>
                                    <span>{{ $user->email }}</span>                                
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </article>
                </div>
                <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                    <h1 class="text-2xl font-bold mb-4">List of users</h1>
                    <article class="bg-slate-200 p-4 shadow-lg">
                        <ul class="flex flex-col gap-4">
                            @foreach ($users as $user)
                            <li>
                                <div class="flex flex-col gap-2">
                                    <span class="font-bold">[ID {{ $user->id }}] - {{ $user->name }}</span>
                                    <span>{{ $user->email }}</span>                                
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </article>
                </div>
                <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                    <h1 class="text-2xl font-bold mb-4">List of users</h1>
                    <article class="bg-slate-200 p-4 shadow-lg">
                        <ul class="flex flex-col gap-4">
                            @foreach ($users as $user)
                            <li>
                                <div class="flex flex-col gap-2">
                                    <span class="font-bold">[ID {{ $user->id }}] - {{ $user->name }}</span>
                                    <span>{{ $user->email }}</span>                                
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </article>
                </div>
                <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                    <h1 class="text-2xl font-bold mb-4">List of users</h1>
                    <article class="bg-slate-200 p-4 shadow-lg">
                        <ul class="flex flex-col gap-4">
                            @foreach ($users as $user)
                            <li>
                                <div class="flex flex-col gap-2">
                                    <span class="font-bold">[ID {{ $user->id }}] - {{ $user->name }}</span>
                                    <span>{{ $user->email }}</span>                                
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </article>
                </div>
                <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                    <h1 class="text-2xl font-bold mb-4">List of users</h1>
                    <article class="bg-slate-200 p-4 shadow-lg">
                        <ul class="flex flex-col gap-4">
                            @foreach ($users as $user)
                            <li>
                                <div class="flex flex-col gap-2">
                                    <span class="font-bold">[ID {{ $user->id }}] - {{ $user->name }}</span>
                                    <span>{{ $user->email }}</span>                                
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </article>
                </div>
                <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                    <h1 class="text-2xl font-bold mb-4">List of users</h1>
                    <article class="bg-slate-200 p-4 shadow-lg">
                        <ul class="flex flex-col gap-4">
                            @foreach ($users as $user)
                            <li>
                                <div class="flex flex-col gap-2">
                                    <span class="font-bold">[ID {{ $user->id }}] - {{ $user->name }}</span>
                                    <span>{{ $user->email }}</span>                                
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </article>
                </div>
                <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                    <h1 class="text-2xl font-bold mb-4">List of users</h1>
                    <article class="bg-slate-200 p-4 shadow-lg">
                        <ul class="flex flex-col gap-4">
                            @foreach ($users as $user)
                            <li>
                                <div class="flex flex-col gap-2">
                                    <span class="font-bold">[ID {{ $user->id }}] - {{ $user->name }}</span>
                                    <span>{{ $user->email }}</span>                                
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </article>
                </div>
            </main>
        </div>     
	</div>
@endsection