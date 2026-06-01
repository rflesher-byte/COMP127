<!DOCTYPE html>
<html lang="en">
  <head>
      <title>Home Page</title>
      <meta charset="utf-8">
      <link href="index-style.css" rel="stylesheet">
  </head>

  <body>
  <div id="container">
    <!-- Header/Name -->
    <div class="header">
      <h1>Ryan Flesher</h1>
    </div>

    <div class="profile-section">
       <!-- Profile Picture -->
      <img src=IMG-8321.jpg alt="Selfie of Ryan Flesher wearing an awesome pair of presricption sunglasses" width="432" height="768">
  
      <div class="intro-text">
        <!-- Short Intro -->
         <h2>About Me</h2>
        <p>
            Hello. I am a current student at the University of the Pacific. 
            I am from the Central Valley, so UOP is my local four-year university. 
            I am majoring in both Computer Science and English.
            I am currently of senior standing and am looking to graduate Fall 2026.
            I am also a transfer student from San Joaquin Delta College.
            I have an AA in English and an AA in Art History from SJDC.
        </p>
      </div>

      <div class="clear"></div>
    </div>

    <div class="section">
      <!-- Major / Concentration -->
      <h2>Academic Information</h2>
      <p><strong>Major(s):</strong> Computer Science, English</p>
    </div>
      
    <div class="section">
      <!-- Courses (read dynamically) -->
      <h2>Courses I Have Taken (skipping GE and English for brevity)</h2>
      <ul>
        <?php
          // Task 3: Read course list from courses.txt and display each line as a list item
          $courses = file("courses.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
          foreach ($courses as $course) {
              echo "<li>" . htmlspecialchars($course) . "</li>\n";
          }
        ?>
      </ul>
    </div>

    <div class="section">
      <!-- Projects -->
      <h2>Projects</h2>
  
      <h3>Escape From Dunwall</h3>
      <p>
          This was a Flappy Bird clone that I made as the final project for my COMP 053 class. 
          It plays largely in the same way as the original flappy bird, but it is themed after the video game franchise known as <i>Dishonored</i>.
          The game was made in Godot 4 and had randomized heights of the obstacles. 
          The main difference between my game and Flappy Bird is that mine had a timer/energy bar that needed to be replenished by collecting "runes" in the game.
      </p>
  
      <h3>El Cucuy</h3>
      <p>
          El Cucuy was the Java-based point-and-click horror game that I made in my COMP 055 class. 
          I worked on it with two other students and we used GitHub to collaborate on the project. 
          The game was inspired by old Adobe Flash games but was made in Java using the ASM library. 
      </p>
    </div>

    <div class="section">
      <!-- Interests and Hobbies -->
      <h2>Interests and Hobbies</h2>
      <ul>
          <li>Film Photography</li>
          <li>Reading (mostly fiction)</li>
          <li>Collecting Vinyl Records (and listening to them)</li>
      </ul>
    </div>

    <div class="section">
      <!-- Unique Fact -->
      <h2>Something Interesting About Me</h2>
      <p>
          I have a twin brother. We are fraternal twins, but are still very similar to each other and many people get us mixed up. 
          That is despite the fact that I wear glasses and my twin does not.
      </p>
    </div>

    <hr>

    <!-- alendar -->
    <div class="section">
      <h2>This Month's Calendar</h2>
      <?php
        // Get the current date
        $year  = (int) date("Y");
        $month = (int) date("n");
        $today = (int) date("j");

        // Month name
        $monthName = date("F");

        // Weekday (0 = Sunday, 6 = Saturday)
        $firstWeekday = (int) date("w", mktime(0, 0, 0, $month, 1, $year));

        // Days in the month
        $daysInMonth = (int) date("t", mktime(0, 0, 0, $month, 1, $year));
      ?>

      <table class="calendar">
        <caption><?php echo $monthName . " " . $year; ?></caption>
        <tr>
          <th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th>
          <th>Thu</th><th>Fri</th><th>Sat</th>
        </tr>
        <tr>
          <?php
            // Pad empty cells before the 1st
            for ($i = 0; $i < $firstWeekday; $i++) {
                echo "<td></td>";
            }

            $currentWeekday = $firstWeekday;

            for ($day = 1; $day <= $daysInMonth; $day++) {
                // Highlight today's date
                if ($day === $today) {
                    echo "<td class=\"today\">$day</td>";
                } else {
                    echo "<td>$day</td>";
                }

                $currentWeekday++;

                // Start new row after Saturday / week
                if ($currentWeekday === 7 && $day < $daysInMonth) {
                    echo "</tr>\n<tr>";
                    $currentWeekday = 0;
                }
            }

            // Empty cells after the last day to fill the row
            while ($currentWeekday > 0 && $currentWeekday < 7) {
                echo "<td></td>";
                $currentWeekday++;
            }
          ?>
        </tr>
      </table>
    </div>

    <!-- List all files -->
    <div class="section">
      <h2>Project Files</h2>
      <ul>
        <?php
          // Reads entries in directory
          $files = scandir(".");
          foreach ($files as $file) {
              // Skip these
              if ($file === "." || $file === "..") {
                  continue;
              }
              echo "<li>" . htmlspecialchars($file) . "</li>\n";
          }
        ?>
      </ul>
    </div>

    <div class="footer">
      <!-- Footer -->
      <p>Created by Ryan Flesher</p>
    </div>

  </div>
  </body>
</html>
