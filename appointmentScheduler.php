<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Le Couturier - Schedule an Appointment</title>
  <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Island+Moments&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Italiana&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&display=swap" rel="stylesheet">
  <style>
    html {
      scroll-behavior: smooth;
    }
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
  </style>
</head>
<body style="background-color: #F5EAEB;">
  <!--Top bar-->
  <div class="py-3 px-5 flex justify-between items-center" style="background-color:#C1373C ;">
    <div class="flex items-center">
      <div class="bg-white border border-black py-2 px-4 rounded">
      <a href="appointmentPage.php" class="text-xl font-bold" style="color: #152266;">Le Couturier</a>
    </div>
    </div>
    <!-- https://levelup.gitconnected.com/create-a-multi-step-form-using-html-css-and-javascript-30aca5c062fc **use for reference**-->
    <!-- https://w3sniff.com/code?id=102&title=Multi-Step-Form-with-Tailwind-CSS use for reference-->
    <div>
      <h1> Appoitnment Scheduler</h1>
      <div id='mul