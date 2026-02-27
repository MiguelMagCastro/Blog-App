<x-layout title="Perfil de {{ $user->name }}">

    <div class="max-w-2xl mx-auto space-y-6">

        <!-- Card do perfil -->
        <div class="card bg-base-100 shadow">
            <div class="card-body items-center text-center space-y-2">
                <div class="avatar">
                    <div class="size-20 rounded-full">
                        <img
                            src="https://avatars.laravel.cloud/{{ md5(strtolower(trim($user->email))) }}"
                            alt="{{ $user->name }}'s avatar"
                            class="rounded-full"
                        />
                    </div>
                </div>

                <h2 class="text-2xl font-bold">{{ $user->name }}</h2>
                <p class="text-sm text-base-content/60">
                    criado em {{ $user->created_at->format('M Y') }}
                </p>

                <div class="stats shadow mt-4">
                    <div class="stat">
                        <div class="stat-title">Chirps</div>
                        <div class="stat-value">{{ $chirps->count() }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Lista de chirps -->
        <div class="space-y-4">
            <h3 class="text-xl font-semibold">Publicações</h3>

            @forelse ($chirps as $chirp)
                <x-chirp :chirp="$chirp" />
            @empty
                <div class="alert alert-info">
                    Este usuário ainda não publicou nada.
                </div>
            @endforelse
        </div>

    </div>

</x-layout>
