<?php

class Book { // class book untuk menyimpan atau mendefinisasikan methods dan variable

    protected $title = array(); // contoh variable
    protected $author = array();
    protected $publicationYear = array();

    function __construct($title = null, $author = null, $publicationYear = null)
    // Constructor untuk mendenifisikan/menginialisasikan variable agar di deklarasikan di didalam class? >.<
    {
        $this->title = $title;
        $this->author = $author;
        $this->publicationYear = $publicationYear;
    }

    function GetDetails(){
        // if else untuk mengedintefikasi data apakah ada atau tidak jika tidak akan dikeluarkan sebagai if dan jika iya maka print else
        if ($this->title == null && $this->author == null && $this->publicationYear == null) {
            echo("tidak ada data yang bisa di berikan");
        } else {
            echo("
            Title: $this->title, 
            Author: $this->author, 
            Publication Year: $this->publicationYear
            ");
        }
    }
}

class EBook extends Book { // contoh class ke 2 with extends/inherits?
    
    protected $filesize = array();

    function __construct($title = null, $author = null, $publicationYear = null, $filesize = null)
    // Constructor untuk mendenifisikan/menginialisasikan variable agar di deklarasikan di didalam class? >.<
    {
        parent::__construct($title, $author, $publicationYear);
        $this->filesize = $filesize;
    }

    function GetDetails() {
        // if else untuk mengedintefikasi data apakah ada atau tidak jika tidak akan dikeluarkan sebagai if dan jika iya maka print else
        parent::GetDetails(); // Panggil method dari parent untuk menampilkan detail dari Book
        if ($this->filesize == null) {
            echo("tidak ada data yang bisa di berikan");
        } else {
            // Hapus $parentDetails karena tidak digunakan
            echo("Filesize: $this->filesize");
        }
    }

    function addBook()
    // fungsi tambahkan book
    {
        // Memastikan ukuran file dipakai sesuai nama variabel yang benar
        if (
            strlen($this->title) <= 100 && 
            strlen($this->author) <= 100 && 
            ($this->publicationYear) >= 1500 && 
            ($this->publicationYear) <= 2024 && 
            ($this->filesize) >= 0 && // Ganti fileSize dengan filesize
            ($this->filesize) <= 100 // Ganti fileSize dengan filesize dan ubah dari <= 0 menjadi <= 100
        ) {
            return "Buku berhasil ditambahkan."; // Menampilkan pesan jika valid
        } else {
            return "INVALID: Isi / file size tidak valid"; // Menggunakan return untuk menampilkan pesan kesalahan
        }
    }
}

class PrintedBook extends Book {
    private $numberOfPages = array();

    public function __construct($title, $author, $publicationYear, $numberOfPages) {
        parent::__construct($title, $author, $publicationYear);
        $this->numberOfPages = $numberOfPages;
    }

    function GetDetails() {
        // if else untuk mengedintefikasi data apakah ada atau tidak jika tidak akan dikeluarkan sebagai if dan jika iya maka print else
        parent::GetDetails(); // Panggil method dari parent untuk menampilkan detail dari Book
        if ($this->numberOfPages == null) {
            echo("tidak ada data yang bisa di berikan");
        } else {
            // Hapus $parentDetails karena tidak digunakan
            echo("Number of Pages: $this->numberOfPages");
        }
    }

    function addBook()
    // fungsi tambahkan book
    {
        // Memastikan ukuran file dipakai sesuai nama variabel yang benar
        if (
            strlen($this->title) <= 100 && 
            strlen($this->author) <= 100 && 
            ($this->publicationYear) >= 1500 && 
            ($this->publicationYear) <= 2024 && 
            ($this->numberOfPages) >= 1 && // Ganti fileSize dengan filesize
            ($this->numberOfPages) <= 1000 // Ganti fileSize dengan filesize dan ubah dari <= 0 menjadi <= 1000
        ) {
            return "Buku berhasil ditambahkan."; // Menampilkan pesan jika valid
        } else {
            return "INVALID: Isi / file size tidak valid"; // Menggunakan return untuk menampilkan pesan kesalahan
        }
    }
}

$a = new EBook();

