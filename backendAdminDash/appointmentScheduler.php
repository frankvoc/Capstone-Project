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
  .selected-date {
    background-color: #4CAF50;
    color: white;
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
  input.input-error {
    border: 2px solid red !important;
  }
.error-message {
    color: red;
    font-size: 0.875em;
    margin-top: 0.25rem;
  }
  .disabled {
    color: #ccc;
    pointer-events: none;
}
.greyed-out {
    color: #ccc;
    pointer-events: none;
}
  </style>
</head>
<body class="bg-red-100">
        <!-- <div id="calendar"></div> -->
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
  <h2 class="text-center text-6xl py-6 italiana" style="color: #99382C;">Schedule Appointment</h2>
  <div class="max-w-md mx-auto p-8 rounded-lg">
    <form id="appointmentForm" class="space-y-6">
      <div id="step1" class="step" data-step="1">
        <h2 class="text-center text-4xl py-6 italiana" style="color: #99382C;">Provide Contact</h2>
        <div><!--Contact Part-->
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
        <br><!--Next button-->
        <button type="button" id="next1" class="form-nav w-full text-white bg-blue-600 text-2xl p-2 rounded hover:bg-blue-700">Next</button>
      </div>
      <!--other steps-->
      <div id="step2" class="step hidden" data-step="2">
      <div><!--Job description-->
          <h2 class="text-center text-3xl py-6 italiana" style="color: #99382C;">Provide a Job Description</h2>
          <label for="jobDescription" class="text-sm font-medium text-gray-700"></label>
          <textarea id="jobDescription" name="jobDescription" class="w-full p-2 border border-gray-300 rounded mt-1" rows="4" placeholder="Please provide a description of the service you need..."required></textarea>
        </div>
        <div class="flex justify-between">
          <!--Back button back to step 1-->
          <button type="button" id="back2" class="form-nav text-white bg-blue-600 p-2 rounded hover:bg-blue700-">Back</button>
          <!--Next button to step 3-->
          <button type="button" id="next2" class="form-nav text-white bg-blue-600 p-2 rounded hover:bg-blue-700">Next</button>
        </div>
      </div>
      <div id="step3" class="step hidden" data-step="3">
        <!--Appointment date/time-->
      <h2 class="text-center text-3xl py-6 italiana" style="color: #99382C;">Schedule a Date and Time</h2>
        <!--calendar view -->
        <div class="calendar my-5">
          <div class="calendar-header flex justify-between items-center">
            <!--Navigate previous months-->
            <button type="button" id="prevMonth" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Prev</button>
            <span>Month Year</span> <!--dynamic generated month header-->
            <!--Navigate next months-->
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
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('appointmentForm');
    const steps = form.querySelectorAll('.step');
    let currentStep = 1;
    function validateCurrentStep() {
    document.querySelectorAll('.input-error').forEach(el => el.classList.remove('input-error'));
    document.querySelectorAll('.error-message').forEach(el => el.remove());
    let isValid = true;
    //show errors at each input
    function showError(inputId, message) {
        isValid = false;
        const input = document.getElementById(inputId);
        input.classList.add('input-error');
        //creating div to hold error
        const errorDiv = document.createElement('div');
        errorDiv.textContent = message;
        errorDiv.className = 'error-message';
        input.insertAdjacentElement('afterend', errorDiv);
    }
    //Validation
    //cannot be null
    const firstName = document.getElementById('firstName').value.trim();
    if (firstName === '') {
        showError('firstName', "First Name is required.");
    }
    //cannot be null
    const lastName = document.getElementById('lastName').value.trim();
    if (lastName === '') {
        showError('lastName', "Last Name is required.");
    }
    //email regex must contain @ and .
    const email = document.getElementById('email').value.trim();
    if (email === '' || !/^\S+@\S+\.\S+$/.test(email)) {
        showError('email', "A valid Email is required.");
    }
    //phone validation ONLY accepts 10 #s and () or -s
    const phone = document.getElementById('phone').value.trim();
    if (phone === '' || !/^[\d\s()+-]+$/.test(phone)) {
    showError('phone', "A valid Phone Number is required with the correct format.");
    } else {
        //make a new variable that removes the () -s and stores as just numbers
        const digitsOnly = phone.replace(/\D/g, ''); //remove the () or -s
        if (digitsOnly.length !== 10) {//if not == 10 = error
            showError('phone', "Phone Number must contain exactly 10 digits.");
        }
    }
    return isValid;
}
    //imporved step logic
    document.getElementById('appointmentForm').addEventListener('click', function(e) {
        if (e.target.matches('.form-nav')) {
            e.preventDefault(); //prevent default action
            const isNext = e.target.id.includes('next');
            //using validateCurrentStep
            if (isNext && !validateCurrentStep()) {
                return; //if function does not pass stop the user from moving forward
            }
            const targetStep = isNext ? currentStep + 1 : currentStep - 1;
            //same logic previously used
            steps[currentStep - 1].classList.add('hidden');
            currentStep = targetStep;
            if (currentStep >= 1 && currentStep <= steps.length) {
                steps[currentStep - 1].classList.remove('hidden');
            }
        }
    });
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
    const calendarGrid = document.querySelector('.calendar-grid');
    calendarGrid.innerHTML = '';
    const today = new Date();
    today.setHours(0, 0, 0, 0);
    //find first day of the month
    const firstDay = new Date(year, month).getDay();
    //total days in month
    const daysInMonth = new Date(year, month + 1, 0).getDate();
    //update header based on prev->next
    updateCalendarHeader(month, year); // Update the calendar header
    //add empty divs to hold dates
    for (let i = 0; i < firstDay; i++) {
      const emptyCell = document.createElement('div');
      emptyCell.classList.add('calendar-day', 'empty');
      calendarGrid.appendChild(emptyCell);
    }
    //populate with date calendars
    for (let day = 1; day <= daysInMonth; day++) {
      const cell = document.createElement('div');
      cell.classList.add('calendar-day');
      cell.textContent = day;
      const dayDate = new Date(year, month, day);
      //normalize todays date so we can make it max selectable
      dayDate.setHours(0, 0, 0, 0);
      //check if today is sunday
      if (dayDate.getDay() === 0 || dayDate < today) {
        //if it is then give it .disabled tag
        cell.classList.add('bg-gray-200', 'text-gray-600', 'disabled');
      } else {
        cell.addEventListener('click', function() {
          const dayDate = new Date(year, month, day); // Ensure this creates a valid Date object
          displayAvailableTimeSlots(dayDate); // Pass this Date object to the function
          document.querySelectorAll('.calendar-day.selected').forEach(selectedDay => {
            selectedDay.classList.remove('selected');
          });
          cell.classList.add('selected');
          selectedDate = `${year}-${month + 1}-${day.toString().padStart(2, '0')}`;
          //display time slots
          displayAvailableTimeSlots();
        });
      }
      calendarGrid.appendChild(cell);
    }
  }
  function displayAvailableTimeSlots(selectedDate) {
    const timeSlotsContainer = document.getElementById('timeSlots');
    timeSlotsContainer.innerHTML = '';
    //convert selectedDate to YYYY-MM-DD format for the query using php toISOString
    const formattedDate = selectedDate.toISOString().split('T')[0];
    //fetching booked times
    fetch(`../controllers/getBookedTimes.php?date=${formattedDate}`)
        .then(response => response.json())
        .then(bookedTimes => {
          console.log(bookedTimes);
            const availableTimeSlots = ['9:30am', '12:30pm', '2:30pm'].filter(time => !bookedTimes.includes(time));
            //displaying only active times
            availableTimeSlots.forEach(time => {
                const timeSlotDiv = document.createElement('div');
                timeSlotDiv.classList.add('time-slot', 'cursor-pointer', 'rounded', 'text-center', 'bg-gray-300', 'hover:bg-gray-400', 'p-2', 'm-2');
                timeSlotDiv.textContent = time;
                timeSlotDiv.setAttribute('data-time', time);
                timeSlotDiv.addEventListener('click', function() {
                    document.querySelectorAll('.time-slot').forEach(slot => slot.classList.remove('selected-time-slot'));
                    timeSlotDiv.classList.add('selected-time-slot');
                    selectedTimeSlot = time;
                });
                timeSlotsContainer.appendChild(timeSlotDiv);
            });
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
