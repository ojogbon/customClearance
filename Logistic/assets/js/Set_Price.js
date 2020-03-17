//Myorders

class OrderItem {
  constructor(addButton,priceAdd,send,list) {
    this.addButton = addButton;
    this.priceAdd = priceAdd;
    this.send = send;
    this.list = list;

  }

  // fetchAllFruits () {
  //   //alert('Working!');
  //   const select = document.querySelector('.gop');
  //   const url = './models/select/OrderFruits.php?Myorders=item';
  //       const xhr = new XMLHttpRequest();
  //       xhr.open('GET', url, true);
  //       xhr.onreadystatechange = function () {
  //         if (xhr.readyState == 4 && xhr.status == 200) {
  //             select.innerHTML = xhr.responseText;
  //           //  console.log(xhr.responseText);
  //         }
  //       }
  //      xhr.send();
  // }

  gatherFormData (form) {
     const name = document.querySelector('.inn');
     const price = document.querySelector('.gop');

    const array = [];

    for (var i = 0; i < 2; i++) {
         if (i == 0) {
           let vf3 =   name.name + '='+name.value;
           array.push(vf3);
         }
         else if (i == 1) {
           let vf =   price.name + '='+price.value;
           array.push(vf);
         }
    }
    console.log(array);
    return array.join('&');

  }

  SendToFruit (data) {

    const form = document.querySelector('form');

    const form_data = this.gatherFormData(form);

    let sd;
    data.image.forEach( r => {
        let f = ','+r;
        sd +=f;
    });
            console.log(sd);
    let d = JSON.stringify(data.item);
    console.log(d);
    d = d.replace(']','');
    console.log(d);
    const url = `Take_Price.php?Myorders=${JSON.stringify(data.item)}&image=${sd}`;
        const xhr = new XMLHttpRequest();
        xhr.open('POST', url, true);
        xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
        xhr.setRequestHeader('X-Requested-With','XMLHttpRequest');
        xhr.onreadystatechange = function () {
          if (xhr.readyState == 4 && xhr.status == 200) {
            //  console.log('uuiui');

             if (xhr.responseText) {
               console.log(xhr.responseText);
              // console.log(data.addUP);
               data.item.splice(0);
               data.addUP.splice(0);
               data.sign = 0;
                document.querySelector('.list').innerHTML = '';
               document.querySelector('.gop').selectedIndex = 0;
               document.querySelector('.inn').value = '';
               //console.log(data.addUP);
                        alert('Done!');
             }
          }
        }
       xhr.send(form_data);
  }

 doAddFeilds (data) {
    const parent = document.querySelector('.list');
    const select = document.querySelector('.gop');
    const total = document.querySelector('.total');
    const contain = select.options[select.selectedIndex];

    if (select.value !== '') {


    const details = [];
    details[0] = contain.value;
    console.log(contain.dataset.image);
    data.item.push(details[0]);
    data.image.push(contain.dataset.image);
    console.log(data.item+"ok");
    this.resetDiv(parent);
    let sum = 0;
    data.item.forEach((e,i) => {
      sum += parseInt(e[1]);
      this.addFeilds(e,e[1],parent,i,e[2])} );
  //  this.setValue(total,sum);
   console.log('Log..!');
 }
 }

 resetDiv (div) {
   div.innerHTML = '';
 }

 setValue (container,value) {
    container.value = value;
 }
 addFeilds (name,price,parent,count,val) {
   const makeup = `
         <p class="p1">
          <span class="pan" data-count="${count}" data-image="${count}" style"color:red; font-family: inherit;" data-category="" >
               <i class="icofont icofont-close f-20"  data-count="${count}" data-image="${count}" data-category=""></i>
           </span>${name}</p>
     `;


     parent.insertAdjacentHTML('beforeend',makeup);
 }

 dopricing (data,eve) {
   let target = eve.target;
   const total = document.querySelector('.total');
    if (target.matches('.qnt, .qnt *')) {
             let count =  target.dataset.count;
             let val =  target.value;
             let rice = document.querySelector('.price-'+count)
             let pri = rice.textContent;
             if (pri === '0' || parseInt(pri) < 0) {
               console.log('no');
             }else if (parseInt(pri) >= 1) {
           if (data.addUP.includes(count) !== true) {
                  data.addUP.push(count);
           }
            if ( pri > 0 ) {
              let tot = parseInt(val) * parseInt(pri);
                   if (tot==0 ) {
                     console.log('zero');
                   }else if ((tot * -1) > 0) {
                     console.log('negative');
                   }
                   else {
                       if (data.sign < val) {
                           let pin = parseInt(val);
                           let to = pin * parseInt(pri);
                           rice.innerHTML =  to;
                           data.item[count][1] = to;
                           data.item[count][2] = pin;
                           let sum = 0;
                           data.item.forEach(e => sum += parseInt(e[1]));
                           this.setValue(total,sum);
                           data.sign = val;
                     }else if (data.sign > val) {
                           let pin = (parseInt(val)+1);
                           let so =  parseInt(pri) / pin ;
                           rice.innerHTML =  so;
                           data.item[count][1] = so;
                           data.item[count][2] = pin-1;
                           let sum = 0;
                           data.item.forEach(e => sum += parseInt(e[1]));
                           this.setValue(total,sum);
                           data.sign = val;
                     }
                   }
            }
          }
    }
 }
 doRemove (data,eve) {
       const parent = document.querySelector('.list');
   let target = eve.target;

   data.item.splice(target.dataset.count,1);
   console.log(data.item+' ghgfgh');
   //console.log(target.dataset.count);
   parent.innerHTML = '';
   data.item.forEach((e,i) => {
     this.addFeilds(e,e[1],parent,i,e[2])} );
 //  this.setValue(total,sum);
  console.log('Log kjbhk..!');
}


 clickAdd () {
   alert("jyfjhgfjh");
   const data = {
         item : [],
         addUP : [],
         sign : 0,
         image : [],
         string: '',
   };

   document.querySelector(this.addButton).addEventListener('click',eve => {
     this.doAddFeilds (data); });

   document.querySelector(this.priceAdd).addEventListener('click',eve => {
            this.dopricing(data,eve);
   });
   document.querySelector(this.list).addEventListener('click',eve => {
            this.doRemove(data,eve);
   });

   document.querySelector(this.send).addEventListener('click',eve => {
       if (data.item.length == 0 || document.querySelector('.inn').value === '') {

       }else{
         
         this.SendToFruit (data);

      console.log('click done');
      }
   });

 }

}
const orderItem = new OrderItem ('.addIT','.film','.pros','.list') ;
orderItem.clickAdd();
//setInterval(orderItem., 1000);
