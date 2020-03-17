class ConfirmAdvice {
    constructor(url) {
        this.url = url;
    }


    update (id,value) {
        const url = `../includes/AdvicePayment.php?key=1234567opiuyt&method=update&id=${id}&value=${value}`;
        const xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {

                let dbContent = xhr.responseText;

                if(dbContent == "Successful"){
                 alert("Successful");

                }
            }
        }
        xhr.send();
    }
    insert (id) {

        const url = `../includes/Evaluate.php?key=1234567opiuyt&method=updateInsert&customerid=${id}`;
        const xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {

                let dbContent = xhr.responseText;
                console.log(dbContent);
                if(dbContent == "Successful"){
                    window.location.reload();
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
            if ( eve.target.matches('.startEvaluate, .startEvaluate *')){
                let targets =eve.target.dataset.id;
                let targetsid =eve.target.dataset.customerid;
                console.log(targets);
                this.update(targets,"startEvaluate");
                this.insert(targetsid);
            }


        });


    }


}

const confirmAdvice = new ConfirmAdvice("includes/BillPayment.php?key=1234567opiuyt&method=insert");
confirmAdvice.doClick();

