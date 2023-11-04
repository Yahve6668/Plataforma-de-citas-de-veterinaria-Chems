function recuperaUser(){
			var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange= function(){
				if(this.readyState==4 && this.status==200){
					let select2=document.getElementById('Username');
                     let xml = xmlhttp.responseText;
	               	  let a=xml;
	                  let op=document.createElement('p');
	                  let texto=document.createTextNode(a);
	                   op.appendChild(texto);
	                   select2.appendChild(op);

				   }
				};
			xmlhttp.open("POST", "recuperaUser.php", true);
			xmlhttp.send();
}




async function red(){
  let response = await fetch('recuperaUser.php'); 
  let dato= await response.text();
  //alert(dato);
  if(dato=="no haga mamadas"){
     location.href="Introductoria.html";
  }
}



function redirecciona(a) {
	  location.href=a;
}
function validaCor(c) {
        
    emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    if (emailRegex.test(c)) {
    	return true;
    } else {
        return false;
    }
}


async function chek() {
let nom=document.getElementById('Nombre').value;
let cor=document.getElementById('corr').value;
let con=document.getElementById('contra').value;
  if(nom!=""&&validaCor(cor)&&con!=""){
      let respuesta = await fetch("registro.php", {
            "method": "POST",
            "body": crea_forma({
               "cor":cor,
               "NombreUs":nom,
               "con":con
            })
        });
     //alert( await respuesta.text());
     let a=await respuesta.text( );
     console.log(a);
     if(a=="registrase.html"){
     	    alert("Datos ya registrados");
     	    alert("Coloca otros");
        	//redirecciona(a);
    }else{
        redirecciona(a);
    }
  }else{
   alert("Lena todo los campos bien =) y el correo corectamente");
 }
}

function option(campo,recurpe){
			var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange= function(){
				if(this.readyState==4 && this.status==200){
					let select2=document.getElementById(campo);
          let xml = JSON.parse(xmlhttp.responseText);
          
			 for(let i=0;i<xml.length;++i){
               	  let a=xml[i];
                  let op=document.createElement('option');
                  let texto=document.createTextNode(a);
                  op.value=i+1;
                  op.appendChild(texto);
                  select2.appendChild(op); 
                 }
					}
				};
			xmlhttp.open("POST", recurpe, true);
			xmlhttp.send();
}
function llenaForCi(){
	llenaUser();
	fechaAc();
	option('tipoMas','recuperaTipo.php');
	option("tipoCita",'recuperaTipoC.php');
	option('tipoDoc','recuperaDoc.php');
}


function recuComent(){
   let xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange= function(){
				if(this.readyState==4 && this.status==200){
         let tabla=document.getElementById('comentarios');	
		
         let xml = JSON.parse(xmlhttp.responseText);
			         let p= document.createElement('table');
                  let tblBody=document.createElement('tbody');
                  let iden=['User','Comentario','Doctor'];
                  let fila1=document.createElement('tr');
                 for(let i=0;i<3;++i){
                      let titulos=document.createElement('th');
                      let conenido=document.createTextNode(iden[i]);
                      titulos.appendChild(conenido);
                      fila1.appendChild(titulos);
                }
                tblBody.appendChild(fila1);
                p.appendChild(tblBody);
                for(let i=0;i<xml.length;i+=3){   
                  let fila=document.createElement('tr');
                     for(let j=0;j<3;++j){
                        let colu=document.createElement('td');            
                        let contenido=document.createTextNode(xml[j]);
                        colu.appendChild(contenido);
                        fila.appendChild(colu);
                     }           
                  tblBody.appendChild(fila);
   
            } 

            p.appendChild(tblBody)
            tabla.appendChild(p);
            p.setAttribute("border","2");
           }
			};
			xmlhttp.open("POST", "recuperaComent.php", true);
			xmlhttp.send();
}

function fechaAc(){
	date = new Date();
   let	year = date.getFullYear();
   let month = date.getMonth() + 1;
   let day = date.getDate();
   document.getElementById('fec').setAttribute("value",year+"-"+(month<10?"0":"")+month+"-"+(day+1<10?"0":"")+(day+1));
   document.getElementById('fec').setAttribute("min",year+"-"+(month<10?"0":"")+month+"-"+(day+1<10?"0":"")+(day+1));
}

function llenaUser(){
			 var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange= function(){
				if(this.readyState==4 && this.status==200){
				  	document.getElementById('nombreF').setAttribute('value',xmlhttp.responseText);
                  }
				};
			xmlhttp.open("POST", "recuperaUser.php", true);
			xmlhttp.send();
}
function crea_forma(objeto) {
         let res = new FormData( );
         for (let campo in objeto) {
            res.append(campo, (typeof(objeto[campo]) == 'object' ? JSON.stringify(objeto[campo]) : objeto[campo]));
         }
         return res;
      }
async function  valida(){
	 let fecha=document.getElementById('fec').value;
	 let nombreM=document.getElementById('nombreMas').value;
	 let doc=document.getElementById('tipoDoc').value;
	 let tipoma=document.getElementById('tipoMas').value;
	 let tipoci=document.getElementById('tipoCita').value;
	 if(fecha!=""&&nombreM!=""&&doc!=0&&tipoma!=0&&tipoci!=0&&nombreM!=""){
      alert("Cita registrada"); 
       let respuesta = await fetch("como_json.php", {
            "method": "POST",
            "body": crea_forma({
               "fecha":fecha,
               "NombreU":document.getElementById('nombreF').value,
               "NombreM":nombreM,
               "doc":doc,
               "tipoma":tipoma,
               "tipoci":tipoci
            })
        });
 
	 }else{
	 	alert("Lena todo los campos");
	 }
}
async function Docf (){
	 let nombreM=document.getElementById('Doc').value;
	 if(nombreM!=""){
       let respuesta = await fetch("insertaDoc.php", {
            "method": "POST",
            "body": crea_forma({
               "Nom":nombreM,
            })
        });
       alert(await respuesta.text( ));
	 }else{
	 	alert("Lena todo el campo");
	 }
}
async function comentV(){
   let comet=document.getElementById('coment').value;
   let idDoc=document.getElementById('vetcoment').value;
    if(comet!=""&&idDoc!=0){
       let respuesta = await fetch("insertComent.php", {
            "method": "POST",
            "body": crea_forma({
               "comet":comet,
               "IdDocO":idDoc
            })
        });
       alert(await respuesta.text( ));
    }else{
    	alert("Llena bien los campos");
    }
}
function matSe(){
			 var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange= function(){
				if(this.readyState==4 && this.status==200){
			      redirecciona(xmlhttp.responseText);
			      }
				};
			xmlhttp.open("POST", "mataUser.php", true);
			xmlhttp.send();
}