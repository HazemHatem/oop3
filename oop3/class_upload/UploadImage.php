<?php
class UploadImage extends UploadFile
{
    private $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg'];

    public function __construct($file, $uploadDir = 'uploads/images/')
    {
        parent::__construct($file['name'], $file['size'], $file['tmp_name'], $file['type'], $uploadDir);
    }

    public function validateExtension()
    {
        if (in_array($this->fileExt, $this->allowedExtensions)) {
            return true;
        } else {
            throw new Exception("Invalid file extension. Only JPG, JPEG, PNG, and GIF are allowed.");
        }
    }

    public function validateImageContent()
    {
        $imageInfo = getimagesize($this->fileTmpName);
        if ($imageInfo !== false) {
            return true;
        } else {
            throw new Exception("The file is not a valid image.");
        }
    }

    public function validateSize($maxSize = 5242880)
    {
        if ($this->fileSize <= $maxSize) {
            return true;
        } else {
            throw new Exception("File size exceeds the maximum limit of 5MB.");
        }
    }

    public function generateUniqueFileName()
    {
        return uniqid('img_', true) . '.' . $this->fileExt;
    }

    public function upload()
    {
        $this->validateExtension();
        $this->validateImageContent();
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
            throw new Exception("Failed to upload the image.");
        }
    }

    public function getImageURL()
    {
        return htmlspecialchars($this->uploadDir . basename($this->uploadedFilePath));
    }
}
