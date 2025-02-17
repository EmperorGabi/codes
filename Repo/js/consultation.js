//const container = document.getElementById('timeContainer').innerHTML = 'watchout'
function showTime() {
    const container = document.getElementById('timeContainer')
    const currentTime = new Date();
    const formattedTime = currentTime.toLocaleTimeString()
    container.innerHTML = `Current time: ${formattedTime}`
}

function showDate() {
    const container = document.getElementById('dateContainer')
    const options = {weekday: 'long', year : 'numeric', month : 'long', day : 'nuemric'}
    const date = new Date()
    const currentDate = date.getDate()+'/'+date.getMonth()+'/'+date.getFullYear()
    container.innerHTML = `Current Date: ${currentDate}`
}

setInterval(showTime, 1000);

showDate()
showTime()