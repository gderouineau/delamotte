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

    // check which checkbox is checked
    //------------------------------------------------------------------------------------------------------------------
    while(field_length--){
        if(field[field_length].checked == true){
            check = field[field_length].name;
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


}
// end function showContent
//----------------------------------------------------------------------------------------------------------------------

// function blogChange
//----------------------------------------------------------------------------------------------------------------------

function blogChange(){
    document.getElementById('blogtitle').innerHTML = document.getElementById('blogtitleinput').innerHTML;
}

// end function showContent
//----------------------------------------------------------------------------------------------------------------------