var i = 0;
function forminputs(id) {
    var msgId = document.getElementById(id).value;
    if(msgId == "") {
        var err = id+"Error";
        i = i+1;
        document.getElementById(err).innerHTML = "<div class='form-error-message'><i class='fa fa-exclamation-circle'></i> This field is required.<div class='form-error-arrow'><div class='form-error-arrow-inner'></div></div></div>";
        document.getElementById("submit").setAttribute("disabled",true);
        document.getElementById(id).style.border = "2px solid red";
    } else { 
        if(id == "productname") {
            var regex = new RegExp(/^[a-zA-Z]+[-\s]?[a-zA-Z]+[-\s]?[0-9]*(([a-zA-Z0-9]*[-\s]?[a-zA-Z]+[-\s]?[0-9]*)+)*$/);
            if(!regex.test(msgId)) {
                var err = id+"Error";
                i = i+1;
                document.getElementById(err).innerHTML = "<div class='form-error-message'><i class='fa fa-exclamation-circle'></i> Please enter a valid format ( Valid Name: Alpha numeric/ alphabetic, Not only numeric, Only \'-\' special char allowed<div class='form-error-arrow'><div class='form-error-arrow-inner'></div></div></div>";
                document.getElementById("submit").setAttribute("disabled",true);
                document.getElementById(id).style.border = "2px solid red";
            } else {
                var err = id+"Error";
                if($i>0) {
                    i = i-1;
                }
                document.getElementById(err).innerHTML = "";
                document.getElementById("submit").setAttribute("disabled",false);
                document.getElementById(id).style.border = "";
            }
        } else if(id == "monthlyprice" || id == "annualprice") {
            var regex = new RegExp(/^([0-9]+(\.[0-9]+)?)$/);
            if(!regex.test(msgId) || (msgId.length > 15)) {
                var err = id+"Error";
                i = i+1;
                document.getElementById(err).innerHTML = "<div class='form-error-message'><i class='fa fa-exclamation-circle'></i> Please enter a valid format (Max-length(15), Only numeric, Allowed single '\.\')<div class='form-error-arrow'><div class='form-error-arrow-inner'></div></div></div>";
                document.getElementById("submit").setAttribute("disabled",true);
                document.getElementById(id).style.border = "2px solid red";
            } else {
                var err = id+"Error";
                if(i>0) {
                    i = i-1;
                }
                document.getElementById(err).innerHTML = "";
                document.getElementById(id).style.border = "";
            }
        } else if(id == "sku") {
            var regex = new RegExp(/^[a-zA-Z0-9#](?:[a-zA-Z0-9_-]*[a-zA-Z0-9])?$/);
            if(!regex.test(msgId)) {
                var err = id+"Error";
                i = i+1;
                document.getElementById(err).innerHTML = "<div class='form-error-message'><i class='fa fa-exclamation-circle'></i> Please enter a valid format. (Not only special char-All combinations (only '\#\', '\-\' special char allowed)<div class='form-error-arrow'><div class='form-error-arrow-inner'></div></div></div>";
                document.getElementById("submit").setAttribute("disabled",true);
                document.getElementById(id).style.border = "2px solid red";
            } else { 
                var err = id+"Error";
                if(i>0) {
                    i = i-1;
                }
                document.getElementById(err).innerHTML = "";
                document.getElementById("submit").setAttribute("disabled",false);
                document.getElementById(id).style.border = "";
            }
        } else if(id == "webspaces" || id == "bandwidth") {
            var regex = new RegExp(/^[0-9]+(\.[0-9]+)?$/);
            if(!regex.test(msgId) || (msgId.length > 5)) {
                var err = id+"Error";
                i = i+1;
                document.getElementById(err).innerHTML = "<div class='form-error-message'><i class='fa fa-exclamation-circle'></i> Please enter a valid format. (max-length(5), Only numeric, Allowed single '\.\')<div class='form-error-arrow'><div class='form-error-arrow-inner'></div></div></div>";
                document.getElementById("submit").setAttribute("disabled",true);
                document.getElementById(id).style.border = "2px solid red";
            } else {
                var err = id+"Error";
                if(i>0) {
                    i = i-1;
                }
                document.getElementById(err).innerHTML = "";
                document.getElementById("submit").setAttribute("disabled",false);
                document.getElementById(id).style.border = "";
            }
        } else if(id == "language") {
            var regex = new RegExp(/^[a-zA-Z0-9]*[a-zA-Z]+[0-9]*(,?([a-zA-Z0-9]*[a-zA-Z]+[0-9]*)+)*$/);
            if(!regex.test(msgId)) {
                var err = id+"Error";
                i = i+1;
                document.getElementById(err).innerHTML = "<div class='form-error-message'><i class='fa fa-exclamation-circle'></i> Please enter a valid format. (Only '\,\' allowed as special char, Only alphabetic/ alpha-numeric)<div class='form-error-arrow'><div class='form-error-arrow-inner'></div></div></div>";
                document.getElementById("submit").setAttribute("disabled",true);
                document.getElementById(id).style.border = "2px solid red";
            } else {
                var err = id+"Error";
                if(i>0) {
                    i = i-1;
                }
                document.getElementById(err).innerHTML = "";
                document.getElementById("submit").setAttribute("disabled",false);
                document.getElementById(id).style.border = "";
            }
        } else if(id == "mailbox" || id == "domain") {
            var regex = new RegExp(/^(0?[1-9]{1,}[0-9]*)|[a-zA-Z]*$/);
            if(!regex.test(msgId)) {
                var err = id+"Error";
                i = i+1;
                document.getElementById(err).innerHTML = "<div class='form-error-message'><i class='fa fa-exclamation-circle'></i> Please enter a valid format (Only numeric/ only alphabetic(i.e. no combinations), No white spaces, No '\.\' allowed)<div class='form-error-arrow'><div class='form-error-arrow-inner'></div></div></div>";
                document.getElementById("submit").setAttribute("disabled",true);
                document.getElementById(id).style.border = "2px solid red";
            } else {
                var err = id+"Error";
                if(i>0) {
                    i = i-1;
                }
                document.getElementById(err).innerHTML = "";
                document.getElementById("submit").setAttribute("disabled",false);
                document.getElementById(id).style.border = "";
            }
        } else {
            var err = id+"Error";
            document.getElementById(err).innerHTML = "";
            document.getElementById(id).style.border = "";
            i = i-1;
            if(i<=0) {
                document.getElementById("submit").removeAttribute("disabled",false);
            }
        }
    }
}

/**
 * 
 * Features:-
Web Space(in GB)(max-length:5)/ Bandwidth (in GB)(max-length:5):-
Valid Format: max-length(5), Only numeric, Allowed single '\.\'

Free Domain/ Mailbox:-
Only numeric/ only alphabetic(i.e. no combinations), No white spaces, No '\.\' allowed

Language / Technology Support:-
Only '\,\' allowed as special char, Only alphabetic/ alpha-numeric

##Add Sub-Category:

Sub Category Name:-
-Alphabetic/ Alpha+numeric/ Alpha+numeric with special character(only ".")
-No duplicate entry("Category "and "category" will be considered as same)

Edit Sub-Category:-
-Display message if no data is updated when submit button is clicked.
 */