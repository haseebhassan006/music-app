$(document).ready(function() {
    $('input[type="radio"]').click(function() {
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".selectt").not(targetBox).hide();
        $(targetBox).show();
    });
});


var x = document.getElementById("spechid"); 

function playAudio() { 
  x.play(); 
}
function enableMute() { 
    x.muted = true;
}


var player;  
              
        window.onload=function()  
        {  
            player = document.getElementById('spechid');  
 
            $('#rngVolume').on("slidestop", function(){  
                    var volume = document.getElementById('rngVolume').value;  
                    console.log(volume);  
                    player.volume = volume;  
                      
            });  
              
}  


$(document).ready(function(){
    $("#getValvolume").click(function(){
      $(".vol_range").toggle();
    });
  });


  $(document).ready(function(){
    $("#getValpitch").click(function(){
      $(".pict_box").toggle();
    });
  });

  $(document).ready(function(){
    $("#getValspeechrate").click(function(){
      $(".speechrte").toggle();
    });
  });


 /* document.querySelector("#pitch").addEventListener("input", () => {
    // Get pitch Value from the input
    const pitch = document.querySelector("#pitch").value;
  
    // Set pitch property of the SpeechSynthesisUtterance instance
    speech.pitch = pitch;
  
    // Update the pitch label
    document.querySelector("#pitch-label").innerHTML = pitch;
  });*/




  
// Initialising the speech API
const synth = window.speechSynthesis;
   
// Element initialization section
const form = document.getElementById('speechfrm');
const textarea = document.getElementById('spechid');
const rate = document.getElementById('Speechrate');
const rateval = document.getElementById('rate-value');   
// Retrieving the different voices and putting them as 
// options in our speech selection section
let voices = [];

 
const speak = () => {
      
    // If the speech mode is on we dont want to load 
    // another speech
    /*if(synth.speaking) {
        alert('Already speaking....');
        return;
    }*/
       
    // If the text area is not empty that is if the input
    // is not empty
    if(textarea.value !== '') {
          
        // Creating an object of SpeechSynthesisUtterance with
        // the input value that represents a speech request
        const speakText = new SpeechSynthesisUtterance(textarea.value);
   
        // Setting the rate and pitch of the voice
        speakText.rate = rate.value;
        //  speakText.pitch = pitch.value;
   
        // Finally calling the speech function that enables speech
        synth.speak(speakText);
    }
};
   
// This function updates the rate and pitch value to the
// value to display
rate.addEventListener('change', evt => rateval.innerHTML 
        = (Number.parseFloat(rate.value) * 10) + "");


form.addEventListener('getValBtnID', evt => {
          evt.preventDefault();
          speak();
          textarea.blur();
});


  