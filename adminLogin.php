<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Le Couturier - Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Island+Moments&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Italiana&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&display=swap" rel="stylesheet">
  <style>
     .island-moments {
      font-family: 'Island Moments', sans-serif;
    }
    .italiana{
      font-family: 'Italiana', sans-serif;
    }
    .jacques{
      font-family: 'Jacques Francois', serif;
    }
    .larger-text{
      font-size:2.5rem;
    }
    .dm-serif{
        font-family: 'DM Serif Display', serif; 
    }
  </style>
</head>
<body style="background-color: #F5EAEB;">
    <div class="min-h-screen flex flex-col items-center justify-center">
        <header class="absolute top-0 w-full bg-red-600 text-white text-center py-4 text-lg font-semibold jacques"style="background-color:#C1373C ;">
        Admin Login
    </header>
    <div class="flex min-h-screen items-center justify-center">
    <div class="flex-1 flex justify-center">
      <img src="img/Woman Standing with Laptop.png" alt="Woman Standing with Laptop" class="absolute bottom-0 left-64 m-8 top-40">
    </div>
  <div class="text-center py-6">
    <h2 class="text 2x1 font-semibold mb-6 dm-serif">Log In</h2>
    <p class="mb-4 text-gray-700">Welcome Back,<br> Please Enter your Information</p>
    <form class="space-y-4">
        <div>
          <label for="email" class="sr-only">Email</label>
          <input type="email" id="email" class="w-full p-2 border border-gray-300 rounded" placeholder="Email" />
        </div>
        <div>
          <label for="password" class="sr-only">Password</label>
          <input type="password" id="password" class="w-full p-2 border border-gray-300 rounded" placeholder="Password" />
        </div>
        <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded">Login</button>
      </form>
    </div>
  </div>
  </body>
  </html>
