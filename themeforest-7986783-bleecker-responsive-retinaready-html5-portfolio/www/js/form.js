/**
 * Created by GD on 19/09/2014.
 */

// function init
//----------------------------------------------------------------------------------------------------------------------

(function(){
    'use strict';
    var input = document.getElementsByClassName('input')
        , length = input.length
    ;
    while(length--){
        input[length].style.display = 'none';
    }
})();
// end function init
//----------------------------------------------------------------------------------------------------------------------

// function showContent
//----------------------------------------------------------------------------------------------------------------------
function showContent(){
    'use strict';


    // initial variable
    //------------------------------------------------------------------------------------------------------------------
    var field = document.getElementsByClassName('field')
        , input = document.getElementsByClassName('input')
        , field_length = field.length
        , input_length = input.length
        , check=""
        ;
    // end initial variable
    //------------------------------------------------------------------------------------------------------------------

    // remove all fields
    //------------------------------------------------------------------------------------------------------------------
    while(input_length--){
        input[input_length].style.display = 'none';
    }
    // end remove all fields
    //------------------------------------------------------------------------------------------------------------------

    // reset all fields
    //------------------------------------------------------------------------------------------------------------------
    document.getElementById('blogtitle').innerHTML = '';
    document.getElementById('blogtitleinput').value = '';
    document.getElementById('blogtext').innerHTML = '';
    document.getElementById('blogtextinput').value = '';
    $('#blogphoto').attr('src', '');

    document.getElementById('recettetitle').innerHTML = '';
    document.getElementById('recettetitleinput').value = '';
    document.getElementById('recettetext').innerHTML = '';
    document.getElementById('recettetextinput').value = '';
    document.getElementById('recettenbpersinput').innerHTML = '';
    document.getElementById('recettenbpersinput').value = '';
    $('#div_ingredients').html("");
    $('#recettephoto').attr('src', '');

    //------------------------------------------------------------------------------------------------------------------

    // check which checkbox is checked
    //------------------------------------------------------------------------------------------------------------------
    while(field_length--){
        if(field[field_length].checked == true){
            check = field[field_length].id;
        }
    }
    // end checking boxes
    //------------------------------------------------------------------------------------------------------------------

    // showing required content
    //------------------------------------------------------------------------------------------------------------------
    var show = document.getElementsByClassName(check)
        , show_length = show.length
        ;
    while(show_length--){
        show[show_length].style.display = 'block';
    }

    // end showing required content
    //------------------------------------------------------------------------------------------------------------------


    // changing form action
    //------------------------------------------------------------------------------------------------------------------
    if(check == 'bloginput'){
    document.getElementById('adminform').action = 'blog_check.php';
    }else{
    document.getElementById('adminform').action = 'recette_check.php';
    }

    // end changing form action
    //------------------------------------------------------------------------------------------------------------------


}
// end function showContent
//----------------------------------------------------------------------------------------------------------------------

// function blogChange
//----------------------------------------------------------------------------------------------------------------------

function blogChange(){
    // title
    document.getElementById('blogtitle').innerHTML = document.getElementById('blogtitleinput').value;
    // end title
    document.getElementById('blogtext').innerHTML = document.getElementById('blogtextinput').value;
    // date
    var date = new Date()
        , month = date.getMonth()
        , day = date.getDate()
        , french_month=get_month(month)
    ;

    var div = day + ' ' + french_month + ' ' + date.getFullYear() + ' ' + '&nbsp;&middot;&nbsp; par Jordan Delamotte';
    document.getElementById('blogpostdate').innerHTML = div;


    // end date

}

// end function showContent
//----------------------------------------------------------------------------------------------------------------------
// function recetteChange
//----------------------------------------------------------------------------------------------------------------------

function recetteChange(){
    // title
    document.getElementById('recettetitle').innerHTML = document.getElementById('recettetitleinput').value;
    // text
    document.getElementById('recettetext').innerHTML = document.getElementById('recettetextinput').value;
    // nombre de personnesIngrédients
    document.getElementById('recetteNbPers').innerHTML = "pour "+document.getElementById('recettenbpersinput').value + " personnes";
    // date
    var date = new Date()
        , month = date.getMonth()
        , day = date.getDate()
        , french_month=get_month(month)
    ;

    var div = day + ' ' + french_month + ' ' + date.getFullYear() + ' ' + '&nbsp;&middot;&nbsp; par Jordan Delamotte';
    document.getElementById('recettepostdate').innerHTML = div;

    var ING = document.getElementsByName('recetteinginput');
    var ul = $('#recetteIng');
    ul.html('')
    for(var i = 0 ; i < ING.length; i++){
        var div = '<li>'+ ING[i].value+'</li>' ;
        ul.append(div);
        console.log(ING[i].value);
    }
    // end date

}

// end function showContent
//----------------------------------------------------------------------------------------------------------------------


// end function showContent
//----------------------------------------------------------------------------------------------------------------------
function readURL(input, id) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $(id).attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
$('#blogphotoinput').change(function(){
    readURL(this, '#blogphoto');
});

$('#recettephotoinput').change(function(){
    readURL(this, '#recettephoto');
});

// end function showContent
//----------------------------------------------------------------------------------------------------------------------



function get_month(month){
    month = month+1;
    switch (month){
        case 1 :
            return "JANVIER";
            break;
        case 2 :
            return 'FEVRIER';
            break;
        case 3 :
            return 'MARS';
            break;
        case 4 :
            return 'AVRIL';
            break;
        case 5 :
            return 'MAI';
            break;
        case 6 :
            return 'JUIN';
            break;
        case 7 :
            return 'JUILLET';
            break;
        case 8 :
            return  'AOUT';
            break;
        case 9 :
            return 'SEPTEMBRE';
            break;
        case 10 :
            return  'OCTOBRE';
            break;
        case 11 :
            return 'NOVEMBRE';
            break;
        case 12 :
            return 'DECEMBRE';
            break;
        default :
            return null;

    }
}

function addIngredient(){
    var div = $('#div_ingredients');
    var content = '<input class="recetteinput input" type="text"  name="recetteinginput" >';
    div.append(content);
}