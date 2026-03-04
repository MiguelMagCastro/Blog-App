<x-layout title="Perfil de {{ $user->name }}">

    <div class="max-w-2xl mx-auto space-y-6">

        <!-- Card do perfil -->
        <div class="card bg-base-100 shadow">
            <div class="card-body items-center text-center space-y-3">

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

                <!-- Botão seguir -->
                @auth
                    @if(auth()->id() !== $user->id)
                        <form method="POST" action="{{ route('user.follow', $user->id) }}">
                            @csrf

                            <button
                                class="btn btn-wide btn-sm {{ $isFollowing ? 'btn-secondary' : 'btn-outline btn-primary' }}">
                                {{ $isFollowing ? 'Seguindo' : 'Seguir' }}
                            </button>
                        </form>
                    @endif
                @endauth

                <!-- Stats -->
                <div class="stats shadow mt-4">

                    <!-- Stats -->
                    <div class="stats shadow mt-4">

                        <div class="stat">
                            <div class="stat-title">Chirps</div>
                            <div class="stat-value">{{ $chirps->count() }}</div>
                        </div>

                        <div class="stat">
                            <div class="stat-title">Seguidores</div>
                            <div class="stat-value">{{ $followersCount }}</div>
                        </div>

                        <div class="stat">
                            <div class="stat-title">Seguindo</div>
                            <div class="stat-value">{{ $followingCount }}</div>
                        </div>

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
