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
<body class="bg-red-100">
<div class="py-3 px-5 flex justify-between items-center" style="background-color:#C1373C ;">
    <div class="flex items-center">
      <div class="bg-white border border-black py-2 px-4 rounded">
      <a href="appointmentPage.php" class="text-xl font-bold" style="color: #152266;">Le Couturier</a>
    </div>
    </div>
</div>
    <div class="container mx-auto p-4">
  <h2 class="text-center text-6xl py-6 italiana" style="color: #99382C;">Confirm Appointment</h2>
  <h2 class="text-center text-4xl py-6 italiana" style="color: #99382C;">Your Details</h2>
  <div class="max-w-md mx-auto p-8 rounded-lg">
    <div id="confirmationDetails" class="text-lg">
        <p>First Name: <span id="firstName"></span></p>
        <p>Last Name: <span id="lastName"></span></p>
        <p>Email: <span id="email"></span></p>
        <p>Phone Number: <span id="phone"></span></p>
        <p>Job Description: <span id="jobDescription"></span></p>
        <p>Date Selected: <span id="selectedDate"></span></p>
        <p>Time Selected: <span id="selectedTimeSlot"></span></p>
</div>
<div class="flex justify-between">
          <button type="button" id="editButton" class="text-white bg-green-500 p-2 rounded hover:bg-green-600">Edit Details</button>
          <button type="button" id="confirmButton" class="text-white bg-green-500 p-2 rounded hover:bg-green-600">Confirm Booking</button>
</div>
</body>
</html>
<script>
    document.addEventListener('DOMContentLoaded',()=>{
        document.getElementById('firstName').textContent = sessionStorage.getItem('firstName') || 'Not Provided';
        document.getElementById('lastName').textContent = sessionStorage.getItem('lastName') || ' Not Provided';
        document.getElementById('email').textContent = sessionStorage.getItem('email') || 'Not Provided';
        document.getElementById('phone').textContent = sessionStorage.getItem('phone') || 'Not Provided';
        document.getElementById('jobDescription').textContent = sessionStorage.getItem('jobDescription') || 'Not Provided';
        document.getElementById('selectedDate').textContent = sessionStorage.getItem('selectedDate') || 'Not Provided';
        document.getElementById('selectedTimeSlot').textContent = sessionStorage.getItem('selectedTimeSlot') || 'Not Provided'
        document.getElementById('editButton').addEventListener('click',function(){
            window.location.href='appointmentScheduler.php';
        });
        document.getElementById('confirmButton').addEventListener('click',function(){
            alert('Confirm');
            sessionStorage.clear();
    });
});
    </script>

            
