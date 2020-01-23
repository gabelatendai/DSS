// JavaScript Document


 function displayNextImage() {
              x = (x === images.length - 1) ? 0 : x + 1;
              document.getElementById("img").src = images[x];
          }

          function displayPreviousImage() {
              x = (x <= 0) ? images.length - 1 : x - 1;
              document.getElementById("img").src = images[x];
          }

          function startTimer() {
              setInterval(displayNextImage, 3000);
          }
          var images = [], x = -1;
          images[0] = "images/logo.jpg";
          images[1] = "images/organogram.jpg";
          

		  
                  
                  
		  function NextImage() {
              x = (x === forit.length - 1) ? 0 : x + 1;
              document.getElementById("home").src = forit[x];
          }

          function PreviousImage() {
              x = (x <= 0) ? forit.length - 1 : x - 1;
              document.getElementById("home").src = forit[x];
          }

          function start() {
              setInterval(NextImage, 3000);
          }


          var forit = [], x = -1;
          forit[0] = "images/1.JPG";
          forit[1] = "images/2.JPG";
          forit[2] = "images/3.jpg";
          forit[3] = "images/4.jpg";
          forit[4] = "images/5.jpg";
          forit[5] = "images/8.jpg";
		  //for EHT
		  
		   function NextEht() {
              x = (x === eht.length - 1) ? 0 : x + 1;
              document.getElementById("eht").src = eht[x];
          }

          function PreviousEht() {
              x = (x <= 0) ? eht.length - 1 : x - 1;
              document.getElementById("eht").src = eht[x];
          }

          function startEht() {
              setInterval(NextEht, 3000);
          }


          var eht = [], x = -1;
          eht[0] = "images/ehtd.png";
          eht[1] = "images/eht2.JPG";
          eht[2] = "images/eht3.png";
		  
		  //for HR
		  
		   function NextHr() {
              x = (x === hr.length - 1) ? 0 : x + 1;
              document.getElementById("hr").src = hr[x];
          }

          function PreviousHr() {
              x = (x <= 0) ? hr.length - 1 : x - 1;
              document.getElementById("hr").src = hr[x];
          }

          function startHr() {
              setInterval(NextHr, 5000);
          }


          var hr = [], x = -1;
          hr[0] = "images/hr.jpg";
          hr[1] = "images/hr1t.png";
          hr[2] = "images/hr3.jpg";
		 
		  
		  
		  
		  
		  
		  
		  
		  