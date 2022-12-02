document.addEventListener("DOMContentLoaded", function () {
    const monthsBr = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    const tableDays = document.getElementById("dias");
    function GetDaysCalendar(mes, ano, dia) {
        document.getElementById("mes").innerHTML = monthsBr[mes];
        document.getElementById("mes").removeAttribute("class");
        document.getElementById("mes").classList.add(mes);        
        document.getElementById("ano").innerHTML = ano;
        let firstDayOfWeek = new Date(ano, mes, 1).getDay() - 1; //primer dia de la semana 
        let getLastDayThisMonth = new Date(ano, mes + 1, 0).getDate(); //ultimo dia del mes
        //console.log(firstDayOfWeek);
        //console.log(getLastDayThisMonth);        
        for (var i = -firstDayOfWeek, index = 0; i < (42 - firstDayOfWeek); i++, index++) {
            let dt = new Date(ano, mes, i);
            let dayTable = tableDays.getElementsByTagName("td")[index];
            dayTable.classList.remove("mes-anterior");
            dayTable.classList.remove("proximo-mes");
            dayTable.classList.remove("dia-actual");
            dayTable.classList.remove("event");
            dayTable.innerHTML = dt.getDate();
            dayTable.classList.add("dia_m");
            //dayTable.setAttribute("id", "dia_" + index);
            if (i < 1) {
                dayTable.classList.add("mes-anterior");
            }
            if (i > getLastDayThisMonth) {
                dayTable.classList.add("proximo-mes");
            }
            if (i == dia) {
                let even = new Date();
                if (mes == even.getMonth()) {
                    dayTable.classList.add("dia-actual");
                    dayTable.classList.add("event");
                }
            }
        }
    }
    let now = new Date();
    let mes = now.getMonth();
    let ano = now.getFullYear();
    let dia = now.getDate();    
    GetDaysCalendar(mes, ano, dia);
    const btn_proximo = document.getElementById("btn-prev");
    const btn_anterior = document.getElementById("btn-ant");
    btn_proximo.onclick = function () {
        mes--;
        if (mes < 0) {
            ano--;
            mes = 11;
        }
        GetDaysCalendar(mes, ano, dia);
    }
    btn_anterior.onclick = function () {
        mes++;
        if (mes > 11) {
            ano++;
            mes = 0;
        }
        GetDaysCalendar(mes, ano, dia);
    }

    let seleccion = document.querySelectorAll(".dia_m");
    seleccion.forEach((celda) => {
        celda.addEventListener("click", (evento) => {
            evento.preventDefault();
            let valor = celda.innerHTML;
            let lista_de_clases = celda.classList;
            let class_exist=true;
            lista_de_clases.forEach((elemento)=>{
                if(elemento==="mes-anterior" || elemento==="proximo-mes"){
                    class_exist=false;
                }
            });
            if(class_exist==true){
                var ano=this.getElementById("ano").innerText;
                var mes = document.getElementById("mes").classList[0];
                dia_r=valor;
                ano_r=ano;
                mes_r=parseInt(mes)+1
                console.log(dia_r);
                console.log(mes_r);
                console.log(ano_r);                
            }
        });
    });
});

let dia_r;
let ano_r;
let mes_r;


    document.getElementById("form_paciente").addEventListener("submit",function(formulario){
        formulario.preventDefault();

        var paciente = new Object();
        paciente.cedula=$("#cedula").val();
        paciente.nombre=$("#nombre").val();
        paciente.apelldo=$("#apellido").val();
        paciente.fecha_nacimiento=$("#fecha_nacimiento").val();
        paciente.telefono=$("#telefono").val();

        var sjson= JSON.stringify(paciente);
       
        $.ajax({
            url: "/api/paciente/crear",
            type: "post",            
            data: sjson
        }).done(function(datos){
            if(datos==="true"){
            alert("Guardado con exito");
            $("#cedula").val("");
            $("#nombre").val("");
            $("#apellido").val("");
            $("#fecha_nacimiento").val("");
            $("#telefono").val("");
            }else{
                alert(datos);
            }
      
        });
    });