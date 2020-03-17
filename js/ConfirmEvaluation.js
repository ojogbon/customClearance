class ConfirmEvaluation {
    constructor(url) {
        this.url = url;
    }


    updates (id,base,value,empty) {
        const url = `../includes/Evaluate.php?key=1234567opiuyt&method=update&id=${id}&value=${value}`;
        const xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {

                let dbContent = xhr.responseText;
                console.log(dbContent);
                if(dbContent == "Successful"){
                 alert("Successful");
                }
            }
        }
        xhr.send();
    }

    update (id,$value,officer) {
        const url = `../includes/Evaluate.php?key=1234567opiuyt&method=updateAdmin&id=${id}&officer=${officer}`;
        const xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {

                let dbContent = xhr.responseText;
                console.log(dbContent);
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

        document.querySelector(".tableAll").addEventListener('click',eve => {

            if ( eve.target.matches('.firstEver, .firstEver *')){
                let targets =eve.target.dataset.id;
                let targetsOfficer =eve.target.dataset.officer;
                console.log(targets);
                 this.update(targets,"",targetsOfficer);

            }
            if ( eve.target.matches('.secondEver, .secondEver *')){
                let targets =eve.target.dataset.id;
                let targetsVal =eve.target.dataset.val;
                this.updates(targets,"close",targetsVal,"");
            }
            if ( eve.target.matches('.thirdEver, .thirdEver *')){
                let targets =eve.target.dataset.id;
                let targetsVal =eve.target.dataset.val;
                this.updates(targets,"close",targetsVal,"");
            }
            if ( eve.target.matches('.fourthEver, .fourthEver *')){
                let targets =eve.target.dataset.id;
                let targetsVal =eve.target.dataset.val;
                this.updates(targets,"close",targetsVal,"");
            }
            if ( eve.target.matches('.fifthEver, .fifthEver *')){
                let targets =eve.target.dataset.id;
                let targetsVal =eve.target.dataset.val;
                this.updates(targets,"close",targetsVal,"");
            }
            if ( eve.target.matches('.sixthEver, .sixthEver *')){
                let targets =eve.target.dataset.id;
                let targetsVal =eve.target.dataset.val;
                this.updates(targets,"close",targetsVal,"");
            }
            if ( eve.target.matches('.sevenEver, .sevenEver *')){
                let targets =eve.target.dataset.id;
                let targetsVal =eve.target.dataset.val;
                this.updates(targets,"close",targetsVal,"");
            }


        });


    }


}

const confirmEvaluation = new ConfirmEvaluation("includes/BillPayment.php?key=1234567opiuyt&method=insert");
confirmEvaluation.doClick();

