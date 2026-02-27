<x-layout title="Resultados da pesquisa">

    <div class="max-w-2xl mx-auto space-y-6">

        <h2 class="text-2xl font-bold">
            Resultados para:
            <span class="text-primary">"{{ $search }}"</span>
        </h2>

        @if ($users->count())
            <div class="space-y-4">
                @foreach ($users as $user)
                    <div class="card bg-base-100 shadow">
                        <div class="card-body flex flex-row items-center justify-between">

                            <div class="flex items-center gap-4">
                                <!-- Avatar -->
                                <div class="avatar">
                                    <div class="size-10 rounded-full">
                                        <img
                                            src="https://avatars.laravel.cloud/{{ md5(strtolower(trim($user->email))) }}"
                                            alt="{{ $user->name }}'s avatar"
                                            class="rounded-full"
                                        />
                                    </div>
                                </div>

                                <!-- Info -->
                                <div>
                                    <h3 class="font-semibold text-lg">{{ $user->name }}</h3>
                                    <p class="text-sm text-base-content/60">
                                        Membro desde {{ $user->created_at->format('Y') }}
                                    </p>
                                </div>
                            </div>

                            <!-- Botão perfil -->
                            <a href="{{ route('users.show', $user) }}" class="btn btn-outline btn-sm">
                                Ver perfil
                            </a>

                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info">
                Nenhum usuário encontrado para "{{ $search }}".
            </div>
        @endif

    </div>

</x-layout>
