<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Le Couturier - Appointment Page</title>
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
    .announcement-popup {
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
  }
  .popup-content {
    background-color: white;
    padding: 20px;
    border-radius: 5px;
    text-align: center;
  }
  .close-button {
    float: right;
    font-size: 30px;
    cursor: pointer;
  }
  .hidden {
    display: none;
  }
  a:hover, button:hover {
    transform: scale(1.05);
    transition: transform 0.3s ease;
  }
  .booking-circle:hover {
      transform: scale(1.05);
      transition: transform 0.3s ease-in-out;
    }
  </style>
</head>
<body style="background-color: #F5EAEB;">
  <!--Top bar-->
  <div class="py-3 px-5 flex justify-between items-center" style="background-color:#C1373C ;">
    <div class="flex items-center">
      <div class="bg-white border border-black py-2 px-4 rounded">
      <a href="home.php" class="text-xl font-bold" style="color: #152266;">Le Couturier</a>
    </div>
    </div>
    <div class="flex items-center gap-4">
      <div class="bg-white border border-black py-2 px-4 rounded">
      <a href="adminLogin.php" class="text-lg font-bold island-moments"style="color: #152266;">Sign In</a>
    </div>
    </div>
  </div>
  <!--Big image with text-->
  <div class="relative">
    <img src="img/Appointment.jpg" class="w-full h-96 object-cover">
    <div class="absolute top-0 left-0 right-0 bottom-0 bg-black bg-opacity-25 flex items-center justify-center">
      <h1 class="text-white text-6xl font-bold jacques">Book by Service</h1>
    </div>
  </div>
   <!--Pop-up Announcement Box-->
   <div id="announcementPopup" class="announcement-popup hidden">
    <div class="popup-content">
      <span class="close-button" onclick="closePopup()">&times;</span>
      <h2>Announcement</h2>
      <p>announcement here</p>
    </div>
  </div>
    <!--Services reminder-->
    <div class="text-center py-6" style="color: #99382C;">
        <p class="larger-text italiana">Tailor Services - prices starting at, subject to change</p>
    </div>
    <!--New Services-->
    <div class="container mx-auto my-10 text-center">
    <a href="appointmentScheduler.php" class="inline-block">
    <div class="booking-circle flex flex-col items-center justify-center rounded-full h-64 w-64 bg-red-500 text-white mx-auto">
      <i class="fas fa-calendar-check fa-7x"></i>
      <p class="text-xl font-bold mt-3">Book an Appointment</p>
    </div>
  </a>
</div>
  <!--Contact form section-->
  <div class="py-10 px-5" style="background-color: #F5EAEB;" id="#contactUsSection">
    <div class="container mx-auto">
      <div class="max-w-2xl mx-auto text-center" style="color: #99382C;">
        <p class="text-lg mb-5">If you require alterations or tailoring services, or if you have additional inquiries not addressed in our FAQs, feel free to reach out to us. Drop your message below, and we'll make every effort to respond promptly.</p>
        <h2 class="text-4xl font-bold mb-5">Contact Us</h2>
        <form action="#">
          <input type="text" placeholder="Name" class="block w-full p-3 mb-4">
          <input type="email" placeholder="Email" class="block w-full p-3 mb-4">
          <textarea placeholder="Write something..." class="block w-full p-3 mb-4"></textarea>
          <button type="submit" class="w-full text-white py-3 px-6 rounded" style="background-color: #D05B5F;">Submit</button>
        </form>
      </div>
    </div>
  </div>
  <!--Footer with address and map-->
  <div class="py-10" style="background-color: #F5EAEB;">
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-2">
      <div style="color: #99382C;">
        <h3 class="text-2xl font-bold mb-3">1738 Massachusetts Ave Cambridge, MA 02138</h3> 
        <p class="my-3">(617) 497-1258</p>
        <p class="text-sm">Mon: 9:00AM - 6:00PM</p>
        <p class="text-sm">Mon: 9:00AM - 6:00PM</p>
        <p class="text-sm">Mon: 9:00AM - 6:00PM</p>
        <p class="text-sm">Mon: 9:00AM - 6:00PM</p>
        <p class="text-sm">Mon: 9:00AM - 6:00PM</p>
      </div>
      <div>
      <div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2947.0245575995805!2d-71.12219652266681!3d42.3846233335475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e3775408348aa1%3A0x515c1bbec9ee6f9!2sLe%20Couturier%20House%20of%20Alterations!5e0!3m2!1sen!2sus!4v1706551375184!5m2!1sen!2sus" width="750" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <script>
          window.onload = function() {
            document.getElementById("announcementPopup").classList.remove("hidden");
          };
      
          function closePopup() {
            document.getElementById("announcementPopup").classList.add("hidden");
            setTimeout(() => {
              document.getElementById("contactUsSection").style.opacity = 1;
            }, 500);
          }
              window.addEventListener('scroll', () => {
        const elements = document.querySelectorAll('.service-box');
        const windowHeight = window.innerHeight;

        elements.forEach(el => {
          const position = el.getBoundingClientRect().top;
          if (position < windowHeight - 100) {
            el.classList.add('slide-in');
          }
        });
      });
        </script>
      </body>
</html>

      
        
