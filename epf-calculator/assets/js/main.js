/*==================== SHOW MENU ====================*/
const showMenu = (toggleId, navId) =>{
    const toggle = document.getElementById(toggleId),
    nav = document.getElementById(navId)
    
    // Validate that variables exist
    if(toggle && nav){
        toggle.addEventListener('click', ()=>{
            // We add the show-menu class to the div tag with the nav__menu class
            nav.classList.toggle('show-menu')
        })
    }
}
showMenu('nav-toggle','nav-menu')

/*==================== REMOVE MENU MOBILE ====================*/
const navLink = document.querySelectorAll('.nav__link')

function linkAction(){
    const navMenu = document.getElementById('nav-menu')
    // When we click on each nav__link, we remove the show-menu class
    navMenu.classList.remove('show-menu')
}
navLink.forEach(n => n.addEventListener('click', linkAction))

/*==================== SCROLL SECTIONS ACTIVE LINK ====================*/
const sections = document.querySelectorAll('section[id]')

function scrollActive(){
    const scrollY = window.pageYOffset

    sections.forEach(current =>{
        const sectionHeight = current.offsetHeight
        const sectionTop = current.offsetTop - 50;
        sectionId = current.getAttribute('id')

        if(scrollY > sectionTop && scrollY <= sectionTop + sectionHeight){
            document.querySelector('.nav__menu a[href*=' + sectionId + ']').classList.add('active-link')
        }else{
            document.querySelector('.nav__menu a[href*=' + sectionId + ']').classList.remove('active-link')
        }
    })
}
window.addEventListener('scroll', scrollActive)

/*==================== CHANGE BACKGROUND HEADER ====================*/ 
function scrollHeader(){
    const nav = document.getElementById('header')
    // When the scroll is greater than 200 viewport height, add the scroll-header class to the header tag
    if(this.scrollY >= 200) nav.classList.add('scroll-header'); else nav.classList.remove('scroll-header')
}
window.addEventListener('scroll', scrollHeader)

/*==================== SHOW SCROLL TOP ====================*/ 
function scrollTop(){
    const scrollTop = document.getElementById('scroll-top');
    // When the scroll is higher than 560 viewport height, add the show-scroll class to the a tag with the scroll-top class
    if(this.scrollY >= 560) scrollTop.classList.add('show-scroll'); else scrollTop.classList.remove('show-scroll')
}
window.addEventListener('scroll', scrollTop)

/*==================== DARK LIGHT THEME ====================*/ 
const themeButton = document.getElementById('theme-button')
const darkTheme = 'dark-theme'
const iconTheme = 'bx-sun'

// Previously selected topic (if user selected)
const selectedTheme = localStorage.getItem('selected-theme')
const selectedIcon = localStorage.getItem('selected-icon')

// We obtain the current theme that the interface has by validating the dark-theme class
const getCurrentTheme = () => document.body.classList.contains(darkTheme) ? 'dark' : 'light'
const getCurrentIcon = () => themeButton.classList.contains(iconTheme) ? 'bx-moon' : 'bx-sun'

// We validate if the user previously chose a topic
if (selectedTheme) {
  // If the validation is fulfilled, we ask what the issue was to know if we activated or deactivated the dark
  document.body.classList[selectedTheme === 'dark' ? 'add' : 'remove'](darkTheme)
  themeButton.classList[selectedIcon === 'bx-moon' ? 'add' : 'remove'](iconTheme)
}

// Activate / deactivate the theme manually with the button
themeButton.addEventListener('click', () => {
    // Add or remove the dark / icon theme
    document.body.classList.toggle(darkTheme)
    themeButton.classList.toggle(iconTheme)
    // We save the theme and the current icon that the user chose
    localStorage.setItem('selected-theme', getCurrentTheme())
    localStorage.setItem('selected-icon', getCurrentIcon())
})

/*==================== SCROLL REVEAL ANIMATION ====================*/
const sr = ScrollReveal({
    origin: 'top',
    distance: '30px',
    duration: 2000,
    reset: true
});

sr.reveal(`.home__data, .home__img,
            .about__data, .about__img,
            .services__content, .menu__content,
            .app__data, .app__img,
            .contact__data, .contact__button,
            .footer__content`, {
    interval: 200
});

'use strict';

var basicSalarySlider = document.getElementById("myBasicSalaryAmount");
var amountBasicSalaryOutput = document.getElementById("inputBasicSalary");
var ageSlider = document.getElementById("myAge");
var ageOutput = document.getElementById("inputAge");


amountBasicSalaryOutput.innerHTML = basicSalarySlider.value;
ageOutput.innerHTML = ageSlider.value;


basicSalarySlider.oninput = function() {
    amountBasicSalaryOutput.innerHTML = this.value;
}
ageSlider.oninput = function() {
    ageOutput.innerHTML = this.value;
}


function showBasicSalaryVal(newVal) {
    basicSalarySlider.value = newVal;
    calculateIt();
};
function showAgeVal(newVal) {
    ageSlider.value = newVal;
    calculateIt();
}


basicSalarySlider.addEventListener("input", updateValueBasicSalary);
ageSlider.addEventListener("input", updateValueAge);


function updateValueBasicSalary(e) {
    amountBasicSalaryOutput.value = e.srcElement.value;
    calculateIt();
}
function updateValueAge(e) {
    ageOutput.value = e.srcElement.value;
    calculateIt();
}


function calculateIt() {
    var yourContributionAmountOutput = document.getElementById("yourContribution");
    var employerContributionAmountOutput = document.getElementById("employerContribution");
    var interestAmountOutput = document.getElementById("totalInterest");
    var maturityAmountOutput = document.getElementById("maturityAmount");

    // var basicSalaryValue = document.sipForm.realBasicSalaryAmount.value; //fieldname2
    // var ageValue = document.sipForm.realAge.value; //fieldname11
    var basicSalaryValue = document.getElementById("myBasicSalaryAmount").value;
    var ageValue = document.getElementById("myAge").value;

    var finalYourContributionAmount = Math.round(basicSalaryValue * 0.12 * (58 - ageValue)) * 12;
    var finalEmployerContributionAmount = Math.round(basicSalaryValue * 0.12 * (58 - ageValue)) * 12;
    var finalInterestAmount = Math.round(basicSalaryValue * 0.1567 * (Math.pow((1 + 0.0865 / 12) , (58 - ageValue) * 12) * (1+0.0865/12))/(0.0865/12)) - Math.round(basicSalaryValue * 0.1567 * (58 - ageValue)) * 12;
    var finalMaturityAmount = Math.round(basicSalaryValue * 0.0833 * (58 - ageValue)) * 12 + Math.round(basicSalaryValue * 0.1567 * (Math.pow((1 + 0.0865 / 12) , (58 - ageValue) * 12) * (1 + 0.0865 / 12)) / (0.0865/12));

    yourContributionAmountOutput.innerHTML = "Rs. " + finalYourContributionAmount;
    employerContributionAmountOutput.innerHTML = "Rs. " + finalEmployerContributionAmount;
    interestAmountOutput.innerHTML = "Rs. " + finalInterestAmount;
    maturityAmountOutput.innerHTML = "Rs. " + finalMaturityAmount;

}
calculateIt();