const typeWriter= function (txtElement,words,wait = 3000){
    this.txtElement=txtElement;
    this.words=words;
    this.txt="";
    this.wordIndex=0;
    this.wait= parseInt (wait,10);
    this.type();
    this.isDeleting= false;
}
typeWriter.prototype.type= function (){
    const current=this.wordIndex;
    let fullTxt=this.words[current];
    if(!this.isDeleting && this.txt===fullTxt){
        this.isDeleting=true;
    }
    else if (this.isDeleting && this.txt===""){
            this.isDeleting=false;
            if(this.wordIndex===this.words.length-1){
            this.wordIndex=0;
            }
            else{
                this.wordIndex++;
            }
}
    if(this.isDeleting){
        this.txt=fullTxt.substring(0,this.txt.length-1);
    }
    else{
        this.txt=fullTxt.substring(0,this.txt.length+1);
    }
    
    this.txtElement.innerHTML = `<span class="txt">${this.txt}</span>`;

    setTimeout(() => this.type(), 400);
}

window.onload=init;

function init(){
    const txtElement=document.querySelector(".txt-type");
    const words=JSON.parse(txtElement.getAttribute('data-words'));
    const wait=txtElement.getAttribute("data-wait");
    new typeWriter (txtElement,words,wait);
}