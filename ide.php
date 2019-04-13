<?php
session_start();
if (isset($_SESSION['username']) && $_SESSION['username'] !=""){
?>
<!DOCTYPE html>
<html lang="en">
      <head>
          <meta charset="utf-8">
          <title> IDE </title>
          <script src="ace-builds/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
          <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    	  <link rel="stylesheet" type="text/css" href="font-awesome.min.css">
          <link rel="stylesheet" type="text/css" href="style.css">
          <style>
            pre{
              background-color:#F3F7F8;
              border:none;
               }
            #question{
               font-size: 16px;
               }
           body{
            background-color:#F3F7F8;
           font-family: 'Source Code Pro';
               }
               h2{
               	font-size: 23px;
               	font-family: 'Source Code Pro bold';

               }
               b{
               	font-size: 16px;
               	font-family: 'Source Code Pro bold';

               }
	    @font-face {
	    font-family: 'Source Code Pro';
	    font-style: normal;
	    font-weight: 700;
	    src: local('Source Code Pro'), local('Source Code Pro'), url(./Source_Code_Pro/SourceCodePro-Regular.ttf) format('truetype');
       }
        @font-face {
	    font-family: 'Source Code Pro bold';
	    font-style: bold;
	    font-weight: 700;
	    src: local('Source Code Pro'), local('Source Code Pro'), url(./Source_Code_Pro/SourceCodePro-Bold.ttf) format('truetype');
       }
       .t{
              font-size: 20px;
              font-family: 'Source Code Pro';
              padding: 10px;
              float: left;
            }
            .ace-tm .ace_gutter{
              z-index: auto;
            }
         .box2{
             box-shadow: 0 2px 6px rgba(0, 0, 0, 0.12), 0 2px 6px rgba(0, 0, 0, 0.24);
         }   
         #time{
          font-size: 30px;
          font-family: 'Source Code Pro bold';
          color: black;
         }
         sub{
          font-family: 'Source Code Pro';
         }
         </style>
      </head>
      <body onload="timer()">
  <div class="navbar navbar-default box2" style="background-color:#fff;text-align:center;width: 100%;border: none;z-index:3;position: fixed;">
<div style="float: left;"><span class="t">Time Left:</span><span id="time"></span></div>
<span  style="font-size: 40px;color:#3B5998;text-align: center;font-family: 'Source Code Pro bold';">CodeAdept 2.0 </span>
 <div style="float: right;">
                                <button  id ="prev" class="btn btn-primary" title="previous"  onclick="prev()" style="margin-top: 5px;">Prev</button>
                                <button  id ="next" class="btn btn-primary" title="next"  onclick="next()" style="margin-top: 5px;">Next</button>
                                <button  id ="quit" class="btn btn-danger" title="next"  onclick="quit()" style="margin-top: 5px;">Quit</button>
                               </div>

  </div>
          <div class="container-fluid">
              <div class="container" id="container">
                <div class="box" style="margin-top:40px;color:#333;border-radius:10px;padding:50px;" >
                   <div id="question">
                    <h2>1. Pretty Rectangle </h2>
      <p>Print concentric rectangular pattern Like a 2d matrix.</p> <p>Let us show you some examples to clarify what we mean.</p>
  <b>Example 1:</b><br>
 <b>Input: A = 4</b><br>
 <b>Output:</b><br>
<pre>
  4 4 4 4 4 4 4 
  4 3 3 3 3 3 4 
  4 3 2 2 2 3 4 
  4 3 2 1 2 3 4 
  4 3 2 2 2 3 4 
  4 3 3 3 3 3 4 
  4 4 4 4 4 4 4 
</pre>
<b>Example 2:</b><br>
<b>Input: A = 3</b><br>
<b>Output: </b><br>
<pre>
  3 3 3 3 3 
  3 2 2 2 3 
  3 2 1 2 3 
  3 2 2 2 3 
  3 3 3 3 3 
