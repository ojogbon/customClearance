class ConfirmBill {
    constructor(url) {
        this.url = url;
    }


    update (id,value) {
        const url = `../includes/BillPayment.php?key=1234567opiuyt&method=update&id=${id}&value=${value}`;
        const xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {

                let dbContent = xhr.responseText;

                if(dbContent == "Successful"){
                 alert("Successful")
                }
            }
        }
        xhr.send();
    }

    doClick (){

        document.querySelector("table").addEventListener('click',eve => {

            if ( eve.target.matches('.addConfirmed, .addConfirmed *')){
                let targets =eve.target.dataset.id;
                console.log(targets);
                 this.update(targets,'confirmed');
            }
            if ( eve.target.matches('.addClose, .addClose *')){
                let targets =eve.target.dataset.id;
                console.log(targets);
                this.update(targets,"close");
            }

        });


    }


}

const confirmBill = new ConfirmBill("includes/BillPayment.php?key=1234567opiuyt&method=insert");
confirmBill.doClick();

