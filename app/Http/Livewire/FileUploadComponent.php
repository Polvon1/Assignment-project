<?php

namespace App\Http\Livewire;

use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;
use Storage;

class FileUploadComponent extends Component
{
    use WithFileUploads;

    public string $title = 'Image';
    public $file;
    public string $type;
    public ?string $image;
    public ?string $preview;
    public string $name = "image";
    public string $format = "image";
    public int $size = 3072;

    public function updatedFile(){
        $validation = $this->format."|max:".$this->size;
        $this->validate([
            'file' => $validation,
        ]);
        try {
            if ($this->format == "image"){
                $this->preview = $this->file->temporaryUrl();
            }else{
                $this->preview = 'file';
            }
            $this->image = $this->file->store('public/'.$this->type);
        }catch (Exception $exception){
            $this->preview = null;
            $this->image = null;
        }
    }

    public function delete(){
        Storage::delete($this->image);
        $this->image = null;
        $this->file = null;
        $this->preview = null;
    }

    public function save(){

    }

    public function render(): Factory|View|Application
    {
        return view('livewire.file-upload-component');
    }
}