</pre>
<p>The outermost rectangle is formed by A, then the next outermost is formed by A-1 and so on.</p><p>You will be given A as an input </p>

                </div>
                 <div style="font-size: 16px;"><span  style="pointer-events: none;" class="btn btn-warning">Note:</span> You can submit your code any number of times .we will consider only your last submission for each problem.</div>
               </div>
                  <div class="panal">
                      <div class="btn-group b ">
                        <select id="theme" onchange="changetheme(value)" class="btn btn-default s" title="Choose Theme">
                            <option value="chrome" selected>chrome</option> 
                            <option value="monokai" >monkai</option>
                            <option value="chaos">chaos</option> 
                            <option value="ambiance">ambiance</option> 
                            <option value="clouds">clouds</option> 
                            <option value="clouds_midnight">clouds midnight</option>
                            <option value="cobalt">cobalt</option>  
                            <option value="crimson_editor">crimson</option>
                            <option value="dawn">dawn</option>
                            <option value="dracula">dracula</option>
                            <option value="dreamweaver">dreamweaver</option>
                            <option value="eclipse">eclipse</option>
                            <option value="github">github</option>
                            <option value="gob">gob</option>
                            <option value="gruvbox">gruvbox</option>
                            <option value="idle_fingers">idle fingers</option>
                            <option value="iplastic">iplastic</option>
                            <option value="katzenmilch">katzenmilch</option>
                            <option value="kr_theme">kr theme</option>
                            <option value="kuroir">kuroir</option>
                            <option value="merbivore">merbivore</option>
                            <option value="merbivore_soft">merbivore soft</option> 
                            <option value="mono_industrial">mono industrial</option>
                            <option value="pastel_on_dark">pastel on dark</option>
                            <option value="solarized_dark">solarized dark</option>
                            <option value="solarized_light">solarized light</option>
                            <option value="sqlserver">sqlserver</option>
                            <option value="terminal">terminal</option>
                            <option value="textmate">textmate</option>
                            <option value="tomorrow">tomorrow</option>
                            <option value="tomorrow_night">tomorrow night</option>
                            <option value="tomorrow_night_blue">tomorrow night blue</option>
                            <option value="tomorrow_night_bright">tomorrow night bright</option>
                            <option value="tomorrow_night_eighties">tomorrow night eighties</option>
                            <option value="twilight">twilight</option>
                            <option value="vibrant_ink">vibrant ink</option>
                            <option value="xcode">xcode</option>   
                        </select>
                        <select o class="btn btn-default s" onchange="changemode(value)" id="mode" title="Choose Language">
                    		    <option value="">Lang</option>
