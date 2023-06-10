document.addEventListener("DOMContentLoaded", function() {
  const form = document.getElementById("encryptionForm");
  const resultDiv = document.getElementById("result");

  form.addEventListener("submit", function(event) {
    event.preventDefault();
    
    const formData = new FormData(form);
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "encrypt.php", true);

    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        resultDiv.textContent = xhr.responseText;
      }
    };

    xhr.send(formData);
  });
});
