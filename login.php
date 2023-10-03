<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>School Login</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f5ff;
      /* Light blue background */
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .container {
      width: 100%;
      max-width: 400px;
      padding: 20px;
      background-color: #ffffff;
      /* White background */
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
    }

    .container h2 {
      text-align: center;
      color: #0046b3;
      /* Dark blue text color */
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
      color: #0046b3;
      /* Dark blue text color */
    }

    input[type="text"],
    input[type="password"] {
      width: 94.3%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    button {
      background-color: #0046b3;
      /* Dark blue button background */
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      width: 100%;
      display: block;
      font-size: 16px;
      font-weight: bold;
    }

    button:hover {
      background-color: #002a66;
    }
  </style>
</head>

<body>
  <div class="container">
    <h2>School Login</h2>
    <form id="login-form" action="verify.php" name="School Login" method="post">
      <div class="form-group">
        <label for="schoolId">School ID</label>
        <input type="text" id="schoolId" name="schoolId" required>
      </div>
      <div class="form-group">
        <label for="schoolName">School Name</label>
        <input type="text" id="schoolName" name="schoolName" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
      </div>
      <button type="submit">Login</button>
    </form>
  </div>

  <script type="text/javascript">

  </script>
</body>

</html>