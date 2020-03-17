class User {
    constructor(url) {
        this.url = url;
    }

    /***
     * this method gets form and returns all content,
     * it first of all get the form, check if empty then all,
     * after all it returns every aside button (submit)
     * @param  none
     * **/
    getFormData (formClass) {
        // getting form ready
        const formElements = document.querySelector(formClass).elements;

        // checking for emptiness
        if (formElements == null){
            alert("Form Not Available Please set form name!");
        }else {
            const  fort = new FormData();
            for (var i = 0; i < formElements.length; i++) {
                if (formElements[i].type != "submit" ) {

                    if (formElements[i].type == "file"){
                        for (const  file of formElements[i].files){
                            fort.append("myFiles[]",file);
                        }
                    }else {
                        fort.append(formElements[i].name, formElements[i].value);
                    }

                }
            }

            // return array.join('&');
            return fort;
        }
    }

    /***
     * * this method is for sending data into controller
     *   this gets form content firstly then it send
     *   via ajax to the controller for proccess
     *   this method uses the URL path that comes from the class constructor at initiation point
     *   @param null
     * ***/
    SendToController (formClass,type) {
        // send to controller via ajax, return message as response
        const forms = document.querySelector(formClass);
        const xhr = new XMLHttpRequest();
        let url = `${this.url}&type=${type}`;
        xhr.open("post",url,true);
        xhr.onreadystatechange = function () {
            console.log(xhr.responseText +" NNN ");
            if (xhr.readyState == 4 && xhr.status  == 200) {
                if (xhr.responseText =="Successful" ) {

                    for(var s = 0 ; s < forms.length; s ++){

                        if (forms[s].type != "submit"){
                            forms[s].value = "";
                        }
                        console.log("b")
                    }
                    alert('Successful!');
                }else {
                    alert("something happened!")
                }
            }
        }
        xhr.send(this.getFormData(formClass));
    }

    fetchSchool () {
        const username = document.querySelector('.login-for-form').elements[0].value;
        const password = document.querySelector('.login-for-form').elements[1].value;
        const url = `includes/User.php?key=1234567opiuyt&method=selectall&password=${password}&username=${username}`;
        const xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {

                let dbContent = xhr.responseText;
                console.log(dbContent+"  ggggggggggggo")
                if(dbContent == 1){
                    window.location.replace("./Me");
                }
            }
        }
        xhr.send();
    }

    doClick (){

        const customer = document.querySelector(".make-new-input");
        const logistic = document.querySelector(".make-new-input-1");

        document.querySelector(".add-to-btn").addEventListener('click',eve => {
            eve.preventDefault();
            this.SendToController (".make-new-input","customer");
        });
        document.querySelector(".add-to-btn-1").addEventListener('click',eve => {
            eve.preventDefault();
            this.SendToController (".make-new-input-1","logistic");
        });


        document.querySelector(".login-dope-card").addEventListener('click',eve => {
            eve.preventDefault();
            console.log("Hello!");
             this.fetchSchool();

        });
        document.querySelector(".switch-1").addEventListener('click',eve =>{
            eve.preventDefault();
            console.log("Sage!");
            customer.style.display = "block";
            logistic.style.display = "none";
        });

        document.querySelector(".switch").addEventListener('click',eve =>{
            eve.preventDefault();
            console.log("Sage!");
            logistic.style.display = "block";
            customer.style.display = "none";

        });

    }


}

const user = new User("includes/User.php?key=1234567opiuyt&method=insert");
user.doClick();

