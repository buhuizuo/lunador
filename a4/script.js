//when remember me is checked,once user enter something, will be stored in browser
function localS_name() {
  if (!document.querySelector("#forget").checked) {
    let name = document.querySelector("#name").value;
    localStorage.setItem("user-name", name);
  }
}

function localS_email() {
  if (!document.querySelector("#forget").checked) {
    let email = document.querySelector("#email").value;
    localStorage.setItem("user-email", email);
  }
}

function localS_phone() {
  if (!document.querySelector("#forget").checked) {
    let phone = document.querySelector("#phone").value;
    localStorage.setItem("user-mobile", phone);
  }
}
//this function put value in localStorage back
inputValue();
function inputValue() {
  let name = localStorage.getItem("user-name");
  let email = localStorage.getItem("user-email");
  let phone = localStorage.getItem("user-mobile");
  if (name) {
    document.querySelector(".user_name input").value = name;
  }
  if (email) {
    document.querySelector(".user_email input").value = email;
  }
  if (phone) {
    document.querySelector(".user_phone input").value = phone;
  }
  //  let name = document.querySelector(".user_name input").value;
  //  let email = document.querySelector(".user_email input").value;
  // let phone = document.querySelector(".user_phone input").value;
}
//clear localStorage if user click forget me
function forgetMe() {
  document.getElementById("forget").addEventListener("click", function () {
    document.querySelector(".user_name input").value = "enter your name";
    document.querySelector(".user_email input").value = "enter your email";
    document.querySelector(".user_phone input").value = "enter your number";
    localStorage.clear();
  });
}
//this controls +  -
function selectSeattle() {
  let adds = document.querySelectorAll(".number .add");
  let reduces = document.querySelectorAll(".number .reduce");
  let inputs = document.querySelectorAll(".number input");
  //- 0 + button, add event to all '+' and '-' buttons,if click input value changs
  for (let i = 0; i < adds.length; i++) {
    adds[i].addEventListener("click", function () {
      if (inputs[i].value >= 10) {
        alert("you can only select 10 tickets at a time ");
      } else {
        inputs[i].value++;
      }
      result();
    });
    reduces[i].addEventListener("click", function () {
      if (inputs[i].value <= 0) {
        inputs[i].value = 0;
        //this.disabled = true
      } else {
        inputs[i].value--;
      }
      result();
    });
  }
}
selectSeattle();
function selectTime() {
  let selectedTimes = document.querySelectorAll(".user_select");
  let prices = document.querySelectorAll(".user_seat li span");
  let type = Object.keys(priceTableJS);
  let movieDate = document.querySelector(".forHiddenInput input[type=hidden]");
  movieDate.value = selectedTimes[0].id;
  for (let i = 0; i < selectedTimes.length; i++) {
    selectedTimes[i].addEventListener("click", function () {
      movieDate.value = selectedTimes[i].id;
      if (
        selectedTimes[i].id == "Saturday" ||
        selectedTimes[i].id == "Sunday"
      ) {
        for (let i = 0; i < prices.length; i++) {
          prices[i].innerHTML = priceTableJS[type[i]]["normal"];
        }
      } else if (selectedTimes[i].id == "Monday") {
        for (let i = 0; i < prices.length; i++) {
          prices[i].innerHTML = priceTableJS[type[i]]["discount"];
        }
      } else {
        let weekdayTime = document.querySelectorAll(".movieTime");
        console.log(weekdayTime.innerHTML);
        let timeOfDay = weekdayTime[i].innerHTML.split(":");
        let hour = timeOfDay[0];
        if (hour >= 12) {
          for (let i = 0; i < prices.length; i++) {
            prices[i].innerHTML = priceTableJS[type[i]]["discount"];
          }
        } else {
          for (let i = 0; i < prices.length; i++) {
            prices[i].innerHTML = priceTableJS[type[i]]["normal"];
          }
        }
      }
      result();
    });
  }
}
selectTime();
//count total
function result() {
  let totalprice = document.querySelector(".totalPrice");
  let prices = document.querySelectorAll(".user_seat li span");
  let inputs = document.querySelectorAll(".number input");
  let postValue = document.querySelector(".total input");
  let sum = 0.0;
  let singlePrice = document.querySelectorAll(".number .singleSeatPrice");
  for (let i = 0; i < prices.length; i++) {
    let price = prices[i].innerHTML;
    let value = inputs[i].value;
    sum = sum + price * value;
    // this part for each seat type price
    if (value != 0) {
      let seatPrice = price * value;
      singlePrice[i].innerHTML = "$ " + seatPrice.toFixed(2);
    } else {
      singlePrice[i].innerHTML = "";
    }
  }
  // this part for total price
  if (sum == 0) {
    totalprice.innerHTML = " ";
  } else {
    totalprice.innerHTML = sum.toFixed(2);
    postValue.value = sum.toFixed(2);
  }
}
result();

