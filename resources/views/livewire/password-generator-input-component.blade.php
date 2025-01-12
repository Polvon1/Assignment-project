<div class="form-group">
    <div class="form-label-group">
        <label class="form-label" for="password">{{ __('main.user.password') }}</label>
        <button class="link link-primary link-sm" type="button" wire:click="generate">{{ __('action.generate') }}</button>
    </div>
    <div class="form-control-wrap">
        <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
            <em class="passcode-icon icon-show icon ni ni-eye"></em>
        </a>
        <input
            type="password"
            wire:model="password"
            class="form-control form-control-lg @error('password') is-invalid @enderror"
            id="password"
            name="password"
            placeholder="{{ __('main.user.password') }}"
            @if($required) required @endif
        >
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
