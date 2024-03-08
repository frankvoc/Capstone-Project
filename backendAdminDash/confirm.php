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
    #bookingSuccess {
    opacity: 0;
    transition: opacity 2s ease-out;
    }

    #bookingSuccess:not(.hidden) {
    opacity: 1;
    }
    </style>
    </head>
<body class="bg-red-100">
<div class="py-3 px-5 flex justify-between items-center" style="background-color:#C1373C ;">
    <div class="flex items-center">
      <div class="bg-white border border-black py-2 px-4 rounded">
      <a href="adminDashboard.php" class="text-xl font-bold" style="color: #152266;">Le Couturier</a>
    </div>
  
    </div>
    <div class="text-lg font-semibold jacques text-white text-center flex-1">Admin Dashboard</div>
    <div class="flex items-center gap-4">
      <a href="adminLogin.php" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-700">Logout</a>
    </div>
    </div>
</div>
    <div class="container mx-auto p-4">
  <h2 class="text-center text-6xl py-6 italiana" style="color: #99382C;">Confirm Appointment</h2>
  <h2 class="text-center text-4xl py-6 italiana" style="color: #99382C;">Your Details</h2>
  <div id="bookingSuccess" class="hidden">
    <div class="text-center">
        <svg class="mx-auto h-24 w-24 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
        </svg>
        <p class="text-2xl font-semibold mt-4">Appointment Booked!</p>
    </div>
</div>
  <div class="max-w-md mx-auto p-8 rounded-lg">
    <div id="confirmationDetails" class="text-lg text-center" >
        <p>First Name: <span id="firstName"></span></p>
        <p>Last Name: <span id="lastName"></span></p>
        <p>Email: <span id="email"></span></p>
        <p>Phone Number: <span id="phone"></span></p>
        <p>Job Description: <span id="jobDescription"></span></p>
        <p>Date Selected: <span id="selectedDate"></span></p>
        <p>Time Selected: <span id="selectedTimeSlot"></span></p>
</div>
<div class="flex justify-between">
          <button type="button" id="editButton" class="text-white bg-blue-600 p-2 rounded hover:bg-blue-700">Edit Details</button>
          <button type="button" id="confirmButton" class="text-white bg-blue-600 p-2 rounded hover:bg-blue-700">Confirm Booking</button>
</div>
<form id="bookingForm" action="submitBooking.php" method="post" style="display:none;">
    <input type="hidden" name="firstName" id="formFirstName">
    <input type="hidden" name="lastName" id="formLastName">
    <input type="hidden" name="email" id="formEmail">
    <input type="hidden" name="phone" id="formPhone">
    <input type="hidden" name="jobDescription" id="formJobDescription">
    <input type="hidden" name="selectedDate" id="formSelectedDate">
    <input type="hidden" name="selectedTimeSlot" id="formSelectedTimeSlot">
  </form>
</body>
</html>
<script>
document.addEventListener('DOMContentLoaded', () => {
    //populate fields from sessionStorage appointmentScheduler
    document.getElementById('firstName').textContent = sessionStorage.getItem('firstName') || 'Not Provided';
    document.getElementById('lastName').textContent = sessionStorage.getItem('lastName') || ' Not Provided';
    document.getElementById('email').textContent = sessionStorage.getItem('email') || 'Not Provided';
    document.getElementById('phone').textContent = sessionStorage.getItem('phone') || 'Not Provided';
    document.getElementById('jobDescription').textContent = sessionStorage.getItem('jobDescription') || 'Not Provided';
    document.getElementById('selectedDate').textContent = sessionStorage.getItem('selectedDate') || 'Not Provided';
    document.getElementById('selectedTimeSlot').textContent = sessionStorage.getItem('selectedTimeSlot') || 'Not Provided';
    //AJAX submission for confirmButton
    document.getElementById('confirmButton').addEventListener('click', function(event) {
        event.preventDefault(); //prevent default form submission (not navigating away, doing all on browser)
        const formData = new FormData();
        formData.append('firstName', sessionStorage.getItem('firstName') || '');
        formData.append('lastName', sessionStorage.getItem('lastName') || '');
        formData.append('email', sessionStorage.getItem('email') || '');
        formData.append('phone', sessionStorage.getItem('phone') || '');
        formData.append('jobDescription', sessionStorage.getItem('jobDescription') || '');
        formData.append('selectedDate', sessionStorage.getItem('selectedDate') || '');
        formData.append('selectedTimeSlot', sessionStorage.getItem('selectedTimeSlot') || '');
        fetch('controllers/submitBooking.php', {
            method: 'POST',
            body: formData,
        })
        .then(response => response.text())
        .then(data => {
            document.getElementById('editButton').style.display = 'none';
            document.getElementById('confirmButton').style.display = 'none';
            document.getElementById('bookingSuccess').classList.remove('hidden');
            sessionStorage.clear(); //clears session storage
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
    //edit redirects back to 1st part of scheduler
    document.getElementById('editButton').addEventListener('click', function() {
        window.location.href = 'appointmentScheduler.php';
    });
});
</script>

