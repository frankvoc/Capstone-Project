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
    .time-slot {
    display: inline-block;
    margin: 0.5rem;
    padding: 0.5rem 1rem;
    border: 1px solid #ccc;
    border-radius: 0.5rem;
    cursor: pointer;
  }
  .time-slot.selected {
    background-color: #4CAF50;
    color: white;
    border-color: #4CAF50;
  }
  .calendar {
    max-width: 350px;
    margin: auto;
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  }
  .calendar-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-bottom: 10px;
    border-bottom: 1px solid #e5e7eb;
  }
  .calendar-grid {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 5px;
    padding-top: 10px;
  }
  .calendar-day {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    border-radius: 50%;
  }
  .calendar-day:hover,
  .calendar-day.selected {
    background-color: #C1373C;
    color: white;
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
    <div class="flex items-center gap-4">
      <div class="bg-white border border-black py-2 px-4 rounded">
      <a href="adminLogin.php" class="text-lg font-bold island-moments"style="color: #152266;">Sign In</a>
    </div>
    </div>
  </div>
<div class="container mx-auto p-4">
  <h2 class="text-center text-6xl py-6 italiana" style="color: #99382C;">Schedule Appointment</h2>
  <br>
  <br>
  <div class="max-w-md mx-auto p-8 rounded-lg">
    <form id="appointmentForm" class="space-y-6">
      <div id="step1" class="step" data-step="1">
        <div>
          <label for="firstName" class="text-sm font-medium text-gray-700">First Name</label>
          <input type="text" id="firstName" name="firstName" class="w-full p-2 border border-gray-300 rounded mt-1" required>
        </div>
        <br>
        <div>
          <label for="lastName" class="text-sm font-medium text-gray-700">Last Name</label>
          <input type="text" id="lastName" name="lastName" class="w-full p-2 border border-gray-300 rounded mt-1" required>
        </div>
        <br>
        <div>
          <label for="email" class="text-sm font-medium text-gray-700">Email</label>
          <input type="email" id="email" name="email" class="w-full p-2 border border-gray-300 rounded mt-1" required>
        </div>
        <br>
        <div>
          <label for="phone" class="text-sm font-medium text-gray-700">Phone Number</label>
          <input type="tel" id="phone" name="phone" class="w-full p-2 border border-gray-300 rounded mt-1" required>
        </div>
        <br>
        <button type="button" id="next1" class="w-full text-white bg-green-500 text-2xl p-2 rounded hover:bg-green-600 italiana">Next</button>
      </div>
      <!--other steps-->
      <div id="step2" class="step hidden" data-step="2">
      <div>
          <label for="jobDescription" class="text-sm font-medium text-gray-700">Job Description</label>
          <textarea id="jobDescription" name="jobDescription" class="w-full p-2 border border-gray-300 rounded mt-1" rows="4" required></textarea>
        </div>
        <div class="flex justify-between">
          <button type="button" id="back2" class="text-white bg-green-500 p-2 rounded hover:bg-green-600">Back</button>
          <button type="button" id="next2" class="text-white bg-green-500 p-2 rounded hover:bg-green-600">Next</button>
        </div>
      </div>
      <div id="step3" class="step hidden" data-step="3">
        <h3 class="text-xl font-semibold mb-4">Schedule a Date and Time</h3>
        <!--calendar view -->
        <div class="calendar my-5">
        <div class="calendar-header">
          <span>January 2024</span>
        </div>
        <div class="grid grid-cols-7 gap-1 text-center text-xs py-2">
          <div>Su</div>
          <div>Mo</div>
          <div>Tu</div>
          <div>We</div>
          <div>Th</div>
          <div>Fr</div>
          <div>Sa</div>
        </div>
        <div class="calendar-grid">
          <div class="calendar-day selected">1</div>
          <div class="calendar-day">2</div>
          <div class="calendar-day">3</div>
          <div class="calendar-day">4</div>
          <div class="calendar-day">5</div>
          <div class="calendar-day">6</div>
          <div class="calendar-day">7</div>
          <div class="calendar-day">8</div>
          <div class="calendar-day">9</div>
          <div class="calendar-day">10</div>
          <div class="calendar-day">31</div>
        </div>
      </div>
        <!--Time slots-->
        <div id="timeSlots" class="mb-4">
          <h4 class="block mb-2 text-sm font-medium text-gray-700">Pick a time</h4>
          <div class="time-slot" data-time="9:30">9:30</div>
          <div class="time-slot" data-time="12:30">12:30</div>
          <div class="time-slot" data-time="3:30">3:30</div>
        </div>
        <div class="flex justify-between">
          <button type="button" id="back3" class="text-white bg-green-500 p-2 rounded hover:bg-green-600">Back</button>
          <button type="button" id="next3" class="text-white bg-green-500 p-2 rounded hover:bg-green-600">Next</button>
        </div>
      </div>

      <div id="step4" class="step hidden" data-step="4">

      </div>
    </form>
    <!--PROGRESS BAR-->
    <div class="flex items-center justify-between mt-4">
      <div class="flex-1 flex items-center">
        <div class="circle w-10 h-10 flex items-center justify-center rounded-full bg-blue-500 text-white" data-step="1">1</div>
        <div class="flex-1 bg-gray-300 h-1"></div>
        <div class="circle w-10 h-10 flex items-center justify-center rounded-full bg-gray-300 text-white" data-step="2">2</div>
        <div class="flex-1 bg-gray-300 h-1"></div>
        <div class="circle w-10 h-10 flex items-center justify-center rounded-full bg-gray-300 text-white" data-step="3">3</div>
        <div class="flex-1 bg-gray-300 h-1"></div>
        <div class="circle w-10 h-10 flex items-center justify-center rounded-full bg-gray-300 text-white" data-step="4">4</div>
      </div>
    </div>
  </div>
</div>
<script>
  const form = document.getElementById('appointmentForm');
  const steps = form.querySelectorAll('.step');
  let currentStep = 1;
  form.addEventListener('click', function(e) {
    if (e.target.matches('button[type="button"]')) {
      const isNext = e.target.id.includes('next');
      const targetStep = isNext ? currentStep + 1 : currentStep - 1;
      //Validate input WHILE allowing user to go back(necessary for steps2-4)
      if (isNext) {
        const inputs = steps[currentStep - 1].querySelectorAll('input, textarea');
        for (let input of inputs) {
          if (!input.value.trim()) {
            alert('Please fill in all the fields.');
            return;
          }
        }
      }
      //Unhide next steps
      steps[currentStep - 1].classList.add('hidden');
      steps[targetStep - 1].classList.remove('hidden');
      currentStep = targetStep;
      }});
      document.getElementById('timeSlots').addEventListener('click', function(e) {
    if (e.target.classList.contains('time-slot')) {
      document.querySelectorAll('.time-slot').forEach(function(slot) {
        slot.classList.remove('selected');
      });
      //selected (highligted) date
      e.target.classList.add('selected');
    }
  });
  document.querySelectorAll('.calendar-day').forEach(day => {
    day.addEventListener('click', function() {
      document.querySelectorAll('.calendar-day.selected').forEach(selectedDay => {
        selectedDay.classList.remove('selected');
      });
      day.classList.add('selected');
    });
  });
</script>
</body>
</html>
    <!-- https://levelup.gitconnected.com/create-a-multi-step-form-using-html-css-and-javascript-30aca5c062fc **use for reference**-->
    <!-- https://w3sniff.com/code?id=102&title=Multi-Step-Form-with-Tailwind-CSS use for reference-->
