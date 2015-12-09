<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <title>ECU Assignment Stapler</title>
    <link href=//fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700" rel='stylesheet' />
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="stapler.css">
  </head>
  <body>
    <h1>ECU Assignment Stapler</h1>
    <div class="staple-forms">
    <form id="cover-details" method="post" action="create.php">
      <div class="cover-form">
        <h2>Cover Sheet</h2>
        <label for="unit-code" class="text-label">Unit code:</label>
        <input id="unit-code" name="unit-code" type="text" class="pdf-text" placeholder="ECU1234"><br>
        <label for="unit-title" class="text-label">Unit title:</label>
        <input id="unit-title" name="unit-title" type="text" class="pdf-text" placeholder="18th Century Agrarian Business"><br>
        <label for="first-name" class="text-label">First Name:</label>
        <input id="first-name" name="first-name" type="text" class="pdf-text" placeholder="Buster"><br>
        <label for="family-name" class="text-label">Family Name:</label>
        <input id="family-name" name="family-name" type="text" class="pdf-text" placeholder="Bluth"><br>
        <label for="student-id" class="text-label">Student ID:</label>
        <input id="student-id" name="student-id" type="text" class="pdf-text" placeholder="12345678"><br>
        <label for="lecturer" class="text-label">Lecturer:</label>
        <input id="lecturer" name="lecturer" type="text" class="pdf-text" placeholder="Lucille Austero"><br>
        <label for="assignment-topic" class="text-label">Assignment Topic:</label>
        <input id="assignment-topic" name="assignment-topic" type="text" class="pdf-text" placeholder="Concerns about an uprising"><br>
        <label for="due-date" class="text-label">Due date:</label>
        <input id="due-date" name="due-date" type="date" class="pdf-date" value="<?php echo date("Y-m-d");  ?>"><br>
        <label for="tutorial" class="text-label">Group or Tutorial:</label>
        <input id="tutorial" name="tutorial" type="text" class="pdf-text" placeholder="Tuesdays, 0930, with G.O.B."><br>
        <label for="course" class="text-label">Course:</label>
        <input id="course" name="course" type="text" class="pdf-text" placeholder="Diploma of Inapplicable Studies"><br>
        <label for="campus" class="text-label">Campus:</label>
        <input id="campus-ml" name="campus" type="radio" class="pdf-radio" value="ML" checked>Mount Lawley<br>
        <label for="none" class="text-label"></label>
        <input id="campus-jo" name="campus" type="radio" class="pdf-radio" value="JO">Joondalup<br>
        <label for="date-submitted" class="text-label">Date submitted:</label>
        <input id="date-submitted" name="date-submitted" type="date" class="pdf-date" value="<?php echo date("Y-m-d");  ?>"><br><br>
      </div>
      <span id="current-files"></span>
      <input id="files-uploaded" name="files-uploaded" type="hidden">
    </form>
    <div class="upload-boxen">
      <form id="upload" method="post" action="handler.php" enctype="multipart/form-data">
        <h2>Upload Files</h2>
        <div id="drop">
          Drop Assignment PDFs Here
          <a class="stapler-button"><i class="fa fa-folder-open"></i> Browse</a>
          <input type="file" name="upl" multiple />
        </div>
        <ul>
          <!-- The file uploads will be shown here -->
        </ul>
      </form>
    </div><br>
    <div id="submit-button">
      <a id="staple" class="stapler-button"><i class='fa fa-file-pdf-o'></i> Staple Assignment</a>
    </div><br>
    <div id="feedback">
      Send feedback/rewards/punishment to jonathan [at] ihle.in or <a href="https://twitter.com/MrIhlein">Twert Me</a>
    </div>
    </div>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/jquery.knob.js"></script>
    <script src="js/jquery.ui.widget.js"></script>
    <script src="js/jquery.iframe-transport.js"></script>
    <script src="js/jquery.fileupload.js"></script>
    <script src="js/upload.js"></script>
    <script>
      $("#staple").click(function()
      {
        $('#files-uploaded').val($("#current-files").html());
        $("#cover-details").submit();
      });
    </script>
  </body>
</html>
