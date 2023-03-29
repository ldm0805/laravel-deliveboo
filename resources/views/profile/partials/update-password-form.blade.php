<section class="update-password">

    {{-- Headline --}}
    <div class="my-profile-headline">
        <h2>{{ __('Aggiorna Password') }}</h2>
        <p>{{ __('Assicurati di utilizzare una password sicura.') }} </p>
    </div>

    {{-- Update Labels --}}
    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        {{-- Current Password --}}
        <div class="my-profile-input">
            <label for="current_password">{{__('Password attuale')}}</label>
            <input class="mt-1 form-control" type="password" name="current_password" id="current_password" autocomplete="current-password">

            {{-- Current Password Error --}}
            @error('current_password')
                <span class="invalid-feedback mt-2" role="alert">
                    <strong>{{ $errors->updatePassword->get('current_password') }}</strong>
                </span>
            @enderror
        </div>

        {{-- New Password --}}
        <div class="my-profile-input">
            <label for="password">{{__('Nuova Password')}}</label>
            <input class="form-control" type="password" name="password" id="password" autocomplete="new-password">

            {{-- New Password Error --}}
            @error('password')
                <span class="invalid-feedback mt-2" role="alert">
                    <strong>{{ $errors->updatePassword->get('password')}}</strong>
                </span>
            @enderror
        </div>

        {{-- Confirm New Password --}}
        <div class="my-profile-input">
            <label for="password_confirmation">{{__('Conferma Nuova Password')}}</label>
            <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" autocomplete="new-password">
            {{-- Confirm New Password Error --}}
            @error('password_confirmation')
                <span class="invalid-feedback mt-2" role="alert">
                    <strong>{{ $errors->updatePassword->get('password_confirmation')}}</strong>
                </span>
            @enderror
        </div>

        {{-- Save --}}
        <div class="d-flex align-items-center gap-4">
            <button type="submit" class="btn btn-outline-dark">{{ __('Salva') }}</button>

            @if (session('status') === 'password-updated')
            <script>
                const show = true;
                setTimeout(() => show = false, 2000)
                const el = document.getElementById('status')
                if (show) {
                    el.style.display = 'block';
                }
            </script>
            <p id='status' class=" fs-5 text-muted">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