<!--                     		    <option value="javascript">js</option> 
 -->                    		    <option value="c" >c</option> 
                    		    <option value="cpp">c++</option> 
                    		    <option value="python2">python2</option>
                    		    <option value="python3">python3</option>
                                <option value="java">java</option>
                        </select>
                        <select id="font" onchange="changefont(value)" class="btn btn-default s" title="Choose Font Size">
                    		    <option value="10px">10px</option>
                    		    <option value="11px">11px</option> 
                    		    <option value="12px">12px</option> 
                    		    <option value="13px">13px</option> 
                    		    <option value="14px">14px</option> 
                    		    <option value="15px">15px</option> 
                    		    <option value="16px" selected>16px</option> 
                    		    <option value="17px">17px</option> 
                    		    <option value="18px">18px</option> 
                    		    <option value="19px">19px</option> 
                    		    <option value="20px">20px</option> 
                    		    <option value="21px">21px</option> 
                    		    <option value="22px">22px</option> 
                    		    <option value="23px">23px</option> 
                    		    <option value="24px">24px</option> 
                    		    <option value="25px">25px</option> 
                    		    <option value="26px">26px</option> 
                    		    <option value="27px">27px</option> 
                    		    <option value="28px">28px</option> 
                    		    <option value="29px">29px</option> 
                    		    <option value="30px">30px</option> 
                       </select>
                       <label class="switch" title="Full Screen Mode">
                           <input type="checkbox"  id="switch" onchange="full_screen_mode()">
                           <span class="slider round"></span>
                       </label>
                       <span id="save">save</span>
                    </div>
                   <!--  <div style="float: right;">
                    <label class="switch" >
                       <input type="checkbox" checked>
                       <span class="slider round"></span>
                    </label>
                    </div> -->
                    </div>
                        <div id="editor" >
                        </div>
                    <form  id="form1">
                                <div style="float: right;">
                    		    <button  id ="run" class="btn btn-primary" title="Run"  style="margin-top: 5px;">Test</button>
                                <button  id ="submit" class="btn btn-success" title="submit" onclick="submit_code()"  style="margin-top: 5px;">Submit</button>
                               </div>
                    		    <label class="c" title="Provide input">Custom Input
                    		    <input type="checkbox" id="c_input"  name="checkbox" onchange="onchecked()">
                    		    <span class="checkmark"></span>
                    		    </label><br><br>
                    		    <textarea name="in" cols="30" rows="5" id="in"></textarea><br>
                   </form>
                    <!-- compiling gif !-->
                     <div id="loader" style="display: none;"><span>Compiling...</span><img src="loader.gif" style="width: 90px;height: 90px;z-index: -1"></div>
                       <div class="oh" id="oh" style="display: none;"><span style="font-size:20px;">Compiled</span><span id="running" style="visibility: visible;"><img src="ab.gif" style="width:65px;height:35px;"></span>
                        <img src="ch.png" style="float: right;width:40px;height:35px;" id="comp"></div>
                    <!-- compiled !-->
                    <!-- output !-->
                        <div id="out" class="box" style="display: none;margin-bottom:55px;">
              		         <div class="oh" ><span style="font-size:20px;">Output:</span><span id="error" style="color:red;text-align: center;margin-left: 10px;visibility:hidden;">Error</span>
              		          <span id="x" onclick="cut()">&#10006;</span>
                          </div>
                           <div>
              		            <div style="overflow-y: scroll;overflow-x: scroll; max-height:500px;border-style:none;overflow:auto;border:none;outline: none !important;padding-left: 10px;padding-bottom: 10px"  id="output" ><</div>
                          </div>
                       </div>
                   <!--     !-->
                </div>
            </div>
            <script src="jquery.min.js"></script>
            <script>
            var editor = ace.edit("editor");
             let question_no =1;
            document.getElementById("run").disabled=true;
            editor.setValue("#Select A Language !!");
            changefont("16px");
            editor.setShowPrintMargin(false);
            document.getElementById('form1').addEventListener('submit',on_click);
            function changetheme(e){
              if(e!==''){
            // console.log(e);
                editor.setTheme("ace/theme/"+e);
              }
            }
            function changemode(e){
            cut();
            if(e==''){
              document.getElementById("run").disabled = true;
            }
            else{
              document.getElementById("run").disabled = false;
            }

            switch(e){
            case 'javascript':
            editor.setValue(
            ` function foo(items) {
            let x = "Write Your Code here ";
              return x;
            }
            `)
            editor.session.setMode("ace/mode/"+e);
            break;
            case 'cpp':
            editor.setValue(
            `#include <iostream>
            using namespace std;
            int main(void)
            { 
            // write your code here


            return 0;
            } `
            )
            editor.session.setMode("ace/mode/c_cpp");
            break;

            case 'c':
            editor.setValue(
            `#include <stdio.h>
            int main(void)
            {
            // write your code here

            return 0;
            } `
            )
            editor.session.setMode("ace/mode/c_cpp");
            break;
            case 'python2':
            editor.setValue("# write your code here");
            editor.session.setMode("ace/mode/python");
            break;
            case 'python3':
            editor.setValue("# write your code here");
            editor.session.setMode("ace/mode/python");
            break;
            case 'java':
            editor.setValue(`
    // write your code inside Main class
    class Main{
         public static void main(String []args){
                  System.out.println("Hello World");
        }
    }
                    `);
            editor.session.setMode("ace/mode/java");
            break;
            
            default:
            editor.setValue("#Select A Language !!");
            }
            }
            function log(){
            console.log(editor.getValue());
            }
         
            function full_screen_mode(){
            var d = document.getElementById('container');
            var s = document.getElementById('switch').checked;
            //console.log(s);
            if(!s){
              d.style.width ="88%";
            }
            else{
              d.style.width ="100%";
              d.style.height ="100%";
            }
            }
            function on_click(e){
            e.preventDefault();
            document.getElementById('loader').style.display='block';
            document.getElementById('error').style.visibility="hidden";
           // document.getElementById('running').style.visibility="hidden";
            document.getElementById('output').style.background="#FFF";
            document.getElementById('comp').src = "ch.png";
            document.getElementById('oh').style.display='none';
            document.getElementById('out').style.display='none';
            document.getElementById("run").disabled = true;
           // console.log(document.getElementById('loader').style.display);
            window.scrollBy(0, 200); 
            const c = editor.getValue();
            let i = null;
            const l = document.getElementById('mode').value;
            if(l!="" && l!=null){
              setTimeout( () => {
                    if(document.getElementById('c_input').checked){
                    i = document.getElementById('in').value;
                    // console.log(i);
                    // console.log(typeof i);

                    }
                    document.getElementById('in').style.display="none";
                    document.getElementById('c_input').checked = false;
                    document.getElementById("run").disabled = true;
                    document.getElementById("submit").disabled = true;
                    let data = 'code='+encodeURIComponent(c)+'&'+'lang='+l+'&'+'username=' + <?php echo json_encode(htmlspecialchars($_SESSION['username']));?>;
                    let j = 0;
                    if(i || j!=null){
                       
                        if (i){
                            data = data + '&' +'in='+ i;
                        }
                        else{
                             data = data + '&' +'in='+ j;
                              
                        }
                    }
                    data = data + '&'+'prob='+question_no;
                     console.log(" j = " + j);
                    let xhr = new XMLHttpRequest();
                    console.log(l);
                    xhr.open('POST','compile.php',true);
                    xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded;charset=UTF-8');
                    xhr.onload = function(){
                    //  console.log(this.responseText);
                    // console.log(data);
                    // console.log(xhr);
                    document.getElementById('loader').style.display="none";
                   // console.log(document.getElementById('loader').style.display);
                    parent = document.getElementById('output');
                    document.getElementById('output').style.display="block";
                    document.getElementById('oh').style.display="block";
                    console.log(!this.responseText);
                    if(this.responseText.trim()==='' || this.responseText==null || this.responseText==undefined){
                    document.getElementById('running').style.visibility="visible";
                    let xhr2 = new XMLHttpRequest();
                    xhr2.open('POST','run.php',true);
                    xhr2.setRequestHeader('Content-type','application/x-www-form-urlencoded;charset=UTF-8');
                    xhr2.onload = function(){
                          document.getElementById('running').style.visibility="hidden";
                          document.getElementById('out').style.display="block";
                          document.getElementById('output').innerHTML=this.responseText;
                          window.scrollBy(0, 400); 
                     }
                     xhr2.send(data); 
                    }
                    else{
                        document.getElementById('output').style.background="#FFC0CB";
                        document.getElementById('output').innerHTML=this.responseText;
                         document.getElementById('out').style.display="block";
                        document.getElementById('error').style.visibility="visible";
                        document.getElementById('comp').src = "cross.jpg";
                        document.getElementById('running').style.visibility="hidden";
                        window.scrollBy(0, 400); 
                    }
                     document.getElementById("run").disabled = false;
                     document.getElementById("submit").disabled = false;
                    }
                    
                    xhr.send(data); },1000);
            }
            else{
                  document.getElementById('loader').style.display='none';
                  document.getElementById("run").disabled = false;
                  document.getElementById("submit").disabled = false;

            }
            }
            //function myFunction() {
            // console.log('myFunction called !')
            // var elmnt = document.getElementById("out");
            // var y = elmnt.scrollTop;
            // if(y!=0){
            // elmnt.style.height=elmnt.scrollHeight + "px";
            // }
            // }

            function cut(){
            var o = document.getElementById("out");
            var x = document.getElementById("oh");
            o.style.display = "none";
            x.style.display = "none";
            }
            function changefont(f){
            //  console.log(f);

            document.getElementById('editor').style.fontSize=f;
            }
            function onchecked(){

            const a = document.getElementById('c_input').checked;
            if(a===true){
                        document.getElementById('in').style.display="block";
            }
            else{
                  document.getElementById('in').style.display="none";
            }
            }
           
            function prev(){
                console.log(document.getElementById('question').style.innerHTML);
                if(question_no>1){
                    console.log('question no',question_no);
                    question_no = question_no-1;
                    load_code();
                    let xhr = new XMLHttpRequest();
                    xhr.open('GET','prob'+question_no+'.txt',true);
                    //xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded;charset=UTF-8');
                    xhr.onload = function(){
                          //console.log(this.responseText);
                          document.getElementById('question').innerHTML=this.responseText;
                     }
                     xhr.send(); 
                }
            }
            function next(){
                 console.log(document.getElementById('question').style.innerHTML);
                if(question_no<4){
                    console.log('question no',question_no);
                    question_no = question_no+1;
                    load_code();
                    let xhr = new XMLHttpRequest();
                    xhr.open('GET','prob'+question_no+'.txt',true);
                    //xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded;charset=UTF-8');
                    xhr.onload = function(){
                         // console.log(this.responseText);
                          document.getElementById('question').innerHTML=this.responseText;
                     }
                     xhr.send(); 
                }
            }
            function submit_code(){
                event.preventDefault();
           //      document.getElementById('loader').style.display='block';
           //     document.getElementById('error').style.visibility="hidden";
           // // document.getElementById('running').style.visibility="hidden";
           //  document.getElementById('output').style.background="#FFF";
           //  document.getElementById('comp').src = "ch.png";
           //  document.getElementById('oh').style.display='none';
           //  document.getElementById('out').style.display='none';
           //  document.getElementById("run").disabled = true;
           // console.log(document.getElementById('loader').style.display);
            window.scrollBy(0, 200); 
            const c = editor.getValue();
            let i = null;
            const l = document.getElementById('mode').value;
            if(l!="" && l!=null){
                    if(document.getElementById('c_input').checked){
                    i = document.getElementById('in').value;
                    // console.log(i);
                    // console.log(typeof i);

                    }
                    document.getElementById('in').style.display="none";
                    document.getElementById('c_input').checked = false;
                    document.getElementById("run").disabled = true;
                    let data = 'code='+encodeURIComponent(c)+'&'+'lang='+l+'&'+'username=' + <?php echo json_encode(htmlspecialchars($_SESSION['username']));?>;
                    let j = 0;
                    if(i || j!=null){
                       
                        if (i){
                            data = data + '&' +'in='+ i;
                        }
                        else{
                             data = data + '&' +'in='+ j;
                              
                        }
                    }
                    data = data + '&'+'prob='+question_no;
                     console.log(" j = " + j);
                    let xhr = new XMLHttpRequest();
                    console.log(l);
                    xhr.open('POST','submit.php',true);
                    xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded;charset=UTF-8');
                    xhr.onload = function(){
                    document.getElementById('loader').style.display="none";
                    document.getElementById("run").disabled = false;
                    console.log(this.responseText);
                    swal('Submitted! ',`Your code for Problem no ${question_no} is Submitted .`,'success');
                }
                xhr.send(data);

            }
            else{
                 swal('error','Please Select a Language ','warning');
            }
        }
        let min=90;
        let sec =0;
        let user = <?php echo json_encode(htmlspecialchars($_SESSION['username'])); ?> ;
        function timer(){
           setInterval(() => {
            if(localStorage.getItem("user") && localStorage.getItem("min") && localStorage.getItem("sec") && localStorage.getItem("user")==user  ){
               min = localStorage.getItem("min");
               sec = localStorage.getItem("sec");
              // console.log(localStorage.getItem("min"));
        }
             if(sec>0){
                sec=sec-1
                 localStorage.setItem("min", min);
                 localStorage.setItem("sec", sec);
                 localStorage.setItem("user", user);
             }
             else{
                if(min>0){
                    min = min-1;
                    sec = 59;
                 localStorage.setItem("min", min);
                 localStorage.setItem("sec", sec);
                 localStorage.setItem("user", user);

                }
                else{
                    swal("Time's up !" ,"Time is Over Now","success");
                    setTimeout(() =>{
                         window.location.href="logout.php";
                     },2000 )
                }
             }
             let m='';
             let s='';
             if(min<10){
                m = '0'
             }
             if(sec<10){
                s = '0'
             }
              if(min<=4 && min>2){
              document.getElementById('time').style.color="#ff8000";
             document.getElementById('time').innerHTML = m+min+'<sub style="color:#ff8000;">m</sub>:' + s+sec+'<sub>s</sub>';

             }
            else if(min<=2){
               document.getElementById('time').style.color="red";
             document.getElementById('time').innerHTML = m+min+'<sub style="color:red;">m</sub>:' + s+sec+'<sub>s</sub>';
            }
             else{
             document.getElementById('time').innerHTML = m+min+'<sub>m</sub>:' + s+sec+'<sub>s</sub>';
             }
           },1000);
        }
        function quit(){
            event.preventDefault(); 
  swal({
      title: "Are you sure?",
      text: "You will not be able to Change Your Code Again !",
      icon: "warning",
      buttons: [
        'No, cancel it!',
        'Yes, I am sure!'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
         setTimeout(() =>{
                         window.location.href="logout.php";
                     },3000 )
        swal({
          title: 'Submitted!',
          text: 'Your code successfully submitted!',
          icon: 'success'
        }).then(function() {
          window.location.href="logout.php";
        });
      } else {
        swal("Cancelled", " Your Submission Cancelled :)", "success");
      }
       })
        }

        function load_code(){
  let xhr = new XMLHttpRequest();
       xhr.open('POST','load_code.php',true);
       xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded;charset=UTF-8');
       xhr.onload = function(){
            // document.getElementById('loading').style.display="none";
            if(this.responseText && this.responseText!='-1'){
            //console.log((this.responseText));
            let mode =$.parseJSON(this.responseText)[0].lang;
            document.getElementById('mode').value=mode;
            console.log(mode=='c',mode)
            if(mode=='c' || mode=='cpp'){
              mode = 'c_cpp';
            }
            else if(mode=='python2' || mode=='python3'){
              mode='python';
            }
            mode="ace/mode/"+mode;
            console.log(mode);
            editor.session.setMode(mode);
            editor.setValue($.parseJSON(this.responseText)[0].code);
          }
          else{
               document.getElementById('mode').value="";
               editor.setValue("#Select A Language !!")

          }
        }
        xhr.send('question_no='+question_no); 

}


