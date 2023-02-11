// popup
function togglePopup(idname) {
    document.getElementById(idname).classList.toggle("active");
}

function login(){
    window.location.href = "../sign-up/login.php";
}

//Diet Recommendation - categories -veg , non-veg dropdown
function myFunction1() {
    document.getElementById("myDropdown1").classList.toggle("show1");
}
function myFunction2() {
    document.getElementById("myDropdown2").classList.toggle("show2");
}
function myFunction3() {
    document.getElementById("myDropdown3").classList.toggle("show3");
}

window.onclick = function (event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show1')) {
                openDropdown.classList.remove('show1');
            }
            else if (openDropdown.classList.contains('show2')) {
                openDropdown.classList.remove('show2');
            }
            else if (openDropdown.classList.contains('show3')) {
                openDropdown.classList.remove('show3');
            }
        }
    }
}

//BMI Calculator
var heightInputBMI = document.querySelector(".height-BMI");
var weightInputBMI = document.querySelector(".weight-BMI");
var BMI_calculateButton = document.querySelector(".BMI-calculate");
var BMI_result = document.querySelector(".BMI-result");
var BMI_statement = document.querySelector(".BMI-result-statement");
var BMI, BMI_height, BMI_weight;

BMI_calculateButton.addEventListener("click", () => {

    BMI_height = heightInputBMI.value;
    BMI_weight = weightInputBMI.value;
    BMI = BMI_weight / (BMI_height ** 2);
    BMI_result.innerText = BMI + "kg/m2";

    if (BMI < 18.5) {
        BMI_statement.innerText = "Your BMI falls within the underweight range";
    } else if ((BMI > 18.5) && (BMI < 24.9)) {
        BMI_statement.innerText = "Your BMI falls within the normal or healthy weight range";
    } else if ((BMI > 25) && (BMI < 29.9)) {
        BMI_statement.innerText = "Your BMI falls within the overweight range";
    } else if ((BMI > 29.9)) {
        BMI_statement.innerText = "Your BMI falls within the obese range";
    }
});

//Ideal Weight Calculator
var heightInputIdealWeight = document.querySelector(".height-IdealWeight");
var genderInputIdealWeight = document.querySelector(".gender-IdealWeight");
var IdealWeight_calculateButton = document.querySelector(".IdealWeight-calculate");
var IdealWeight_result = document.querySelector(".IdealWeight-result");
var IdealWeight, IdealWeight_height, IdealWeight_gender;

IdealWeight_calculateButton.addEventListener("click", () => {

    IdealWeight_height = heightInputIdealWeight.value;
    IdealWeight_gender = genderInputIdealWeight.value;

    if (IdealWeight_gender === 'female') {
        IdealWeight = 45.5 + (0.91 * [IdealWeight_height - 152.4]);
    }
    else if (IdealWeight_gender === 'male') {
        IdealWeight = 50 + (0.91 * [IdealWeight_height - 152.4]);
    }
    IdealWeight_result.innerText = IdealWeight + "kg";
});

//Calorie Calculator
var heightInputCalorie = document.querySelector(".height-Calorie");
var weightInputCalorie = document.querySelector(".weight-Calorie");
var ageInputCalorie = document.querySelector(".age-Calorie");
var genderInputCalorie = document.querySelector(".gender-Calorie");
var activityInputCalorie = document.querySelector(".activity-Calorie");
var Calorie_calculateButton = document.querySelector(".Calorie-calculate");
var Calorie_result = document.querySelector(".Calorie-result");
var Calorie, BMR_for_Calorie, Calorie_height, Calorie_gender, Calorie_weight, Calorie_age, Calorie_activity;

Calorie_calculateButton.addEventListener("click", () => {

    Calorie_height = heightInputCalorie.value;
    Calorie_weight = weightInputCalorie.value;
    Calorie_age = ageInputCalorie.value;
    Calorie_gender = genderInputCalorie.value;
    Calorie_activity = activityInputCalorie.value;

    if (Calorie_gender === 'female') {
        BMR_for_Calorie = 655.1 + (9.563 * Calorie_weight) + (1.850 * Calorie_height) - (4.676 * Calorie_age);
    }
    else if (Calorie_gender === 'male') {
        BMR_for_Calorie = 66.47 + (13.75 * Calorie_weight) + (5.003 * Calorie_height) - (6.755 * Calorie_age);
    }

    if (Calorie_activity === '1') {
        Calorie = BMR_for_Calorie * 1.2;
    }
    else if (Calorie_activity === '2') {
        Calorie = BMR_for_Calorie * 1.375;
    }
    else if (Calorie_activity === '3') {
        Calorie = BMR_for_Calorie * 1.55;
    }
    else if (Calorie_activity === '4') {
        Calorie = BMR_for_Calorie * 1.725;
    }
    else if (Calorie_activity === '5') {
        Calorie = BMR_for_Calorie * 1.9;
    }
    Calorie_result.innerText = Calorie + " calories you need to consume each day to stay at your current weight. If you want to lose weight, you need to increase your level of physical activity or decrease your caloric intake by eating less.";
});

