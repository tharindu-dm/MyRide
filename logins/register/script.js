const form = document.querySelector('#res-form');

const firstName = document.querySelector("#first-name");
const lastName = document.querySelector('#last-name');
const email = document.querySelector('#email');
const phoneNumber = document.querySelector('#phone');
const nicNumber = document.querySelector('#nic');

const adrStreet = document.querySelector("street");
const adrCity = document.querySelector('#city');
const adrState = document.querySelector('#stare');
const zipCode = document.querySelector('#zip-code');



const licNumber = document.querySelector('#lic-num');
const licExpDate = document.querySelector('#lic-exp');



function validateForm(){
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.value) == false){
      alert("You have entered an invalid email address!")
      return false;
    }
    let nicArr = Array.from(nicNumber.value.toLowerCase());
    console.log(nicArr);
    if(nicNumber.value.length < 12 || nicArr[nicArr.length-1] !== 'v'){
        alert("please check your NIC number");
        return false;
    }
    if(licNumber.value.length < 8){
        alert("please enter a valid license number");
        return false;
    }
  }