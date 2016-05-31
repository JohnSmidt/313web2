
    //Functions To Display Popup
    var formId = 0;
    function div_show() {
      formId = 0;
      div_hide_reg();
      document.getElementById('login').style.display = "block";
      document.getElementById('sign_in').style.display = "block";
      document.getElementById('switch_log').style.display = "block";
      document.getElementById("email").focus();
      document.getElementById('titlelog').style.display = "block";
      document.getElementById('errorMsgSign').style.display = "block";
    }
    function div_show_reg() {
      formId = 1;
      div_hide();
      document.getElementById('login').style.display = "block";
      document.getElementById('register').style.display = "block";
      document.getElementById('switch_reg').style.display = "block";
      document.getElementById("username").focus();
      document.getElementById('titlereg').style.display = "block";
      document.getElementById('errorMsgReg').style.display = "block";
    }

    //Functions to Hide Popup
    function div_hide() {
      document.getElementById('titlelog').style.display = "none";
      document.getElementById('sign_in').style.display = "none";
      document.getElementById('login').style.display = "none";
      document.getElementById('switch_log').style.display = "none";
      document.getElementById('errorMsgSign').style.display = "none";
    }
    function div_hide_reg() {
      document.getElementById('titlereg').style.display = "none";
      document.getElementById('register').style.display = "none";
      document.getElementById('login').style.display = "none";
      document.getElementById('switch_reg').style.display = "none";
      document.getElementById('errorMsgReg').style.display = "none";
    }
    
    //Functions to switch between popups
    function switch_to_login() {
      div_hide_reg();
      div_show();
    }
    function switch_to_reg() {
      div_hide();
      div_show_reg();
    }

    function find_elements() {
    var errorMsg = "";
    if(formId === 0) {
      var form = [];
      var getElements = document.getElementById("sign_in").children;
      for(var i = 0; i < getElements.length; i++) {
        if(getElements[i].tagName != 'DIV') {
          if (getElements[i].value === null || getElements[i].value === "") {
            errorMsg = getElements[i].placeholder + " has not been filled out.";
            document.querySelector("#errorMsgSign").innerHTML = errorMsg;
            
          }
          else {
            form.push({
              name: getElements[i].name,
              value: getElements[i].value
            });
          }
        }
      }
      
    }
    else {
      var form = [];
      var getElements = document.getElementById("register").children; 
      for(var i = 0; i < getElements.length; i++) {
        if(getElements[i].tagName != 'DIV') {
          if(getElements[i].tagName != 'DIV') {
            if (getElements[i].value === null || getElements[i].value === "") {
              errorMsg = getElements[i].placeholder + " has not been filled out.";
              document.querySelector("#errorMsgReg").innerHTML = errorMsg;
              
            }
            else {
              form.push({
                name: getElements[i].name,
                value: getElements[i].value
              });
            }
          }
        }
      }
      
    }
  }  