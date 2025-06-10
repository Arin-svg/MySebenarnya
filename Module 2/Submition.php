<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Submit Inquiry</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
      background-color: #f4f4f4;
    }
    .container {
      max-width: 600px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }
    h2 {
      text-align: center;
    }
    label {
      font-weight: bold;
      display: block;
      margin-top: 10px;
    }
    input, textarea, select {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    button {
      background-color: #007BFF;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      width: 100%;
    }
    button:hover {
      background-color: #0056b3;
    }
    .error-message {
      color: red;
      font-size: 14px;
    }
  </style>
</head>
<body>

  <div class="container">
    <h2>Submit Inquiry</h2>
    <form id="submitInquiryForm" action="/submit-inquiry" method="POST" enctype="multipart/form-data">
      
      <label for="title">Inquiry Title</label>
      <input type="text" id="title" name="title" required placeholder="Enter the title of the inquiry">

      <label for="category">Category</label>
      <select id="category" name="category" required>
        <option value="disaster">Disaster</option>
        <option value="economy">Economy</option>
        <option value="security">Security</option>
        <option value="education">Education</option>
        <option value="crime">Crime</option>
        <option value="health">Health</option>
      </select>

      <label for="description">Description</label>
      <textarea id="description" name="description" rows="5" required placeholder="Describe the inquiry in detail"></textarea>

      <label for="source">Source</label>
      <input type="text" id="source" name="source" required placeholder="Provide the source of the news (e.g., URL, publication)">

      <label for="evidence">Attach Evidence (optional)</label>
      <input type="file" id="evidence" name="evidence" accept=".jpg,.jpeg,.png,.pdf" onchange="validateFile()">

      <button type="submit">Submit Inquiry</button>

      <p id="error-message" class="error-message"></p>
    </form>
  </div>

  <script>
    function validateFile() {
      const fileInput = document.getElementById('evidence');
      const errorMessage = document.getElementById('error-message');
      const file = fileInput.files[0];

      if (file) {
        const allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];
        const maxSize = 10 * 1024 * 1024; // 10MB

        if (!allowedTypes.includes(file.type)) {
          errorMessage.textContent = "Invalid file type. Please upload a JPEG, PNG, or PDF file.";
          fileInput.value = ''; // Clear the input field
        } else if (file.size > maxSize) {
          errorMessage.textContent = "File is too large. Maximum size is 10MB.";
          fileInput.value = ''; // Clear the input field
        } else {
          errorMessage.textContent = ''; // No error
        }
      }
    }

    document.getElementById('submitInquiryForm').addEventListener('submit', function(event) {
      const title = document.getElementById('title').value;
      const category = document.getElementById('category').value;
      const description = document.getElementById('description').value;

      if (!title || !category || !description) {
        event.preventDefault(); // Prevent form submission
        alert("Please fill out all required fields.");
      }
    });
  </script>

</body>
</html>
