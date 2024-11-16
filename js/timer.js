const startingMin=45;
let time=startingMin * 60;
const countDownEL=document.getElementById('examTimer');
const examForm=document.getElementById("examForm");
let second;
setInterval(updateTime,1000);

function updateTime(){
const minutes=Math.floor(time/60);
 second=time % 60;
countDownEL.innerHTML=`${minutes}:${second}`;
time--;

}
function submit() {
    if(Number(time) <= 0){
        countDownEL.innerHTML = "Time's up!";
        examForm.submit();
        
    }
}