<div>
    @if($typeInput == "G")
        <div class="row g-3 align-center mb-1">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label" for="{{ $id }}">{{ $label }}</label>
                    @if(!is_null($note))
                        <span class="form-note">{!! $note !!}</span>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="form-control-wrap">
                        <input
                            {{ $attributes }}
                            id="{{ $id }}"
                            type="{{ $type }}"
                            class="form-control @error($name) is-invalid @enderror @if(!is_null($size))form-control-{{ $size }} @endif"
                            placeholder="{{ $label }}"
                            name="{{ $name }}"
                            value="{{ old($name,$value) }}"
                            @if($required) required @endif
                            @if(!is_null($pattern)){!! $pattern !!}@endif
                        >
                        @error($name)
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    @elseif($typeInput == "S")
        <div class="form-group">
            <label class="form-label" for="{{ $id }}">{{ $label }}</label>
            <input
                {{ $attributes }}
                id="{{ $id }}"
                type="{{ $type }}"
                class="form-control @error($name) is-invalid @enderror @if(!is_null($size))form-control-{{ $size }} @endif"
                placeholder="{{ $label }}"
                name="{{ $name }}"
                value="{{ old($name,$value) }}"
                @if($required)required @endif
                @if(!is_null($pattern)) {!! $pattern !!} @endif
            />
        </div>
    @else
        <div class="form-group">
            <div class="form-control-wrap">
                <input
                    {{ $attributes }}
                    id="{{ $id }}"
                    type="{{ $type }}"
                    class="form-control @error($name) is-invalid @enderror @if(!is_null($size))form-control-{{ $size }} @endif form-control-outlined"
                    placeholder="{{ $label }}"
                    name="{{ $name }}"
                    value="{{ old($name,$value) }}"
                    @if($required)required @endif
                    @if(!is_null($pattern)) {!! $pattern !!} @endif
                />
                <label class="form-label-outlined" for="{{ $id }}">{!! $label !!}</label>
                @error($name)
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    @endif
</div>
