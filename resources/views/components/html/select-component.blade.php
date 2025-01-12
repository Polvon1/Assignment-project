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
                        <select
                            name="{{ $name }}"
                            id="{{ $id }}"
                            placeholder="{{ $label }}"
                            class="form-control @error($name) is-invalid @enderror @if(!is_null($size))form-control-{{ $size }} @endif"
                            @if($required)required @endif
                            @if(!is_null($pattern)){!! $pattern !!}@endif
                        >
                            <option value="">{{ $label }}</option>
                            @foreach($collection as $item)
                                <option value="{{ ($item instanceof \App\Models\Language) ? $item->slug : $item->$id }}" @if($item->id == old($name,$value)) selected @endif>{{ $item->title }}</option>
                            @endforeach
                        </select>
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
            <label class="form-label" for="{{ $id }}">{!! $label !!}</label>
                <select
                    name="{{ $name }}"
                    id="{{ $id }}"
                    placeholder="{{ $label }}"
                    class="form-control @error($name) is-invalid @enderror @if(!is_null($size))form-control-{{ $size }} @endif"
                    @if($required)required @endif
                    @if(!is_null($pattern)){!! $pattern !!}@endif
                >
                    <option value="">{{ $label }}</option>
                    @foreach($collection as $item)
                        <option value="{{ $item->id }}" @if($item->id == old($name,$value)) selected @endif>{{ $item->title }}</option>
                    @endforeach
                </select>

                @error($name)
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
    @else
        <div class="form-group">
            <div class="form-control-wrap">
                <select
                    name="{{ $name }}"
                    id="{{ $id }}"
                    placeholder="{{ $label }}"
                    class="form-control @error($name) is-invalid @enderror @if(!is_null($size))form-control-{{ $size }} @endif form-control-outlined"
                    @if($required)required @endif
                    @if(!is_null($pattern)){!! $pattern !!}@endif
                >
                    <option value="">{{ $label }}</option>
                    @foreach($collection as $item)
                        <option value="{{ $item->id }}" @if($item->id == old($name,$value)) selected @endif>{{ $item->title }}</option>
                    @endforeach
                </select>
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
