<?php

class Book {
    protected $title;
    protected $author;
    protected $publicationYear;

    public function __construct($title = null, $author = null, $publicationYear = null) {
        $this->setTitle($title);
        $this->setAuthor($author);
        $this->setPublicationYear($publicationYear);
    }

    public function setTitle($title) {
        if (strlen($title) > 100) {
            throw new InvalidArgumentException("INVALID");
        }
        $this->title = $title;
    }

    public function setAuthor($author) {
        if (strlen($author) > 100) {
            throw new InvalidArgumentException("INVALID");
        }
        $this->author = $author;
    }

    public function setPublicationYear($publicationYear) {
        if (!is_numeric($publicationYear) || $publicationYear < 1500 || $publicationYear > 2024) {
            throw new InvalidArgumentException("INVALID");
        }
        $this->publicationYear = $publicationYear;
    }

    public function getDetails() {
        if ($this->title === null || $this->author === null || $this->publicationYear === null) {
            return "tidak ada data yang bisa di berikan";
        }
        return "Title: $this->title, Author: $this->author, Publication Year: $this->publicationYear";
    }
}

class EBook extends Book {
    protected $filesize;

    public function __construct($title = null, $author = null, $publicationYear = null, $filesize = null) {
        parent::__construct($title, $author, $publicationYear);
        $this->setFilesize($filesize);
    }

    public function setFilesize($filesize) {
        if (!is_numeric($filesize) || $filesize < 0 || $filesize > 100) {
            throw new InvalidArgumentException("INVALID");
        }
        $this->filesize = $filesize;
    }

    public function getDetails() {
        $parentDetails = parent::getDetails();
        if ($this->filesize === null) {
            return $parentDetails . " | Filesize: tidak ada data yang bisa di berikan";
        }
        return $parentDetails . " | Filesize: $this->filesize MB";
    }

    public function addBook() {
        try {
            // Validate inputs
            $this->setTitle($this->title);
            $this->setAuthor($this->author);
            $this->setPublicationYear($this->publicationYear);
            $this->setFilesize($this->filesize);

            return "Buku berhasil ditambahkan.";
        } catch (InvalidArgumentException $e) {
            return "INVALID"; // Return INVALID when an error occurs
        }
    }
}

class PrintedBook extends Book {
    private $numberOfPages;

    public function __construct($title, $author, $publicationYear, $numberOfPages) {
        parent::__construct($title, $author, $publicationYear);
        $this->setNumberOfPages($numberOfPages);
    }

    public function setNumberOfPages($numberOfPages) {
        if (!is_numeric($numberOfPages) || $numberOfPages <= 0 || $numberOfPages > 100) {
            throw new InvalidArgumentException("INVALID");
        }
        $this->numberOfPages = $numberOfPages;
    }

    public function getDetails() {
        $parentDetails = parent::getDetails();
        if ($this->numberOfPages === null) {
            return $parentDetails . " | Number of Pages: tidak ada data yang bisa di berikan";
        }
        return $parentDetails . " | Number of Pages: $this->numberOfPages";
    }

    public function addBook() {
        try {
            // Validate inputs
            $this->setTitle($this->title);
            $this->setAuthor($this->author);
            $this->setPublicationYear($this->publicationYear);
            $this->setNumberOfPages($this->numberOfPages);

            return "Buku berhasil ditambahkan.";
        } catch (InvalidArgumentException $e) {
            return "INVALID"; // Return INVALID when an error occurs
        }
    }
}
