document.getElementById('book_type').addEventListener('change', function() {
    const ebookFields = document.getElementById('ebook_fields');
    const printedFields = document.getElementById('printed_fields');
    if (this.value === 'ebook') {
        ebookFields.style.display = 'block';
        printedFields.style.display = 'none';
    } else {
        ebookFields.style.display = 'none';
        printedFields.style.display = 'block';
    }
});

function addFields() {
    const bookType = document.getElementById('book_type').value;
    const additionalFieldsDiv = document.getElementById('additionalFields');

    const newFieldContainer = document.createElement('div');
    newFieldContainer.className = 'dynamic-fields';
    newFieldContainer.innerHTML = ` 
        <h3>Additional ${bookType === 'ebook' ? 'EBook' : 'Printed Book'} Details</h3>
        <label for="title">Title:</label>
        <input type="text" name="additional_title[]" required>

        <label for="author">Author:</label>
        <input type="text" name="additional_author[]" required>

        <label for="publication_year">Publication Year:</label>
        <input type="number" name="additional_publication_year[]" min="1500" max="2024" required>

        ${bookType === 'ebook' ? `
            <label for="filesize">File Size (MB):</label>
            <input type="number" name="additional_filesize[]" min="0" max="100">
        ` : `
            <label for="number_of_pages">Number of Pages:</label>
            <input type="number" name="additional_number_of_pages[]" min="1" max="1000" required>
        `}
        <hr>
    `;
    additionalFieldsDiv.appendChild(newFieldContainer);
}
