<div>
    <div class="form-group">
        <label class="form-label">{{ $title }}</label>
        <div class="dropzone d-flex flex-column align-items-center justify-content-center">
            <div class="d-flex justify-content-center">
                <div wire:loading wire:target="file" class="text-center mb-2">
                    <div class="d-flex">
                        <div class="spinner-border" role="status">
                            <span class="sr-only opacity-0">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
            @if($file and $preview and $preview != 'file')
                <div class="preview text-center mb-2">
                    <img src="{{ $preview }}" class="w-50" alt="Uploaded file"><br>
                    <span class="mt-2 btn btn-outline-danger btn-sm" style="cursor: pointer;" wire:click.prevent="delete" >{{ __('action.delete') }}</span>
                </div>
            @elseif($file and $preview == 'file')
                <div class="preview text-center mb-2">
                    <div>
                        <a href="{{ asset($image) }}" download class="btn btn-success">
                            Download
                        </a>
                    </div>
                    <span class="mt-2 btn btn-outline-danger btn-sm" style="cursor: pointer;" wire:click.prevent="delete" >{{ __('action.delete') }}</span>
                </div>
            @elseif(!is_null($image))
                @if(Str::of($image)->endsWith('.pdf'))
                    <div class="preview text-center mb-2">
                        <div>
                            <a href="{{ asset($image) }}" download class="btn btn-success">
                                Download
                            </a>
                        </div>
                        <span class="mt-2 btn btn-outline-danger btn-sm" style="cursor: pointer;" wire:click.prevent="delete" >{{ __('action.delete') }}</span>
                    </div>
                @else
                    <div class="preview text-center mb-2">
                        <img src="{{ asset($image) }}" class="w-50" alt="Uploaded file"><br>
                        <span class="btn btn-outline-danger mt-2 btn-sm" style="cursor: pointer;" wire:click.prevent="delete" >{{ __('action.delete') }}</span>
                    </div>
                @endif
            @else
            @endif
            <div class="parent-div d-block text-center">
                <button class="btn btn-primary" style="cursor: pointer;">{{ __('action.choose_file') }}</button>
                <input type="file" wire:model="file"/>
            </div>
            @error('file')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <input type="hidden" name="{{ $name }}" value="{{ $image }}"/>
        </div>
    </div>
</div>
