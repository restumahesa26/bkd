<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/" class="d-flex justify-content-center mb-4">
                <x-application-logo width=64 height=64 />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="nama" :value="__('Nama')" />

                <x-input id="nama" class="" type="text" name="nama" :value="old('nama')" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="nip" :value="__('NIP')" />

                <x-input id="nip" class="" type="text" name="nip" :value="old('nip')" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />

                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                    <option value="">--Pilih Jenis Kelamin--</option>
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>

            <div class="mt-4">
                <x-label for="jabatan" :value="__('Jabatan')" />

                <x-input id="jabatan" class="" type="text" name="jabatan" :value="old('jabatan')" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="golongan" :value="__('Golongan')" />

                <x-input id="golongan" class="" type="text" name="golongan" :value="old('golongan')" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="prodi" :value="__('Prodi')" />

                <x-input id="prodi" class="" type="text" name="prodi" :value="old('prodi')" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="fakultas" :value="__('Fakultas')" />

                <x-input id="fakultas" class="" type="text" name="fakultas" :value="old('fakultas')" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="no_telepon" :value="__('No. Telepon')" />

                <x-input id="no_telepon" class="" type="text" name="no_telepon" :value="old('no_telepon')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class=""
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class=""
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="d-flex justify-content-end mt-4">
                <a class="text-muted" href="{{ route('login') }}" style="margin-right: 15px; margin-top: 15px;">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
