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
  .selected-time-slot {
    background-color: #99382C;
    color: black; 
    border-color: red; 
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
        <!-- <div id="calendar"></div> -->
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
  <div class="max-w-md mx-auto p-8 rounded-lg">
    <form id="appointmentForm" class="space-y-6">
      <div id="step1" class="step" data-step="1">
        <h2 class="text-center text-4xl py-6 italiana" style="color: #99382C;">Provide Contact</h2>
        <div>
          <label for="firstName" class="text-sm font-medium text-gray-700">First Name</label>
          <input type="text" id="firstName" name="firstName" class="w-full p-2 border border-gray-300 rounded mt-1" placeholder="Tom"required>
        </div>
        <br>
        <div>
          <label for="lastName" class="text-sm font-medium text-gray-700">Last Name</label>
          <input type="text" id="lastName" name="lastName" class="w-full p-2 border border-gray-300 rounded mt-1" placeholder="Smith"required>
        </div>
        <br>
        <div>
          <label for="email" class="text-sm font-medium text-gray-700">Email</label>
          <input type="email" id="email" name="email" class="w-full p-2 border border-gray-300 rounded mt-1" required placeholder="you@example.com">
        </div>
        <br>
        <div>
          <label for="phone" class="text-sm font-medium text-gray-700">Phone Number</label>
          <input type="tel" id="phone" name="phone" class="w-full p-2 border border-gray-300 rounded mt-1" placeholder="123-456-7890"required>
        </div>
        <br>
        <button type="button" id="next1" class="form-nav w-full text-white bg-blue-600 text-2xl p-2 rounded hover:bg-blue-700">Next</button>
      </div>
      <!--other steps-->
      <div id="step2" class="step hidden" data-step="2">
      <div>
          <h2 class="text-center text-3xl py-6 italiana" style="color: #99382C;">Provide a Job Description</h2>
          <label for="jobDescription" class="text-sm font-medium text-gray-700"></label>
          <textarea id="jobDescription" name="jobDescription" class="w-full p-2 border border-gray-300 rounded mt-1" rows="4" placeholder="Please provide a description of the service you need..."required></textarea>
        </div>
        <div class="flex justify-between">
          <button type="button" id="back2" class="form-nav text-white bg-blue-600 p-2 rounded hover:bg-blue700-">Back</button>
          <button type="button" id="next2" class="form-nav text-white bg-blue-600 p-2 rounded hover:bg-blue-700">Next</button>
        </div>
      </div>
      <div id="step3" class="step hidden" data-step="3">
      <h2 class="text-center text-3xl py-6 italiana" style="color: #99382C;">Schedule a Date and Time</h2>
        <!--calendar view -->
        <div class="calendar my-5">
          <div class="calendar-header flex justify-between items-center">
            <button type="button" id="prevMonth" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Prev</button>
            <span>Month Year</span> <!--dynamic generated month header-->
            <button type="button" id="nextMonth" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Next</button>
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
            <!--dynamic generated calendar here-->
          </div>
        </div>
        <!--Time slots-->
        <div id="timeSlots" class="mb-4">
          <h4 class="block mb-2 text-sm font-medium text-gray-700">Pick a time</h4>
          <!--dynamic generated time slots here-->
        </div>
        <div class="flex justify-between">
          <button type="button" id="back3" class="form-nav text-white bg-blue-600 p-2 rounded hover:bg-blue-700">Back</button>
          <button type="button" id="next3" class="form-nav text-white bg-blue-600 p-2 rounded hover:bg-blue-700">Next</button>
        </div>
    </form>
<script>
  document.addEventListener('DOMContentLoaded',()=>{
    if(sessionStorage.getItem('firstName')){
      document.getElementById('firstName').value = sessionStorage.getItem('firstName');
    }
    if(sessionStorage.getItem('lastName')){
      document.getElementById('lastName').value = sessionStorage.getItem('lastName');
    }
    if(sessionStorage.getItem('email')){
      document.getElementById('email').value = sessionStorage.getItem('email');
    }
    if(sessionStorage.getItem('phone')){
      document.getElementById('phone').value = sessionStorage.getItem('phone');
    }
    if(sessionStorage.getItem('jobDescription')){
      document.getElementById('jobDescription').value = sessionStorage.getItem('jobDescription');
    }
    if(sessionStorage.getItem('selectedDate')){
    document.getElementById('selectedDate').value = sessionStorage.getItem('selectedDate');
    }
    if(sessionStorage.getItem('selectedTimeSlot')){
      document.getElementById('selectedTimeSlot').value = sessionStorage.getItem('selectedTimeSlot');
    }
  })
  //on click for step3 move user to confirmation screen
  document.getElementById('next3').addEventListener('click',function(){
    sessionStorage.setItem('firstName',document.getElementById('firstName').value);
    sessionStorage.setItem('lastName',document.getElementById('lastName').value);
    sessionStorage.setItem('email',document.getElementById('email').value);
    sessionStorage.setItem('phone',document.getElementById('phone').value);
    sessionStorage.setItem('jobDescription',document.getElementById('jobDescription').value);
    sessionStorage.setItem('selectedDate',selectedDate);
    sessionStorage.setItem('selectedTimeSlot',selectedTimeSlot);
       window.location.href = 'confirm.php';
});
  const form = document.getElementById('appointmentForm');
  const steps = form.querySelectorAll('.step');
  let currentStep = 1;
  document.getElementById('appointmentForm').addEventListener('click', function(e) {
    if (e.target.matches('.form-nav')) {
        const isNext = e.target.id.includes('next');
        const targetStep = isNext ? currentStep + 1 : currentStep - 1;
        console.log("current step", currentStep);
        console.log("target step", targetStep);
        //force to show details when moving from 3-->4
        if(currentStep === 3 && isNext){
            updateConfirmationScreen();
            console.log(confirmationDetails)
        }
        if (isNext) {
            const inputs = steps[currentStep - 1].querySelectorAll('input, textarea');
            for (let input of inputs) {
                if (!input.value.trim()) {
                    alert('Please fill in all the fields.');
                    return; //stopping the function if fields are empty
                }
            }
        }
        //hide the current step
        steps[currentStep - 1].classList.add('hidden');
        //used for back --> next navigation
        currentStep = targetStep;
        //show target step if within bounds
        if (currentStep >= 1 && currentStep <= steps.length) {
            steps[currentStep - 1].classList.remove('hidden');
        } else {
            console.error("not within bounds:", currentStep);
        }
        //debug for step after next click + classlist
        console.log("currentstep" + currentStep, steps[currentStep - 1].classList);
    }
});
  //Get elements for displaying the calendar and its header
        const calendarGrid = document.querySelector('.calendar-grid');
        const calendarHeader = document.querySelector('.calendar-header span');
        //Current date information
        let currentDate = new Date();
        let currentMonth = currentDate.getMonth();
        let currentYear = currentDate.getFullYear();
        let selectedDate = '';
        let selectedTimeSlot = '';
        function updateCalendarHeader(month, year) {
          const monthName = new Date(year, month).toLocaleString('default', { month: 'long' });
          calendarHeader.textContent = `${monthName} ${year}`;
        }
          function generateCalendar(month, year) {
            const firstDay = new Date(year, month).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();
              //Clear previous calendar
              calendarGrid.innerHTML = '';
              //Dynamically set the header based on currentMonth and currentYear
              const monthName = new Date(year, month).toLocaleString('default', { month: 'long' });
              calendarHeader.textContent = `${monthName} ${year}`;
              //Generate days for previous months last few days
              for (let i = 0; i < firstDay; i++) {
                  const cell = document.createElement('div');
                  cell.classList.add('calendar-day', 'empty');
                  calendarGrid.appendChild(cell);
              }
              //Generate days for the current month
              for (let i = 1; i <= daysInMonth; i++) {
                  const cell = document.createElement('div');
                  cell.classList.add('calendar-day');
                  cell.textContent = i;
                  const dayDate = new Date(year,month, i);
                  if(dayDate.getDay()===0){
                    cell.classList.add('bg-gray-200','text-gray-600');
                    cell.classList.remove('cursor-pointer');
                  }
                  else{
                  cell.addEventListener('click', function() {
                      document.querySelectorAll('.calendar-day.selected').forEach(selectedDay => {
                          selectedDay.classList.remove('selected');
                      });
                      cell.classList.add('selected');
                      selectedDate = `${year}-${month + 1}-${cell.textContent.padStart(2, '0')}`;
                      // Optionally, load available time slots for this date here
                      displayAvailableTimeSlots();
                  });
                }
                  calendarGrid.appendChild(cell);
              }
          }
          function displayAvailableTimeSlots() {
            const timeSlotsContainer = document.getElementById('timeSlots');
            timeSlotsContainer.innerHTML = '';
            //available time slots
            const timeSlots = ['9:30', '12:30', '2:30'];
            //create and show time slots
            timeSlots.forEach(time => {
                const timeSlotDiv = document.createElement('div');
                timeSlotDiv.classList.add('time-slot', 'cursor-pointer', 'rounded', 'text-center', 'bg-gray-300', 'hover:bg-gray-400', 'p-2', 'm-2');
                timeSlotDiv.textContent = time;
                timeSlotDiv.setAttribute('data-time', time);
                timeSlotDiv.addEventListener('click', function() {
                    //remove selected feature when navigating days
                    document.querySelectorAll('.time-slot').forEach(slot => {
                        slot.classList.remove('selected-time-slot');
                    });
                    //clicked time = selected
                    timeSlotDiv.classList.add('selected-time-slot');
                    selectedTimeSlot = time;
                });
                timeSlotsContainer.appendChild(timeSlotDiv);
            });
        }
        //generate the calendar
        generateCalendar(currentMonth, currentYear);
        document.getElementById('prevMonth').addEventListener('click', () => {
          if (currentMonth === 0) {
            currentMonth = 11;
            currentYear--;
          } else {
            currentMonth--;
          }
          generateCalendar(currentMonth, currentYear);
        });
        document.getElementById('nextMonth').addEventListener('click', () => {
          if (currentMonth === 11) {
            currentMonth = 0;
            currentYear++;
          } else {
            currentMonth++;
          }
          generateCalendar(currentMonth, currentYear);
        });
        
</script>
</body>
</html>
