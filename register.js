"use strict"

let mainDom = document.querySelector("main");

let request = "PHP/register.php";

mainDom.innerHTML = `
<lable for "name"> Username </lable>
<input type="username" name="username"> 

<lable for "password"> Password </lable>
<input type="password" name="password"> 

<lable for "age"> Age</lable>
<input name="age">

<lable for "image"> Image </lable>
<input type="file" name="image">

<lable for "gender"> Gender </lable>
<select list="browsers" name="gender"> 
<option value="female"> Female </option>
<option value="male"> Male </option>
<option value="None">Dont want to say</option>
</select>


<button>Skicka in</button>`;
let username_dom = mainDom.querySelector("input[name='username']");
let password_dom = mainDom.querySelector("input[name='password']");
let age_dom = mainDom.querySelector("input[name='age']");
let image_dom = mainDom.querySelector("input[name='image']");
let gender_dom = mainDom.querySelector("select[name='gender']");

mainDom.querySelector("button").addEventListener("click", addUser);

async function addUser(){

    console.log(age_dom.value);

    let requestPOST = await fetch( new Request(request, {
    method: "POST",
    headers: {"Content-type":"application/json; charset=UTF-8"},
    body: JSON.stringify({
         action: "register", 
         username: username_dom.value,
         password: password_dom.value,
         age: age_dom.value,
         gender: gender_dom.value,
         image: image_dom.value,
       
         })
}));  

if(requestPOST.status === 200){
    console.log("added a user");
} else {
    console.log(requestPOST);
}

}

