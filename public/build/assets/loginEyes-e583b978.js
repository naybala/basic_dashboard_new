const o=document.querySelector("#togglePassword"),t=document.querySelector("#password"),e=document.querySelector("#removeEyes"),s=document.querySelector("#showEyes");o.addEventListener("click",function(c){const d=t.getAttribute("type")==="password"?"text":"password";t.setAttribute("type",d)});e.addEventListener("click",()=>{e.classList.add("hidden"),s.classList.remove("hidden")});s.addEventListener("click",()=>{s.classList.add("hidden"),e.classList.remove("hidden")});