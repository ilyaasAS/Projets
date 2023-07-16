
let msg = document.getElementsByClassName('message')[0];

console.log(msg);

if( msg ){
     setTimeout(function(){
     msg.classList.toggle('d-none');
}, 5000);
}

// ou bien

// setTimeout(message, 5000);

// function message(){
//      msg.classList.toggle('d-none');
// }