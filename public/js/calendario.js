document.addEventListener("DOMContentLoaded", function(){
    const monthsBr = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
    const tableDays=document.getElementById("dias");
    function GetDaysCalendar(mes,ano,dia){
        document.getElementById("mes").innerHTML=monthsBr[mes];
        document.getElementById("ano").innerHTML=ano;  

        let firstDayOfWeek = new Date(ano,mes,1).getDay()-1; //primer dia de la semana 
        let getLastDayThisMonth= new Date(ano,mes+1,0).getDate(); //ultimo dia del mes

        //console.log(firstDayOfWeek);
        //console.log(getLastDayThisMonth);

        
        for(var i = -firstDayOfWeek,index =0; i<(42-firstDayOfWeek); i++,index++){
            let dt= new Date(ano,mes,i);
            let dayTable = tableDays.getElementsByTagName("td")[index];
            dayTable.classList.remove("mes-anterior");
            dayTable.classList.remove("proximo-mes");
            dayTable.classList.remove("dia-actual");
            dayTable.classList.remove("event");
            dayTable.innerHTML=dt.getDate();
            
            if(i<1){
                dayTable.classList.add("mes-anterior");
            }
            if(i> getLastDayThisMonth){
                dayTable.classList.add("proximo-mes");
            }
            if(i==dia ){
                let even = new Date();
                if(mes == even.getMonth()){
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

    console.log(mes);
    console.log(ano);
    console.log(dia);

    GetDaysCalendar(mes,ano,dia);

    const btn_proximo = document.getElementById("btn-prev");
    const btn_anterior = document.getElementById("btn-ant");

    btn_proximo.onclick = function(){
        mes--;
        if(mes<0){
            ano--;
            mes=11;
        }
        GetDaysCalendar(mes,ano,dia);
    }
    btn_anterior.onclick=function(){
        mes++;
        if(mes>11){
            ano++;
            mes=0;
        }
        GetDaysCalendar(mes,ano,dia);
    }
});