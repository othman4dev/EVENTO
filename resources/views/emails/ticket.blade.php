<!DOCTYPE html>
<html>
<head>
    <title>Event reservation</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        h1 {
            text-align: center;
            color: #333;
        }
        
        p {
            margin-bottom: 20px;
            color: #555;
        }
        
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Your ticket to the event : {{ session('event')->title }}</h1>
        <p>Your ticket code  is : {{ session('event')->token }}</p>
        <p>Don't share this code with anyone</p>
        <p>Be there at {{ session('event')->time }} the {{ session('event')->date }}</p>
        <p>Thank you for reserving this event.</p>
    </div>
</body>
</html>