const app = new Vue({
    el:"#app",
    data:{
        registroCita:{
            servicio: 0,
            cedula:"",
            nombre:"",
            fecha_cita:""
        }
    },
    methods: {
        //Registrar citas
       comprobarNumeroDeCedula: function (){
        let json = JSON.stringify({"busqueda":this.registroCita.cedula});
        console.log(json);
        const request=fetch("/api/paciente/busqueda",{
            method:"POST",
            body: json
        }).then(response => response.json()).then( data =>{
            this.registroCita.nombre=data.nombre + data.apellido;
            this.registroCita.id=data.id;
            
            console.log(data);
        });
        
       },
       stop : function (e){
        e.preventDefault();
        
       }
    }

});