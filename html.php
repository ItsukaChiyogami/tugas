<?php
include 'classes/object.php';

// Store books in an array
$books = [];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    for ($i = 0; $i < 100; $i++) {
        if (!empty($_POST["title"][$i])) {
            $title = $_POST["title"][$i];
            $author = $_POST["author"][$i];
            $publicationYear = $_POST["publicationYear"][$i];
            $bookType = $_POST["bookType"][$i];

            if ($bookType === 'EBook') {
                $filesize = $_POST["filesize"][$i] ?? null; // Handle optional fields
                $books[] = new EBook($title, $author, $publicationYear, $filesize);
            } else {
                $numberOfPages = $_POST["numberOfPages"][$i] ?? null; // Handle optional fields
                $books[] = new PrintedBook($title, $author, $publicationYear, $numberOfPages);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Input</title>
    <style>
        .book-entry { margin-bottom: 20px; }
    </style>
</head>
<body>

    <h1>Enter Book Details</h1>

    <form method="post" action="">
        <div id="bookEntries">
            <div class="book-entry">
                <fieldset>
                    <legend>Book 1</legend>
                    
                    <label for="title[]">Title:</label>
                    <input type="text" name="title[]" maxlength="100" required><br><br>

                    <label for="author[]">Author:</label>
                    <input type="text" name="author[]" maxlength="100" required><br><br>

                    <label for="publicationYear[]">Publication Year:</label>
                    <input type="number" name="publicationYear[]" min="1500" max="2024" required><br><br>

                    <label for="bookType[]">Book Type:</label>
                    <select name="bookType[]" onchange="toggleBookFields(this)" required>
                        <option value="EBook">EBook</option>
                        <option value="PrintedBook">Printed Book</option>
                    </select><br><br>

                    <div class="ebookFields">
                        <label for="filesize[]">Filesize (MB):</label>
                        <input type="number" name="filesize[]" min="0" max="100" step="0.1"><br><br>
                    </div>

                    <div class="printedFields" style="display:none;">
                        <label for="numberOfPages[]">Number of Pages:</label>
                        <input type="number" name="numberOfPages[]" min="1" max="1000"><br><br>
                    </div>
                </fieldset>
            </div>
        </div>
        <button type="button" onclick="addBookEntry()">Add Another Book</button><br><br>
        <input type="submit" value="Submit">
    </form>

    <h2>Entered Books:</h2>
    <ul>
        <?php
        foreach ($books as $book) {
            echo "<li>" . $book->GetDetails() . "</li>";
        }
        ?>
    </ul>

    <script>
        function toggleBookFields(selectElement) {
            const ebookFields = selectElement.closest('.book-entry').querySelector('.ebookFields');
            const printedFields = selectElement.closest('.book-entry').querySelector('.printedFields');
            if (selectElement.value === 'EBook') {
                ebookFields.style.display = 'block';
                printedFields.style.display = 'none';
            } else {
                ebookFields.style.display = 'none';
                printedFields.style.display = 'block';
            }
        }

        function addBookEntry() {
            const bookEntriesDiv = document.getElementById('bookEntries');
            const bookCount = bookEntriesDiv.children.length + 1;

            const newEntry = document.createElement('div');
            newEntry.classList.add('book-entry');
            newEntry.innerHTML = `
                <fieldset>
                    <legend>Book ${bookCount}</legend>
                    
                    <label for="title[]">Title:</label>
                    <input type="text" name="title[]" maxlength="100" required><br><br>

                    <label for="author[]">Author:</label>
                    <input type="text" name="author[]" maxlength="100" required><br><br>

                    <label for="publicationYear[]">Publication Year:</label>
                    <input type="number" name="publicationYear[]" min="1500" max="2024" required><br><br>

                    <label for="bookType[]">Book Type:</label>
                    <select name="bookType[]" onchange="toggleBookFields(this)" required>
                        <option value="EBook">EBook</option>
                        <option value="PrintedBook">Printed Book</option>
                    </select><br><br>

                    <div class="ebookFields">
                        <label for="filesize[]">Filesize (MB):</label>
                        <input type="number" name="filesize[]" min="0" max="100" step="0.1"><br><br>
                    </div>

                    <div class="printedFields" style="display:none;">
                        <label for="numberOfPages[]">Number of Pages:</label>
                        <input type="number" name="numberOfPages[]" min="1" max="1000"><br><br>
                    </div>
                </fieldset>
            `;
            bookEntriesDiv.appendChild(newEntry);
        }
    </script>

</body>
</html>
