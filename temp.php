
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Artify Auction</title>
   
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   
 
  
   
<body>




  <div id="id01" class="w3-modal w3-animate-opacity">
    <div class="w3-modal-content w3-card-4" style="width:1056px;">

<div class="cert-container" >
<span onclick="document.getElementById('id01').style.display='none'" 
        class="w3-button w3-large w3-display-topright">&times;</span>
  <div class="border-gray">
    <div class="border-red">
      <div class="content">
          <img id="mt-logo" src="images/MT_horiz_tagline_color.png" alt="Logo Goes Here" />
          <img id="mt-stamp" src="images/mt-stamp.png" alt="Certified Stamp" />
          
              <ul class="credentials">
                <li>
                    <p id="cert-id">Certificate Id: <span>{{certification_id}}</span></p>
                </li>
                <li>
                    <p id="host-server-id">Hosting Server Id: <span>{{Server_id}}</span></p>
                </li>
                <li>
                    <p id="lms-id">Learning Management System Id: <span>{{lms_id}}</span></p>
                </li>
              </ul>
          
            <div class="copytext-container">
                <div class="congrats-copytext">
                    <h1>Certificate of Completion</h1><br>
                    <h2>Congratulations <span>{{First Name}}</span><span> {{Last Name}}</span></h2><br>
                    <h3 id="user-id-string">User Id: <span>{{user_id}}</span></h3>
                </div>
                
                <div class="course-copytext">
                    <h1><span>{{Course Title}}</span></h1><br>
                    <h2>Course Completed on: <span>{{certification_date}}</span></h2><br>
                    <h3 id="course-id-string">Course Id: <span>{{course_id}}</span></h3>
                    
                </div>
                <div class="address-copytext">
                    <address>Company Name <br> Company Street Address <br> City, State Zip</address>
                    <a href="#" id="mt-site"><em>website.com</em></a>
                </div>
            </div>
      </div>
    </div>
  </div>
</div>

      </div>
     
    </div>
  </div>

            


    
</body>
</html>