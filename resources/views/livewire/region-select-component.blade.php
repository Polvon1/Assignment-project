<div class="row">
    <div class="col-md-6 col-md-6">
        <div class="form-group">
            <label for="region_id">{{ __('main.user.region') }}</label>
            <select
                name="region_id"
                id="region_id"
                placeholder="{{ __('main.user.region') }}"
                class="form-control @error('region_id') is-invalid @enderror form-control-lg"
                @if($required) required @endif
                wire:model="region_id"
            >
                <option value="">{{ __('main.user.region') }}</option>
                @forelse($regions as $region)
                    <option value="{{ $region->id }}">{{ $region->title }}</option>
                @empty
                @endforelse
            </select>
            @error('region_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6 col-md-6">
        <div class="form-group">
            <label for="district_id">{{ __('main.user.district') }}</label>
            <select
                name="district_id"
                id="district_id"
                placeholder="{{ __('main.user.district') }}"
                class="form-control @error('district_id') is-invalid @enderror form-control-lg "
                @if($required) required @endif
                wire:model="district_id"
            >
                <option value="">{{ __('main.user.district') }}</option>
                @forelse($districts as $district)
                    <option value="{{ $district->id }}">{{ $district->title }}</option>
                @empty
                @endforelse
            </select>
            @error('district_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>