//BMR Calculator
var heightInputBMR = document.querySelector(".height-BMR");
var weightInputBMR = document.querySelector(".weight-BMR");
var ageInputBMR = document.querySelector(".age-BMR");
var genderInputBMR = document.querySelector(".gender-BMR");
var BMR_calculateButton = document.querySelector(".BMR-calculate");
var BMR_result = document.querySelector(".BMR-result");
var BMR, BMR_height, BMR_weight, BMR_age, BMR_gender;

BMR_calculateButton.addEventListener("click", () => {

    BMR_height = heightInputBMR.value;
    BMR_weight = weightInputBMR.value;
    BMR_age = ageInputBMR.value;
    BMR_gender = genderInputBMR.value;

    if (BMR_gender === 'female') {
        BMR = 447.593 + (9.247 * BMR_weight) + (3.098 * BMR_height) - (4.330 * BMR_age);
    }
    else if (BMR_gender === 'male') {
        BMR = 88.362 + (13.397 * BMR_weight) + (4.799 * BMR_height) - (5.677 * BMR_age);
    }
    BMR_result.innerText = BMR + " calorie per day";

});

//Body Fat Calculator
var heightInputBodyFat = document.querySelector(".height-BodyFat");
var weightInputBodyFat = document.querySelector(".weight-BodyFat");
var ageInputBodyFat = document.querySelector(".age-BodyFat");
var genderInputBodyFat = document.querySelector(".gender-BodyFat");
var BodyFat_calculateButton = document.querySelector(".BodyFat-calculate");
var BodyFat_result = document.querySelector(".BodyFat-result");
var BodyFat_statement = document.querySelector(".BodyFat-result-statement");
var BMI_for_BodyFat, BodyFat, BodyFat_height, BodyFat_weight, BodyFat_age, BodyFat_gender;

BodyFat_calculateButton.addEventListener("click", () => {

    BodyFat_height = heightInputBodyFat.value;
    BodyFat_weight = weightInputBodyFat.value;
    BodyFat_age = ageInputBodyFat.value;
    BodyFat_gender = genderInputBodyFat.value;
    BMI_for_BodyFat = BodyFat_weight / (BodyFat_height ** 2);
    BodyFat = (1.20 * BMI_for_BodyFat) + (0.23 * BodyFat_age) - 5.4;
    BodyFat_result.innerText = BodyFat + "%";

    if (BodyFat_gender === 'female' && BodyFat < 14) {
        BodyFat_statement.innerText = "Your Body Fat falls within the Unhealthy range";
    }
    else if (BodyFat_gender === 'female' && (BodyFat > 14) && (BodyFat < 20.9)) {
        BodyFat_statement.innerText = "Your Body Fat falls within the Athletic body range";
    }
    else if (BodyFat_gender === 'female' && (BodyFat > 21) && (BodyFat < 24.9)) {
        BodyFat_statement.innerText = "Your BodyFat falls within the Fit range";
    }
    else if (BodyFat_gender === 'female' && (BodyFat > 25) && (BodyFat < 31.9)) {
        BodyFat_statement.innerText = "Your BodyFat falls within the Average range";
    }
    else if (BodyFat_gender === 'female' && (BodyFat > 32)) {
        BodyFat_statement.innerText = "Your Body Fat falls within the Obese range";
    }
    else if (BodyFat_gender === 'male' && BodyFat < 6) {
        BodyFat_statement.innerText = "Your Body Fat falls within the Unhealthy range";
    }
    else if (BodyFat_gender === 'male' && (BodyFat > 6) && (BodyFat < 13.9)) {
        BodyFat_statement.innerText = "Your Body Fat falls within the Athletic body range";
    }
    else if (BodyFat_gender === 'male' && (BodyFat > 14) && (BodyFat < 17.9)) {
        BodyFat_statement.innerText = "Your BodyFat falls within the Fit range";
    }
    else if (BodyFat_gender === 'male' && (BodyFat > 18) && (BodyFat < 24.9)) {
        BodyFat_statement.innerText = "Your BodyFat falls within the Average range";
    }
    else if (BodyFat_gender === 'male' && (BodyFat > 24)) {
        BodyFat_statement.innerText = "Your Body Fat falls within the Obese range";
    }
});

//Pace Calculator
var distanceInputPace = document.querySelector(".distance-Pace");
var hourInputPace = document.querySelector(".hour-Pace");
var minInputPace = document.querySelector(".min-Pace");
var secInputPace = document.querySelector(".sec-Pace");
var Pace_calculateButton = document.querySelector(".Pace-calculate");
var Pace_result = document.querySelector(".Pace-result");
var Pace, Time_for_Pace, Pace_distance, Pace_hour, Pace_min, Pace_sec, paceMinutes, paceSeconds;

Pace_calculateButton.addEventListener("click", () => {
    Pace_distance = parseFloat(distanceInputPace.value);
    Pace_hour = parseFloat(hourInputPace.value);
    Pace_min = parseFloat(minInputPace.value);
    Pace_sec = parseFloat(secInputPace.value);
    Time_for_Pace = Pace_hour * 60 + Pace_min + Pace_sec / 60;
    Pace = Time_for_Pace / Pace_distance;
    paceMinutes = Math.floor(Pace),
        paceSeconds = Math.round((Pace - paceMinutes) * 60);

    if (paceSeconds < 10) {
        paceSeconds = "0" + paceSeconds;
    }

    Pace_result.innerText = "You need to run " + paceMinutes + ":" + paceSeconds + " minutes per mile.";

});