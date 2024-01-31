<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

    <form action="" id='form'>
        
        <input type="text" name="cliente" id="cliente">

        <select name="formap" id="formap">
            <option value="contado">contado</option>
            <option value="credito">credito</option>
            <option value="datafono">datafono</option>
        </select>

        <input type="text" name="valor" id="valor" placeholder='ingrese valor factura'>
        <button type='button' id='btn_calcular'> Calcular </button>
        <button type='button' id='btn_listar'> GENERAR PDF </button>


    </form>

    <script src="ejercicio2.js"></script>
</body>
</html>