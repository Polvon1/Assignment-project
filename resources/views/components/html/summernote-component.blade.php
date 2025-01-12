<div class="form-group">
    <label class="form-label" for="{{ $id }}">{!! $label !!}</label>
    <div class="form-control-wrap">
        <textarea
            class="summernote-lg summernote-basic"
            name="{{ $name }}"
            id="{{ $id }}"
            @if($required) required @endif
        >{{ old($name,$value) }}</textarea>
        @error($name)
            <span class="invalid">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
