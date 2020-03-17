class Mark {
    constructor(url) {
        this.url = url;
    }

    UpdateTransactions (id) {
        const url_path = `${this.url}id=${id}`;
        console.log(url_path);
        const xhr = new XMLHttpRequest();
        xhr.open('GET', url_path, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {

                let dbContent = xhr.responseText;
                console.log(dbContent)
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
            if ( eve.target.matches('.markIT, .markIT *')) {
                eve.preventDefault();
                let thriftID = eve.target.dataset.markid;
                // console.log(thriftID);
                this.UpdateTransactions(thriftID);
            }
        });

    }


}

const mark = new Mark("../includes/Progress.php?key=1234567opiuyt&method=selectall&");
mark.doClick();

