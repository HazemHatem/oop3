<?php

class UploadAudio extends UploadFile
{
    private $allowedExtensions = ['mp3', 'wav', 'ogg', 'flac', 'm4a', 'aac'];

    public function __construct($file, $uploadDir = 'uploads/audios/')
    {
        parent::__construct($file['name'], $file['size'], $file['tmp_name'], $file['type'], $uploadDir);
    }

    public function validateExtension()
    {
        if (in_array($this->fileExt, $this->allowedExtensions)) {
            return true;
        } else {
            throw new Exception("Invalid file extension. Only MP3, WAV, FLAC, M4A, AAC and OGG are allowed.");
        }
    }

    public function validateSize($maxSize = 10485760)
    {
        if ($this->fileSize <= $maxSize) {
            return true;
        } else {
            throw new Exception("File size exceeds the maximum limit of 10MB.");
        }
    }

    public function generateUniqueFileName()
    {
        return uniqid('audio_', true) . '.' . $this->fileExt;
    }

    public function upload()
    {
        $this->validateExtension();
        $this->validateSize();

        $uniqueFileName = $this->generateUniqueFileName();

        if (!is_dir($this->uploadDir)) {
            mkdir($this->uploadDir, 0777, true);
        }

        $uploadPath = $this->uploadDir . $uniqueFileName;
        $this->uploadedFilePath = $uploadPath;

        if (move_uploaded_file($this->fileTmpName, $uploadPath)) {
            return true;
        } else {
            throw new Exception("Failed to upload the audio file.");
        }
    }

    public function getAudioURL()
    {
        return htmlspecialchars($this->uploadDir . basename($this->uploadedFilePath));
    }
}
