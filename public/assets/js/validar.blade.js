/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function validar(){
    var a = confirm('¿Desea validar '+arguments[0]+'?');
    if(a){
        //get id expediente y set status from direccion in 5
        $.ajax({
            type:'POST',
            url:'{{URL::asset('/')}}Profesor/Expediente/validar/',
            data:{'tipo':"'"+arguments[1]+"'"},
            success:function(data){
                alert(arguments[0]+' validado');
                window.location.href = '{{URL::asset('/')}}Profesor/Expediente/principal';
           }
        },10000);
    }
}