function code_save(){
  const l = document.getElementById('mode').value;
  const code = editor.getValue()
  let d='';
  if(l!='' && l!=undefined && l!=null){
   d='code='+encodeURIComponent(code)+'&'+'lang='+encodeURIComponent(l)+'&question_no='+encodeURIComponent(question_no);

  let xhr = new XMLHttpRequest();
       xhr.open('POST','code_save.php',true);
       xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded;charset=UTF-8');
       xhr.onload = function(){
            // document.getElementById('loading').style.display="none";
            console.log(this.responseText);
        }
        xhr.send(d); 
    }
  document.getElementById('save').style.backgroundColor="#3cba54";
  document.getElementById('save').innerHTML="saved";
  setTimeout(()=>{
      document.getElementById('save').style.backgroundColor="white";
      document.getElementById('save').innerHTML="save";
  },900);
}

document.getElementById('save').addEventListener('click',()=>{
  code_save();
  
})

let typingTimer;                
let doneTypingInterval = 3000;  
editor.addEventListener('change', () => {
  console.log('code changed ..');
    clearTimeout(typingTimer);
        typingTimer = setTimeout(doneTyping, doneTypingInterval);
});

function doneTyping () {
    code_save();

}
            
            </script>
            <script src="sweetalert.min.js"></script>
            </body>
            </html>
<?php
}
else{
    header('location:index.php');
}
?>
