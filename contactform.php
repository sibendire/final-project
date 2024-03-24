<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contact.css">
    <title>Document</title>
</head>
<body>
<h3>For more information, fill out this form</h3>
<form action="https://api.web3forms.com/submit" method="POST">
    <div class="form-container">
    <input type="hidden" name="access_key" value="f2f7ec69-bdc3-41e8-b5e7-bcd9ac224604">
        <label for="name">Provide your name</label>
        <input type="text" placeholder="Enter name" name="name" required>

        <label for="email">Email</label>
        <input type="email" placeholder="Enter email" name="email" required>

        <label for="number">Contact number</label>
        <input type="number" placeholder="Enter number" name="number" required>
                        
        <label for="message">Message</label>
        <textarea placeholder="Enter message" name="message" required></textarea>

        <button type="submit">Send</button>
    </div>
</form>
</body>
</html>