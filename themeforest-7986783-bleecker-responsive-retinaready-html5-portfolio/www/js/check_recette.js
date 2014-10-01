$(function()
{
    // Variable to store your files
    var files;

    // Add events
    $('input[type=file]').on('change', prepareUpload);
    $('#submit_recette').on('click', uploadFiles);

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
            url: 'recette_check.php?files',
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


        var fullPath = document.getElementById('recettephotoinput').value;
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


        var list_of_ingredients = document.getElementsByName('recetteinginput');
        var nb_of_ingredients = list_of_ingredients.length;
        var array_of_ingredients = [];
        for(var i = 0; i < nb_of_ingredients ; i++){
            if(list_of_ingredients[i].value != ""){
                array_of_ingredients.push(list_of_ingredients[i].value);
            }
        }
        var ingredients = JSON.stringify(array_of_ingredients);
        formData='title='+$('#recettetitleinput').val()+'&'+formData;
        formData='text='+$('#recettetextinput').val()+'&'+formData;
        formData='nbpers='+$('#recettenbpersinput').val()+'&'+formData;
        formData='ingredients='+ingredients+'&'+formData;
        formData='photoname='+filename+'&'+formData;
        // You should sterilise the file names
        $.each(data.files, function(key, value)
        {
            formData = formData + '&filenames[]=' + value;
        });
        var previous_content = $('#adminform').html();
        $.ajax({
            url: 'recette_check.php',
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
                    console.log('SUCCESS: ' + data.success);

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
});/**
 * Created by GD on 01/10/2014.
 */
