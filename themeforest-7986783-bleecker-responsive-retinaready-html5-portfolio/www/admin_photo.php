<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Script Tutorials" />
    <title>HTML5 Image uploader with Jcrop | Script Tutorials</title>

    <!-- add styles -->
    <link href="css/main.css" rel="stylesheet" type="text/css" />
    <link href="css/jquery.Jcrop.min.css" rel="stylesheet" type="text/css" />

    <!-- add scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.Jcrop.min.js"></script>
    <script src="js/scriptJcrop.js"></script>
</head>
<body>
<header>
    <h2>HTML5 Image uploader with Jcrop (<a href="http://www.script-tutorials.com/html5-image-uploader-with-jcrop/">Back to original tutorial</a>)</h2>
</header>

<div class="demo">
    <div class="bheader"><h2>-- Image upload form --</h2></div>
    <div class="bbody">

        <!-- upload form -->
        <form id="upload_form" enctype="multipart/form-data" method="post" action="photo_upload.php" onsubmit="return checkForm()">
            <!-- hidden crop params -->
            <input type="hidden" id="x1" name="x1" />
            <input type="hidden" id="y1" name="y1" />
            <input type="hidden" id="x2" name="x2" />
            <input type="hidden" id="y2" name="y2" />
            <label>titre slip</label><input type="text" id="title_short" name="title_short"/>
            <label>titre fancybox</label><input type="text" id="title_long" name="title_long"/>

            <h2>Step1: Please select image file</h2>
            <div><input type="file" name="image_file" id="image_file" onchange="fileSelectHandler()" /></div>

            <div class="error"></div>

            <div class="step2">
                <h2>Step2: Please select a crop region</h2>
                <img id="preview" />

                <div class="info">
                    <label>File size</label> <input type="text" id="filesize" name="filesize" />
                    <label>Type</label> <input type="text" id="filetype" name="filetype" />
                    <label>Image dimension</label> <input type="text" id="filedim" name="filedim" />
                    <label>W</label> <input type="text" id="w" name="w" />
                    <label>H</label> <input type="text" id="h" name="h" />
                </div>

                <input type="submit" value="Upload" />
            </div>
        </form>
    </div>
</div>
</body>
</html>