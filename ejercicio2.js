let btn_calcular = document.getElementById('btn_calcular');
btn_calcular.addEventListener('click', () => {
    let datos = new FormData(document.getElementById('form'));
    datos.append('type', 1); // aqui mando type
    fetch('controllerPrueba.php', {
      method: 'POST',
      body: datos
    })
      .then(resp=> resp.json())
      .then(data => {
        
        if (data.rta===1){
          alert('notas ingresadas correctamente');
         
  
        } else {
          //alert('no se pudieron ingresar las notas');
        }
      });



});

//bloque listar //
/*


*/

let btn_listar = document.getElementById('btn_listar');
btn_listar.addEventListener('click', () => {
  window.open('./libreria/informe.php');

  
 
  
});

