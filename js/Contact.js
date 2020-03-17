class Contact {
    constructor(url) {
        this.url = url;
    }

    /***
     * this method gets form and returns all content,
     * it first of all get the form, check if empty then all,
     * after all it returns every aside button (submit)
     * @param  none
     * **/
    getFormData () {
        // getting form ready
        const formElements = document.querySelector(".make-new-input").elements;

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
    SendToController () {
        // send to controller via ajax, return message as response
        const forms = document.querySelector('.make-new-input');
        const xhr = new XMLHttpRequest();
        xhr.open("post",this.url,true);
        xhr.onreadystatechange = function () {
            console.log(xhr.responseText +" NNN ");
            if (xhr.readyState == 4 && xhr.status  == 200) {
                if (xhr.responseText) {

                    for(var s = 0 ; s < forms.length; s ++){

                        if (forms[s].type != "submit"){
                            forms[s].value = "";
                        }
                        console.log("b")
                    }
                    alert('Sent successfully!');
                }
            }
        }
        xhr.send(this.getFormData());
    }


    doClick (){

        document.querySelector(".add-to-btn").addEventListener('click',eve => {
            eve.preventDefault();
            this.SendToController ();
        });

    }


}

const contact = new Contact("includes/Contact.php?key=1234567opiuyt&method=insert");
contact.doClick();

