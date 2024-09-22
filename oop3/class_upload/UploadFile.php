<?php

class UploadFile
{
    protected $fileName;
    protected $fileSize;
    protected $fileTmpName;
    protected $fileType;
    protected $fileExt;
    protected $uploadDir;
    public $uploadedFilePath;

    public function __construct($fileName, $fileSize, $fileTmpName, $fileType, $uploadDir)
    {
        $this->fileName = $fileName;
        $this->fileSize = $fileSize;
        $this->fileTmpName = $fileTmpName;
        $this->fileType = $fileType;
        $this->uploadDir = $uploadDir;
        $this->fileExt = strtolower(pathinfo($this->fileName, PATHINFO_EXTENSION));
    }
}
