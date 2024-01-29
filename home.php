<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Le couturier</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Island+Moments&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Italiana&display=swap" rel="stylesheet">
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
    <!-- Services reminder -->
    <div class="text-center py-6" style="color: #99382C;">
        <p class="larger-text italiana">Tailor Services - prices starting at, subject to change</p>
    </div>
  <!--Services start-->
  <div class="container mx-auto my-10">
    <!--Service 1-->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
      <div class="flex justify-between items-center p-4 rounded" style="background-color: #D05B5F;">
        <div class="max-w-xs"style="color: #ffffff;">
          <h2 class="text-3xl font-bold mb-3">Service 1</h2>
          <p class="text-lg">text about service</p>
        </div>
        <a href="#" class="inline-block self-start">
          <img src="img/62c6f5307a58a4aa1fb770b1.png"class="w-32 h-32">
        </a>
      </div>
      <!--Service 2-->
      <div class="flex justify-between items-center p-4 rounded" style="background-color: #D05B5F;">
        <div style="color: #ffffff;">
          <h2 class="text-3xl font-bold mb-3">Service 2</h2>
          <p class="text-lg">text about service</p>
        </div>
        <a href="#" class="inline-block">
          <img src="img/62c6f5307a58a4aa1fb770b1.png"class="w-32 h-32">
        </a>
      </div>
      <!--Service 3-->
      <div class="flex justify-between items-center p-4 rounded" style="background-color: #D05B5F;">
        <div style="color: #ffffff;">
          <h2 class="text-3xl font-bold mb-3">Service 3</h2>
          <p class="text-lg">text about service</p>
        </div>
        <a href="#" class="inline-block">
          <img src="img/62c6f5307a58a4aa1fb770b1.png"class="w-32 h-32">
        </a>
      </div>
       <!--Additional services will follow here-->
    </div>
  </div>
  <!--Services end-->
  <!--Contact form section-->
  <div class="py-10 px-5" style="background-color: #F5EAEB;">
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
        <!--Actual Google Maps api for end prod-->
        <div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2947.0245575995805!2d-71.12219652266681!3d42.3846233335475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e3775408348aa1%3A0x515c1bbec9ee6f9!2sLe%20Couturier%20House%20of%20Alterations!5e0!3m2!1sen!2sus!4v1706551375184!5m2!1sen!2sus" width="1200" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        
