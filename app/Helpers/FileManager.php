<?php


namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Facades\File;
// use File;
use Illuminate\Support\Str;

class FileManager
{
    private $public_root = 'storage/';
//    private $storage_root = 'app/public';
    private $root_path = 'uploads/';
    private $sub_folder = null;
    private $name_prefix = null;
    private $name_postfix = null;
    private $file_name = null;

    private function date(){
        return Carbon::now()->toDateString();
    }

    public static function __callStatic($method, $args) {
        return call_user_func_array($method, $args);
    }

    public function __call($method, $args) {
        return call_user_func_array($method, $args);
    }

    public function root($folder) {
        $this->root_path = $folder  . '/';
        return $this;
    }

    public function folder($folder){
        $this->sub_folder = $folder . '/';
        return $this;
    }

    public function getName() {
        return $this->file_name;
    }

    private function genFileName(){
        $separator = '-';
        $prefix = !empty($this->name_prefix) ? $this->name_prefix . $separator : '';
        $postfix = !empty($this->name_postfix) ? $this->name_postfix . $separator : '';
        return $prefix . Str::uuid() . $separator . $postfix .  $this->date();
    }

    public function prefix($prefix){
        $this->name_prefix = $prefix;
        return $this;
    }

    public function postfix($postfix){
        $this->name_postfix = $postfix;
        return $this;
    }

    public function delete($file_name){
        $file = public_path($this->public_root . $this->root_path . $this->sub_folder .$file_name);
        if (File::exists($file)) {
            File::delete($file);
        }
    }

    public function upload($file){
        if ($file)
            $extension = $file->getClientOriginalExtension();
        else
            dd("No file method passed");

        $upload_path = $this->root_path . $this->sub_folder;
        $this-> file_name = $this->genFileName() . '.'. $extension;

        $file->storeAs($upload_path, $this->file_name);
    }

    public function update($file, $old_file){
        $this->upload($file);
        $this->delete($old_file);
    }

}