//if user click the bar, original txt inside will gone, if user do not enter
//anything, click somewhere,original txt will be back. if user enter something,
//no changs happen.
function userInputClick() {
  let user_name = document.querySelector(".user_name input");
  let user_email = document.querySelector(".user_email input");
  let user_phone = document.querySelector(".user_phone input");
  user_name.addEventListener("click", function () {
    if (this.value == "enter your name") {
      this.value = "";
    }
  });
  user_name.addEventListener("blur", function () {
    if (this.value === "") {
      this.value = "enter your name";
    }
  });
  user_email.addEventListener("click", function () {
    if (this.value == "enter your email") {
      this.value = "";
    }
  });
  user_email.addEventListener("blur", function () {
    if (this.value === "") {
      this.value = "enter your email";
    }
  });
  user_phone.addEventListener("click", function () {
    if (this.value == "enter your number") {
      this.value = "";
    }
  });
  user_phone.addEventListener("blur", function () {
    if (this.value === "") {
      this.value = "enter your number";
    }
  });
}
userInputClick();

//validateData()
function validateData() {
  //get all name,email.phone element first
  let name = document.forms["userform"]["user-name"].value;
  let email = document.forms["userform"]["user-email"].value;
  let phone = document.forms["userform"]["user-mobile"].value;
  let name_error = document.querySelector(".user_name_error");
  let email_error = document.querySelector(".user_email_error");
  let phone_error = document.querySelector(".user_phone_error");
  let seat_error = document.querySelector(".user_seat_error");
  //check if user input is empty
  if (name == "enter your name") {
    name_error.innerHTML = "Please enter a name";
    // alert("Please enter a name");
    return false;
  }
  if (email == "enter your email") {
    email_error.innerHTML = "Please enter a email";
    return false;
  }
  if (phone == "enter your number") {
    phone_error.innerHTML = "Please enter phone number";
    return false;
  }
  //not empty then check validation

  //only allow english characters and -_., begin and end with characters
  let patternN = /^[a-zA-Z]+(([' -][a-zA-Z ])?[a-zA-Z]*)*$/g;
  let patternE = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$/;
  let patternP = /^(04)[0-9]{8}/;
  if (!patternN.test(name)) {
    name_error.innerHTML = "only character,space and '-' allow";
    return false;
  } else {
    name_error.innerHTML = "";
  }
  //email contains characters,numbers,follow by @,then c,n,then . then c,n again
  if (!patternE.test(email)) {
    email_error.innerHTML = "Please enter a valid email";
    return false;
  } else {
    email_error.innerHTML = "";
  }
  //email contains characters,numbers,follow by @,then c,n,then . then c,n again
  if (!patternP.test(phone)) {
    phone_error.innerHTML = "Please enter 10 digits number start with 04";
    return false;
  } else {
    phone_error.innerHTML = "";
  }
  //check if user choose any tickets
  let tickets = document.querySelectorAll("#seats");
  let isFlag = false;
  for (let i = 0; i < tickets.length; i++) {
    if (tickets[i].value != 0) {
      isFlag = true;
    }
  }
  if (!isFlag) {
    seat_error.innerHTML = "choose a ticket.";
    return false;
  }
}
