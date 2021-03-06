$(function()
{
    // Variable to store your files
    var files;

    // Add events
    $('input[type=file]').on('change', prepareUpload);
    $('#submit_blog').on('click', uploadFiles);

    // Grab the files and set them to our variable
    function prepareUpload(event)
    {
        files = event.target.files;
    }

    // Catch the form submit and upload the files
    function uploadFiles(event)
    {
        event.stopPropagation(); // Stop stuff happening
        event.preventDefault(); // Totally stop stuff happening

        // START A LOADING SPINNER HERE

        // Create a formdata object and add the files
        var data = new FormData();
        $.each(files, function(key, value)
        {
            data.append(key, value);
        });

        $.ajax({
            url: 'blog_check.php?files',
            type: 'POST',
            data: data,
            cache: false,
            dataType: 'json',
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            success: function(data, textStatus, jqXHR)
            {
                if(typeof data.error === 'undefined')
                {
                    // Success so call function to process the form
                    submitForm(event, data);
                }
                else
                {
                    // Handle errors here
                    console.log('ERRORS: ' + data.error);
                }
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                // Handle errors here
                console.log('ERRORS: ' + textStatus);
                // STOP LOADING SPINNER
            }
        });
    }

    function submitForm(event, data)
    {
        // Create a jQuery object from the form
        $form = $(event.target);


        var fullPath = document.getElementById('blogphotoinput').value;
        var filename="";
        if (fullPath) {
            var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
            filename = fullPath.substring(startIndex);
            if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
                filename = filename.substring(1);
            }
        }
        // Serialize the form data
        var formData = $form.serialize();
        var body = $('body');
        formData='title='+encodeURIComponent($('#blogtitleinput').val())+'&'+formData;
        formData='text='+encodeURIComponent($('#blogtextinput').val())+'&'+formData;
        formData='language='+encodeURIComponent($('input[name="bloglanguageinput"]:checked').val())+'&'+formData;
        formData='AS='+encodeURIComponent($('input[name="blogActuOrSeasoninput"]:checked').val())+'&'+formData;
        formData='author='+encodeURIComponent(body.data('username'))+'&'+formData;
        formData='authorid='+encodeURIComponent(body.data('userid'))+'&'+formData;
        var rand = Math.floor((Math.random() * 10) + 1);
        formData='photoname='+filename+'&'+formData;
        // You should sterilise the file names
        $.each(data.files, function(key, value)
        {
            formData = formData + '&filenames[]=' + value;
        });console.log(formData);
        var previous_content = $('#adminform').html();
        $.ajax({
            url: 'blog_check.php',
            type: 'POST',
            data: formData,
            cache: false,
            dataType: 'json',
            success: function(data, textStatus, jqXHR)
            {
                if(typeof data.error === 'undefined')
                {
                    $('#adminform').html("<p>Votre demande a bien été prise en compte. </p>");
                    setTimeout(function() {
                        $('#adminform').html(previous_content);
                    }, 5000);
                    // Success so call function to process the form
                    for(var key in data.formData){
                        console.log(key +" : " + data.formData[key]);
                    }


                }
                else
                {
                    $('#adminform').html("<p>Une erreur est survenue merci de contacter l\'administrateur du site." +
                        "Votre demande sera prise en compte le plus rapidement possible.</p>");
                    setTimeout(function() {
                        $('#adminform').html(previous_content);
                    }, 5000);
                    // Handle errors here
                    console.log('ERRORS: ' + data.error);
                }
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                $('#adminform').html("<p>Une erreur est survenue merci de contacter l\'administrateur du site." +
                    "Votre demande sera prise en compte le plus rapidement possible.</p>");
                // Handle errors here
                console.log('ERRORS: ' + textStatus);
            },
            complete: function()
            {
                // STOP LOADING SPINNER
            }
        });
    }
});


function escapeHtml(text) {
    var map = {
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#039;'
    };

    return text.replace(/[&<>"']/g, function(m) { return map[m]; });
}