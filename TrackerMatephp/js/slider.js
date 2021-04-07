const logo = document.querySelector('.logo');
const slider = document.querySelector('.slider');

const t1= new TimelineMax();

t1.fromTo(logo,1, {height: "0%"}, {height: "80%" , ease: Power2.easeInOut})
.fromTo(logo,1.2, {width: '100%'},{width: "70%" , ease: Power2.easeInOut});