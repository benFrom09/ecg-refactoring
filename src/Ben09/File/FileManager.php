<?php
declare (strict_types=1);
namespace Ben09\File;

use Ben09\File\FileUploadException;
use Psr\Http\Message\ServerRequestInterface;

define("MIME_TYPE",10);
define("DIRECTORY_ERROR",11);


class FileManager
{
    protected $file;

    protected $new_filename;

    protected $authorized = false;

    protected $ext = [
        "jpg"=>"image/jpeg",
        "jpeg"=>"image/jpeg",
        "png"=>"image/png",
        "gif"=>"image/gif",
        "pdf"=>"image/pdf"
    ];

    protected $storage = STORAGE;

    public $errors;

    public function __construct (ServerRequestInterface $request,string $key) {
                if(isset($key) && $request->getUploadedFiles()[$key]->getClientFileName() !== "") {
                    $this->file =$request->getUploadedFiles()[$key];    
                } else {
                    $this->file = NULL;
                }             
    }

    public function getError():?bool {
        if(!is_null($this->file)){
            if($this->checkError($this->file->getError())){
                //ok
                $this->checkExt($this->file->getClientMediaType());
                if(!$this->authorized) {
                    $this->message = (new FileUploadException(null,MIME_TYPE))->getMessage();
                    $this->errors[] = $this->message;
                    return true;
                }
                return false;
            } else {
                $this->message = (new FileUploadException(null,$this->file->getError()))->getMessage();
                $this->errors[] = $this->message;
                return true;
            }
        }
        return null;
    }


    public function moveTo(string $dir) {
        if(is_dir($dir)){
            $extension = pathinfo($this->file->getClientFilename(), PATHINFO_EXTENSION);
            $basename = bin2hex(random_bytes(8));
            $this->new_filename = sprintf('%s.%0.8s', $basename, $extension);
            $this->file->moveTo($dir . DIRECTORY_SEPARATOR .  $this->new_filename);
            return true;
        } else {
            echo (new FileUploadException("The directory $dir does not exist!"))->getMessage();
            die();
        }  
    }

    public function checkExt($filetype) {
        $this->authorized = array_search($filetype,$this->ext);
    }

    public function checkError($error):bool {
        return $error === UPLOAD_ERR_OK;
    }
    

    public function getNewFileName():string{
        return $this->new_filename;
    }

    public function deleteImageFromDirectory(string $image,string $dir){
        $scan = scandir($dir);
        $search = array_search($image,$scan); 
        return unlink($dir . DIRECTORY_SEPARATOR . $scan[$search]);
    }

    public function getClientFileName():string {
        return $this->file->getClientFileName();
    }

    public function getFile() {
        return $this->file;
    }
}