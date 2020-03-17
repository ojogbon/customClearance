class Doctor {
    constructor(url) {
        this.url = url;
    }

    UpdateAppointment (id,type) {
        const url_path = `${this.url}&id=${id}&type=${type}`;
        const xhr = new XMLHttpRequest();
        xhr.open('GET', url_path, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {

                let dbContent = xhr.responseText;
                console.log(dbContent+"bb");
                if(dbContent == "Successful"){
                    window.alert("Done!");
                    window.location.reload();
                }
            }
        }
        xhr.send();
    }

    doClick (){

        document.querySelector("table").addEventListener('click',eve => {
            eve.preventDefault();
            if ( eve.target.matches('.approve, .approve *')) {
                let appointId = eve.target.dataset.id;
                console.log(appointId);
                this.UpdateAppointment(appointId,"approve");
            }
            if ( eve.target.matches('.disapprove, .disapprove *')) {
                let appointId = eve.target.dataset.id;
                console.log(appointId)
                this.UpdateAppointment(appointId,"disapprove");
            }
        });

    }


}

const doctor = new Doctor("../includes/Booking.php?key=1234567opiuyt&method=update");
doctor.doClick();

